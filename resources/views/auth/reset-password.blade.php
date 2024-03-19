<x-layouts.inner pageTitle="Сброс пароля" title="Сброс пароля">
    <x-slot:content>
        <x-panels.messages.form_validation_errors />
        <x-forms.form method="POST" action="{{ route('password.store') }}">
            @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <x-forms.concrete_forms_fields.auth.email />
        <x-forms.concrete_forms_fields.auth.password :withConfirmation="true" />
        <x-forms.row>
            <x-forms.submit_button>
                Сбросить пароль
            </x-forms.submit_button>
        </x-forms.row>
        </x-forms.form>
    </x-slot:content>
</x-layouts.inner>
