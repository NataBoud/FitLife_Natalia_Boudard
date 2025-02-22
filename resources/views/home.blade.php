<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('FitLife') }}
            </h2>
        </x-slot>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-6">
            @foreach ($fitnessClasses as $fitnessClasse)
            <x-card :fitnessClasse="$fitnessClasse"></x-card>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $fitnessClasses->links() }}
        </div>

</x-app-layout>
