@props(['article'])
@csrf
<x-forms.groups.group for="fieldArticleTitle" error="{{ $errors->first('title') }}">
    <x-slot:label>Наименование новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleTitle"
        placeholder="Обязательное поле"
        name="title"
        value="{{ old('title', $article->title) }}"
        error="{{ $errors->first('title') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleDescription" error="{{ $errors->first('description') }}">
    <x-slot:label>Краткое описание новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleDescription"
        placeholder="Обязательное поле"
        name="description"
        value="{{ old('description', $article->description) }}"
        error="{{ $errors->first('description') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleBody" error="{{ $errors->first('body') }}">
    <x-slot:label>Детальное описание</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldArticleBody"
        name="body"
        rows="3"
        value="{{ old('body', $article->body) }}"
        error="{{ $errors->first('body') }}"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox_group>
    <x-slot:label>Опубликован</x-slot:label>
    <x-forms.inputs.checkbox
        name="published_at"
        value="{{ now() }}"
    />
</x-forms.groups.checkbox_group>

<x-forms.groups.group for="fieldArticleTags" error="{{ $errors->first('tags') }}">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleTags"
        name="tags"
        placeholder="Парадигма, Архетип, Киа Seed"
        value="{{ old('tags', $article->tags->pluck('name')->implode(', ')) }}"
        error="{{ $errors->first('tags') }}"
    />
</x-forms.groups.group>
