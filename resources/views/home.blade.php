<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('FitLife') }}
        </h2>
    </x-slot>
    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">Nos Cours</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-6">
        @foreach ($cours as $cour)
        <x-card :cours="$cour"></x-card>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $cours->links() }}
    </div>

</x-app-layout>
