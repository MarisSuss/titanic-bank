<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crypto Market') }}
        </h2>
        <form action="/crypto-market" method="POST">
            @csrf
            <label for="search">Search for crypto:</label>
            <input type="text" name="search" placeholder="COIN">
            <button type="submit">Search</button>
        </form>
        <a href="/crypto-market/ADA">ADA</a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Name (Symbol)</th>
                        <th class="px-4 py-2">Price (USD)</th>
                        <th class="px-4 py-2">Logo</th>
                        <th class="px-4 py-2">1h Change (%)</th>
                        <th class="px-4 py-2">24h Change (%)</th>
                        <th class="px-4 py-2">7d Change (%)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($featuredCoins as $cryptoCoin)
                            <tr>
                                <td class="px-4 py-2">{{ $cryptoCoin->getName() }} ({{ $cryptoCoin->getSymbol() }})</td>
                                <td class="px-4 py-2">{{ $cryptoCoin->getPriceFormatted() }}$</td>
                                <td class="px-4 py-2">
                                    <img src="{{ $cryptoCoin->getLogoUrl() }}" alt="No crypto-coin logo" class="w-6 h-6">
                                </td>
                                <td class="px-4 py-2">{{ $cryptoCoin->getPercentChange1hFormatted() }}%</td>
                                <td class="px-4 py-2">{{ $cryptoCoin->getPercentChange24hFormatted() }}%</td>
                                <td class="px-4 py-2">{{ $cryptoCoin->getPercentChange7dFormatted() }}%</td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
