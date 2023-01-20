<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trade Partners') }}
        </h2>
        <form action="/trade-partners" method="POST">
            @csrf
            <label for="search">Search for trade partner:</label>
            <input type="text" name="search" placeholder="partner name" required>
            <button type="submit">Search</button>
        </form>

        <a href="/trade-partners/maris">Māris</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Place for trade partners</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
