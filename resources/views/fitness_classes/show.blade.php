<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ $fitnessClass->class_name }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">

            <div class="w-full self-stretch flex">
                <img class="w-full h-full object-cover" src="https://picsum.photos/600/400?random={{ $fitnessClass->id  }}"
                    alt="{{ $fitnessClass->class_name  }}" />
            </div>


            <div class="space-y-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $fitnessClass->class_name  }}
                </h1>
                <div>

                    <p class="mb-2 text-base font-bold">Coaches diponibles</p>
                    @if ($fitnessClass->coaches->isNotEmpty())
                    @foreach ($fitnessClass->coaches as $coach)
                    <span class="text-sm bg-gray-200  font-bold me-2 px-1 py-0.5 rounded-m">
                        {{ $coach->name }}
                    </span>
                    <span class="px-2"></span>
                    @endforeach
                    @else
                    Aucun coach assigné
                    @endif
                </div>

                <div>
                    <p class="mb-2 text-base font-bold">Horaires diponibles</p>

                    @if ($fitnessClass->timeslots->isNotEmpty())
                    @foreach ($fitnessClass->timeslots as $time)
                    <span class="text-sm bg-gray-200  font-bold me-2 px-1 py-0.5 rounded-m">
                        {{ $time->date_time }}
                    </span>
                    <span class="px-2"></span>
                    @endforeach
                    @else
                    Aucun horaires trouvés
                    @endif

                </div>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    {{ $fitnessClass->description }}
                </p>
                <a href="{{ route('booking.create', ['id' => $fitnessClass->id]) }}">
                    <x-primary-button>
                        {{ __('Réserver') }}
                    </x-primary-button>
                </a>

                <x-dropdown-link :href="route('home')">
                    Retour à l'accueil
                </x-dropdown-link>

            </div>
        </div>
    </div>
</x-app-layout>
