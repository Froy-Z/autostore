<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\ArticlesServiceContract;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\DeleteArticleServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly FlashMessageContract $flashMessage
    ) {
    }

    /**
     * Список статей для администратора
     */
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Article::class);
        $articles = $this->articlesRepository->paginateForArticles(
            false,
            'desc',
            ['*'],
            5,
            $request->get('page',1)
        );
        return view('pages.admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Дополнительный GET запрос для вывода списка статей в табличной форме для администратора
     */
    public function view(): View
    {
        $this->authorize('view', Article::class);
        $articles = $this->articlesRepository->findAll();
        return view('pages.admin.articles.view', ['articles' => $articles]);
    }

    /**
     * Показать форму создания статьи
     */
    public function create(): View
    {
        $article = $this->articlesRepository->getModel();
        $this->authorize('create', $article);
        return view('pages.admin.articles.create', ['article' => $article]);
    }

    /**
     * Добавление статьи в БД на основе POST запроса
     */
    public function store(
        ArticleRequest          $articleRequest,
        TagsRequest             $tagsRequest,
        CreateArticleServiceContract $articlesService,
    ): RedirectResponse
    {
        $this->authorize('create', Article::class);
        try {
            $articlesService->create(
                $articleRequest->validated(),
                $tagsRequest->get('tags', []));
        } catch (\Exception $e) {
            $this->flashMessage->error('При создании новости произошла ошибка');
            return redirect()->route('admin.articles.create');
        }
        $this->flashMessage->success('Новость успешно создана');
        return redirect()->route('admin.view');
    }

    /**
     * Отображение конкретной статьи GET запросом
     */
    public function show(string $slug): View
    {
        $article = $this->articlesRepository->findBySlug($slug, ['image', 'tags']);
        return view('pages.articles.article_show', ['article' => $article]);
    }

    /**
     * Показать форму редактирования статьи GET запросом
     */
    public function edit(int $id): View
    {
        $article = $this->articlesRepository->findById($id);
        $this->authorize('update', $article);
        return view('pages.admin.articles.edit', ['article' => $article]);
    }

    /**
     * PUT/PATCH обновление статьи
     */
    public function update(
        Article                 $article,
        ArticleRequest          $articleRequest,
        TagsRequest             $tagsRequest,
        UpdateArticleServiceContract $articlesService,
    ): RedirectResponse
    {
        $this->authorize('update', $article);
        try {
            $articlesService->update(
                $article->id,
                $articleRequest->validated(),
                $tagsRequest->get('tags', []));
        } catch (\Exception $e) {
            $this->flashMessage->error('При обновлении новости произошла ошибка');
            return redirect()->route('admin.articles.edit', ['article' => $article]);
        }
        $this->flashMessage->success('Новость успешно обновлена');
        return redirect()->route('admin.view');
    }

    /**
     * Удаление статьи DELETE запросом
     */
    public function destroy(
        Article $article,
        DeleteArticleServiceContract $articlesService
    ): RedirectResponse
    {
        $this->authorize('delete', $article);
        try {
            $articlesService->delete($article->id);
        } catch (\Exception $e) {
            $this->flashMessage->error('При удалении новости произошла ошибка');
            return redirect()->route('admin.view');
        }
        $this->flashMessage->success('Новость успешно удалена');
        return redirect()->route('admin.view');
    }
}
