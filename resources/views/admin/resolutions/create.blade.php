<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle résolution') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.resolutions.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Titre -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Titre</span>
                                <x-label for="title" :value="__('Titre de la résolution')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus placeholder="Ex : Approbation du budget 2025" />
                            </div>

                            <!-- Description -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Description détaillée</span>
                                <x-label for="description" :value="__('Description détaillée')" />
                                <textarea id="description" name="description" rows="5" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ex : Proposition d'adoption du budget prévisionnel pour l'année 2025."></textarea>
                            </div>

                            <!-- Date de début -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Date d'ouverture du vote</span>
                                <x-label for="vote_start_date" :value="__('Date d\'ouverture du vote')" />
                                <x-input id="vote_start_date" class="block mt-1 w-full" type="date" name="vote_start_date" required placeholder="2025-06-01" />
                            </div>

                            <!-- Date de fin -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Date de clôture du vote</span>
                                <x-label for="vote_end_date" :value="__('Date de clôture du vote')" />
                                <x-input id="vote_end_date" class="block mt-1 w-full" type="date" name="vote_end_date" required placeholder="2025-06-10" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.resolutions') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Annuler
                            </a>
                            <x-button>
                                {{ __('Créer la résolution') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>