@props(['cours'])

<div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('home') }}">
        <img class="rounded-t-lg w-full h-[10rem] object-cover"
            src="https://picsum.photos/300/200?random={{ $cours->id }}"
            alt="" />
    </a>
    <div class="p-6">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $cours->name }}
            </h5>
        </a>
        <p class="mb-3 text-gray-700 dark:text-gray-400 text-sm">
            {{ Str::limit($cours->description, 100) }}
        </p>
        <x-link :href="route('cours.show', $cours->id)">
            Voir les créneaux
        </x-link>
    </div>
</div>
