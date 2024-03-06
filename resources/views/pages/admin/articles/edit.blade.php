<x-layouts.admin pageTitle="Форма редактирования новости" title="Форма редактирования новости">
    <x-slot:content>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.messages.flashes />
            <x-panels.messages.form_validation_errors :messages="$messages ?? '' " />
            <x-forms.form action="{{ route('admin.articles.update', $article) }}" method="post">
                @method('PATCH')
                <x-forms.concrete_forms_fields.admin_article_form_fields :article="$article"/>
                <x-forms.row>
                    <x-forms.submit_button>Сохранить</x-forms.submit_button>
                    <x-forms.cancel_button>Отменить</x-forms.cancel_button>
                </x-forms.row>
            </x-forms.form>
        </main>
    </x-slot:content>
</x-layouts.admin>
