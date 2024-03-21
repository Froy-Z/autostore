<x-layouts.inner pageTitle="Подтверждение пароля" title="Подтверждение пароля">
    <x-slot:content>
        <x-panels.messages.form_validation_errors />
        <x-forms.form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <x-forms.concrete_forms_fields.auth.password />
            <x-forms.row>
                <x-forms.submit_button>
                    Подтвердить
                </x-forms.submit_button>
            </x-forms.row>
        </x-forms.form>
    </x-slot:content>
</x-layouts.inner>
