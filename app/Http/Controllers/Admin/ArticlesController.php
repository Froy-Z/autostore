<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\FlashMessage;
use App\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Список статей для пользователей и администратора в разных стилях
     */
    public function index()
    {
        $articles = Article::latest('published_at')->get();
        return view('pages.admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Дополнительный GET запрос для вывода списка статей в табличной форме для администратора
     */
    public function view()
    {
        $articles = Article::oldest('id')->get();
        return view('pages.admin.articles.view', ['articles' => $articles]);
    }

    /**
     * Показать форму создания статьи
     */
    public function create()
    {
        return view('pages.admin.articles.create');
    }

    /**
     * Добавление статьи в БД на основе POST запроса
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        try {
            $slug = SlugService::generateSlug($request->title);
            Article::create(['slug' => $slug] + $request->validated());
        } catch (\Exception $e) {
            $flashMessage = new FlashMessage();
            $flashMessage->error('При создании новости произошла ошибка');
            return redirect()->route('admin.articles.create');
        }
        $flashMessage = new FlashMessage();
        $flashMessage->success('Новость успешно создана');
        return redirect()->route('admin.view');
    }

    /**
     * Отображение конкретной статьи GET запросом
     */
    public function show(Article $article)
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
