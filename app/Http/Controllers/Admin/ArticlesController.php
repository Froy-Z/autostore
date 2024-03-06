<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\SlugServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\FlashMessage;
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
     * Список статей для пользователей и администратора в разных стилях
     */
    public function index(Request $request): View
    {
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
        $articles = $this->articlesRepository->findAll();

        return view('pages.admin.articles.view', ['articles' => $articles]);
    }

    /**
     * Показать форму создания статьи
     */
    public function create(): View
    {
        $article = $this->articlesRepository->getModel();
        return view('pages.admin.articles.create', ['article' => $article]);
    }

    /**
     * Добавление статьи в БД на основе POST запроса
     */
    public function store(ArticleRequest $request, SlugServiceContract $slugService): RedirectResponse
    {
        try {
            $slug = $slugService->generateSlug($request->title);
            $this->articlesRepository->create(['slug' => $slug] + $request->validated());
        } catch (\Exception $e) {
            $this->flashMessage->error('При создании новости произошла ошибка');
            return redirect()->route('admin.articles.create');
        }
        $flashMessage = new FlashMessage();
        $flashMessage->success('Новость успешно создана');
        return redirect()->route('admin.view');
    }

    /**
     * Отображение конкретной статьи GET запросом
     */
    public function show(Article $article): View
    {
        return view('pages.articles.article_show', ['article' => $article]);
    }

    /**
     * Показать форму редактирования статьи GET запросом
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * PUT/PATCH обновление статьи
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Удаление статьи DELETE запросом
     */
    public function destroy(Article $article)
    {
        //
    }
}
