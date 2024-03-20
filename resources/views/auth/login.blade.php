<x-layouts.inner pageTitle="Авторизация" title="Авторизация">
    <x-slot:content>
        @if(session('status'))
            <x-panels.messages.success class="mb-4" :messages="(array) session('status')" />
        @endif

        <x-panels.messages.form_validation_errors />

        <x-forms.form method="post" action="{{ route('login') }}">
        @csrf

            <x-forms.concrete_forms_fields.auth.email />
            <x-forms.concrete_forms_fields.auth.password />

            <x-forms.groups.checkbox_group error="{{ $errors->first('remember_me') }}">
                <x-slot:label>Запомнить меня</x-slot:label>
                <x-forms.inputs.checkbox
                    name="remember_me"
                    :checked="old('remember_me')"
                />
            </x-forms.groups.checkbox_group>

            <x-forms.row class="space-x-4">
                <x-forms.submit_button>Войти</x-forms.submit_button>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                @endif
            </x-forms.row>
        </x-forms.form>
    </x-slot:content>
</x-layouts.inner>
