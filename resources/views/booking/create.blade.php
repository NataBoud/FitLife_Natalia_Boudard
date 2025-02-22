<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Reservation de cours de {{ $fitnessClass->class_name }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-1/2">
                <form method="POST" action="{{ route('booking.store') }}" class="p-6">
                    @csrf

                    <div class="p-6">
                        <label for="timeslot_id" class="block text-sm font-medium text-gray-700 mt-4">Créneaux disponibles</label>
                        <select id="timeslot_id" name="timeslot_id" class="mt-2 p-2 w-full border rounded-md">
                            <option value="" disabled selected>Choisir le créneau</option>
                            @foreach ($fitnessClass->timeslots as $timeslot)
                            <option value="{{ $timeslot->id }}">{{ $timeslot->date_time }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-6">
                        <label for="coach_id" class="block text-sm font-medium text-gray-700 mt-4">Choisir un coach</label>
                        <select id="coach_id" name="coach_id" class="mt-2 p-2 w-full border rounded-md">
                            <option value="" disabled selected>Choisir le coach</option>
                            @foreach ($fitnessClass->coaches as $coach)
                            <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="fitness_class_id" value="{{ $fitnessClass->id }}">
                    


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="flex justify-end mt-6 p-6">
                        <x-primary-button type="submit">
                            {{ __('Réserver') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
