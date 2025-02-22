@props(['fitnessClasse'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('fitness_classes.show', $fitnessClasse->id) }}">
        <img class="rounded-t-lg w-full h-[10rem] object-cover" src="https://picsum.photos/300/200?random={{ $fitnessClasse['id'] }}"
            alt="" />
    </a>
    <div class="p-6">
        <a href="{{ route('fitness_classes.show', $fitnessClasse->id) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $fitnessClasse->class_name }}
            </h5>
        </a>
        <div class="mb-5">
        </div>
        <p class="text-gray-700 dark:text-gray-400 font-medium mb-3">
            @if ($fitnessClasse->coaches->isNotEmpty())
            @foreach ($fitnessClasse->coaches as $coach)
            <span class="text-sm bg-gray-200  font-bold me-2 px-1 py-0.5 rounded-m">
                {{ $coach->name }}
            </span>
            <span class="px-2"></span>
            @endforeach
            @else
            Aucun coach assigné
            @endif
        </p>
        <p class="mb-3 text-gray-700 dark:text-gray-400 text-sm">
            {{ Str::limit($fitnessClasse->description, 100) }}
        </p>
        <x-dropdown-link :href="route('fitness_classes.show', $fitnessClasse->id)">
            Voir plus
        </x-dropdown-link>
    </div>
</div>
