<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Vos réservations
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        @forelse ($reservations as $reservation)
        <div class="bg-white shadow-md rounded-lg p-10 mb-6">
            @if ($reservation->horaires->isNotEmpty())
            <h3 class="text-xl font-semibold mb-4">
                Cours réservé : {{ optional($reservation->horaires->first())->cours->name ?? 'Non spécifié' }}
            </h3>

            <p class="text-gray-700">Horaires réservés :</p>

            <ul class="list-disc ml-6">
                @foreach ($reservation->horaires as $horaire)
                <li>
                    {{ ucfirst($horaire->jour) }} :
                    {{ \Carbon\Carbon::parse($horaire->heure_debut)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($horaire->heure_fin)->format('H:i') }}
                    (Coach: {{ $horaire->coach->name ?? 'Non assigné' }})
                </li>
                @endforeach
            </ul>

            <div class="flex gap-3 justify-end mt-6">
                <a href="{{ route('reservation.index') }}">
                    <x-primary-button>
                        {{ __('Modifier') }}
                    </x-primary-button>
                </a>
                <a href="{{ route('reservation.index') }}">
                    <x-secondary-button>
                        {{ __('Annuler le cours') }}
                    </x-secondary-button>
                </a>
            </div>
            @else
            <p class="text-gray-500">Aucun horaire sélectionné pour cette réservation.</p>
            @endif
        </div>
        @empty
        <p class="text-gray-500 text-center">Vous n'avez encore aucune réservation.</p>
        @endforelse

        <div class="flex justify-end mt-6">
            <x-link :href="route('home')">
                Retour à l'accueil
            </x-link>
        </div>
    </div>
</x-app-layout>
