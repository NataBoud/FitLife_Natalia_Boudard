<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Vos réservations
        </h2>
        <x-dropdown-link :href="route('home')">
            Retour à l'accueil
        </x-dropdown-link>
    </x-slot>

    <div class="container mx-auto py-8">
        <div class="flex justify-center">
            <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-1/2">
                <!-- Boucle sur les réservations de l'utilisateur -->

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Réservation de {{ $booking->timeslot->fitnessClasses->first()->class_name }}</h3>

                    <!-- Affichage du coach associé -->
                    <p class="mt-2">
                        <strong>Coach choisi:</strong>
                        {{ $booking->timeslot && $booking->timeslot->coach ? $booking->timeslot->coach->name : 'Non spécifié' }}
                    </p>

                    <!-- Affichage du timeslot associé -->
                    <p class="mt-2">
                        <strong>Creneau choisi:</strong>
                        {{ $booking->timeslot ? $booking->timeslot->date_time : 'Non spécifié' }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
