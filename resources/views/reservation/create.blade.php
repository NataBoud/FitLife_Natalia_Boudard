<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Réservation de {{ $cours->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <form action="{{ route('reservation.store', $cours->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="horaires" class="block mb-4 text-xl font-medium text-gray-900 dark:text-white">Choisissez un ou plusieurs créneaux :</label>

                <!-- Custom dropdown -->
                <div class="relative">
                    <button
                        type="button"
                        id="dropdownButton"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-2 focus:border-indigo-500 px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500 flex items-center justify-between mb-4"
                        onclick="toggleDropdown()">

                        <span id="dropdownPlaceholder" class=" text-gray-500">Choisissez vos horaires</span>
                        <!-- SVG icon -->
                        <svg class="w-4 h-4 text-gray-500 mr-2" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                        </svg>

                    </button>


                    <!-- Dropdown menu -->
                    <div id="dropdownMenu" class="hidden absolute w-full bg-white border border-gray-300 rounded-lg shadow-md z-10 mt-1">
                        <ul class="max-h-56 overflow-auto p-2">
                            @foreach ($cours->horaires as $horaire)
                            <li class="relative cursor-pointer py-2 px-3 text-sm text-gray-900 hover:bg-gray-100 focus:outline-none">
                                <label class="flex items-center space-x-3">
                                    <input type="checkbox" name="horaires[]" value="{{ $horaire->id }}" class="form-checkbox h-4 w-4 text-gray-800 focus:ring-gray-500" onchange="updateDropdownText()">
                                    <span>
                                        {{ $horaire->jour }} -
                                        {{ \Carbon\Carbon::createFromFormat('H:i', $horaire->heure_debut)->format('H:i') }} -
                                        {{ \Carbon\Carbon::createFromFormat('H:i', $horaire->heure_fin)->format('H:i') }}
                                        (Coach: {{ $horaire->coach->name }})
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-end gap-2 my-8">
                <x-primary-button>
                    {{ __('Réserver') }}
                </x-primary-button>
                <a href="{{ route('home') }}">
                    <x-secondary-button>
                        {{ __('Annuler') }}
                    </x-secondary-button>
                </a>
            </div>

        </form>
    </div>

    <script>
        // JavaScript for toggling dropdown visibility
        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        // Update dropdown placeholder based on selected options
        function updateDropdownText() {
            const selectedOptions = Array.from(document.querySelectorAll('input[name="horaires[]"]:checked'));
            const dropdownPlaceholder = document.getElementById('dropdownPlaceholder');

            if (selectedOptions.length > 0) {
                const selectedNames = selectedOptions.map(option => option.parentElement.querySelector('span').textContent).join(', ');
                dropdownPlaceholder.textContent = selectedNames;
            } else {
                dropdownPlaceholder.textContent = 'Choisissez vos horaires';
            }
        }
    </script>
</x-app-layout>
