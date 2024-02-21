<x-layouts.admin pageTitle="Форма редактирования модели" title="Форма редактирования модели">
    <x-slot:content>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.messages.flashes />
            <x-panels.messages.form_validation_errors :messages="$messages ?? '' " />
            <x-forms.form action="{{ route('admin.cars.update', $car) }}" method="post">
                @method('PATCH')
                <x-forms.concrete_forms_fields.admin_cars_form_fields :car="$car"/>
                <x-forms.row>
                    <x-forms.submit_button>Сохранить</x-forms.submit_button>
                    <x-forms.cancel_button>Отменить</x-forms.cancel_button>
                </x-forms.row>
            </x-forms.form>
        </main>
    </x-slot:content>
</x-layouts.admin>
