@props(['fitnessClasse'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('fitness_classes.show', $fitnessClasse->id) }}">
        <img class="rounded-t-lg w-full h-[10rem] object-cover" src="https://picsum.photos/300/200?random={{ $fitnessClasse['id'] }}"
            alt="" />
    </a>
    <div class="p-5">
        <a href="{{ route('fitness_classes.show', $fitnessClasse->id) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $fitnessClasse['class_name'] }}
            </h5>
        </a>
        <div class="mb-5">
        </div>
        <p class="mb-1 text-gray-700 dark:text-gray-400 font-medium">
            {{-- {{ $fitnessClasse->coach->name }}  --}}
        </p>

        <p class="mb-3 text-gray-700 dark:text-gray-400 text-sm">
            {{ Str::limit($fitnessClasse['description'], 100) }}
        </p>
        <a href="{{ route('fitness_classes.show', $fitnessClasse->id) }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Voir plus
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
</div>
