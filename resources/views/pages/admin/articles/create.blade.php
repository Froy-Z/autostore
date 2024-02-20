@php
use App\Models\Article;
@endphp
<x-layouts.admin pageTitle="Веб-форма" title="Веб-форма">
    <x-slot:content>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.messages.flashes />
            <x-panels.messages.form_validation_errors :messages="$messages ?? '' " />
            <x-forms.form action="{{ route('admin.articles.store') }}" method="post">
                @method('POST')
                <x-forms.concrete_forms.admin_article_form_fields :article="new Article()"/>
                <x-forms.row>
                    <x-forms.submit_button>Сохранить</x-forms.submit_button>
                    <x-forms.cancel_button>Отменить</x-forms.cancel_button>
                </x-forms.row>
            </x-forms.form>
        </main>
    </x-slot:content>
</x-layouts.admin>
