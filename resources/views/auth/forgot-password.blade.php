<x-layouts.inner pageTitle="Восстановление пароля" title="Восстановление пароля">
    <x-slot:content>
        @if (session('status'))
            <x-panels.messages.success class="mb-4" :messages="(array) session('status')" />
        @endif

            <x-panels.messages.form_validation_errors />
            <x-forms.form method="POST" action="{{ route('password.email') }}">
                @csrf
                <x-forms.concrete_forms_fields.auth.email />
                <x-forms.row>
                    <x-forms.submit_button>
                        Отправить ссылку на сброс пароля
                    </x-forms.submit_button>
                </x-forms.row>
            </x-forms.form>
    </x-slot:content>
</x-layouts.inner>
