<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transfer Balance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('balance-transfer')}}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label for="account" class="block text-gray-700 text-sm font-bold mb-2">Account</label>
                            <select name="from_account" id="account" class="form-select">
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->label }} | {{ $account->number }}
                                        <small>
                                            ({{ $account->getBalanceFormatted() }} {{ $account->currency }})
                                        </small>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="to_account" class="block text-gray-700 text-sm font-bold mb-2">To Account</label>
                            <input type="text" name="to_account" id="to_account" class="form-input" placeholder="Account Number">
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="sr-only">Amount</label>
                            <input type="text" name="amount" id="amount" placeholder="amount" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                        </div>
                        <div class="mb-4">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
