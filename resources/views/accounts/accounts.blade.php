<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accounts') }}
        </h2>
        <br>
        <a href="">Add new account</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach($accounts as $account)
                                <li>{{ $account->label }} | <a href="/accounts/{{ $account->id }}/edit">Edit label</a></li>
                                <li>Account {{ $account->number }} balance: {{ number_format($account->balance / 100, 2)}} {{ $account->currency }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
