@csrf
<div class="block">
    <label for="fieldArticleTitle" class="text-gray-700 font-bold">Название новости</label>
    <input id="fieldArticleTitle"
           type="text"
           name="title"
           value="{{ old('title' ,$article->title) ?? '' }}"
           class="mt-1 block w-full rounded-md @error('title') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
           placeholder="Обязательное поле"
    >
    @error('title')
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <label for="fieldArticleDescription" class="text-gray-700 font-bold">Краткое описание новости</label>
    <input id="fieldArticleDescription"
           type="text"
           name="description"
           value="{{ old('description' , $article->description) ?? '' }}"
           class="mt-1 block w-full rounded-md @error('') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
           placeholder="Обязательное поле"
    >
    @error('description')
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <label for="field6" class="text-gray-700">Детальное описание</label>
    <textarea id="field6"
              type="text"
              name="body"
              class="mt-1 block w-full rounded-md @error('body') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              rows="3">{{ old('body' ,$article->body) ?? '' }} </textarea>
    @error('body')
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox"
                       name="published_at"
                       value="{{ now() }}"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                />
                <span class="ml-2">Опубликован</span>
            </label>
        </div>
    </div>
</div>
