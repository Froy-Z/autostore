<x-layouts.inner pageTitle="Регистрация" title="Регистрация">
    <x-slot:content>
        <x-panels.messages.form_validation_errors />

        <x-forms.form method="post" action="{{ route('register') }}">
            @csrf

            <x-forms.groups.group for="name" error="{{ $errors->first('name') }}">
                <x-slot:label>Ваше имя</x-slot:label>
                <x-forms.inputs.text
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Иванов Иван Иванович"
                    required autofocus
                    value="{{ old('name') }}"
                    error="{{ $errors->first('name') }}"
                />
            </x-forms.groups.group>

            <x-forms.concrete_forms_fields.auth.email />
            <x-forms.concrete_forms_fields.auth.password :withConfirmation="true" />

            <x-forms.row class="space-x-4">
                <x-forms.submit_button>Регистрация</x-forms.submit_button>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('login') }}">
                        Уже зарегистрированы?
                    </a>
                @endif
            </x-forms.row>
        </x-forms.form>
    </x-slot:content>
</x-layouts.inner>
