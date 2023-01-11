<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit {{ $account->number }} | {{ $account->label }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/accounts/{{ $account->id }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="label" class="sr-only">Label</label>
                            <input type="text" name="label" id="label" placeholder="Label" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $account->label }}">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
