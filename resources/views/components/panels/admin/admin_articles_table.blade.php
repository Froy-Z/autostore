<section class="pb-4">
    <div class="my-6">
        <x-panels.admin.add_button href="{{ route('admin.articles.create') }}">
            <x-slot:label>Добавить новость</x-slot:label>
        </x-panels.admin.add_button>
    </div>

    <table class="border border-collapse w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название новости</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Краткое описание</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Дата публикации</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Теги</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @props(['articles'])
            @foreach($articles as $article)
                <x-panels.admin.admin_articles_table_item :article="$article" />
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <x-panels.slider />
    </div>
</section>


