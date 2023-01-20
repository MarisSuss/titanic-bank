<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accounts') }}
        </h2>
        <br>
        <a href="/accounts/add">Add new account</a>
        <br>
        <a href="/balance-transfer">Transfer money</a>
    </x-slot>

    @foreach($accounts as $account)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <li>{{ $account->label }} | <a href="/accounts/{{ $account->id }}/edit">Edit label</a></li>
                        <li>
                            Account {{ $account->number }} balance: {{ $account->getBalanceFormatted() }} {{ $account->currency }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
