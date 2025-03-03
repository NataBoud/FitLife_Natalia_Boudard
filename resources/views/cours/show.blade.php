<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ $cours->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">

            <div class="w-full self-stretch flex">
                <img class="w-full h-full object-cover" src="https://picsum.photos/600/400?random={{ $cours->id }}" alt="{{ $cours->name }}" />
            </div>

            <div class="space-y-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $cours->name }}
                </h1>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    {{ $cours->description }}
                </p>

                <!-- Affichage des horaires disponibles -->
                <div>
                    <p class="mb-2 text-base font-bold">Horaires disponibles</p>
                    <ul>
                        @foreach ($cours->horaires as $horaire)
                        <li class="py-5 border-b border-gray-300">
                            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
                                <strong>{{ $horaire->jour }} :</strong>
                                {{ \Carbon\Carbon::createFromFormat('H:i', $horaire->heure_debut)->format('H:i') }} -
                                {{ \Carbon\Carbon::createFromFormat('H:i', $horaire->heure_fin)->format('H:i') }}
                            </span>
                            <span class="text-gray-700 px-2">
                                <strong>Coach :</strong> {{ $horaire->coach->name }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>

             
                <!-- Bouton Réserver -->
                <a href="{{ route('reservation.create', $cours->id) }}">
                    <x-primary-button>
                        {{ __('Réserver') }}
                    </x-primary-button>
                </a>

                <x-link :href="route('home')">
                    Retour à l'accueil
                </x-link>

            </div>
        </div>
    </div>

</x-app-layout>
