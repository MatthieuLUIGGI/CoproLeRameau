<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle réunion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.meetings.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Titre -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Titre</span>
                                <x-label for="title" :value="__('Titre de la réunion')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus placeholder="Ex : Assemblée Générale 2025" />
                            </div>

                            <!-- Description -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Description</span>
                                <x-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="3" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ex : Réunion annuelle pour discuter des projets et du budget."></textarea>
                            </div>

                            <!-- Date/Heure -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Date et Heure</span>
                                <x-label for="date_time" :value="__('Date et Heure')" />
                                <x-input id="date_time" class="block mt-1 w-full" type="datetime-local" name="date_time" required placeholder="2025-06-01T18:00" />
                            </div>

                            <!-- Lieu -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Lieu</span>
                                <x-label for="location" :value="__('Lieu')" />
                                <x-input id="location" class="block mt-1 w-full" type="text" name="location" required placeholder="Ex : Salle Polyvalente, 12 rue des Lilas" />
                            </div>

                            <!-- Statut -->
                            <div>
                                <span class="text-sm text-gray-600 font-semibold">Statut</span>
                                <x-label for="status" :value="__('Statut')" />
                                <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="planned">Planifiée</option>
                                    <option value="completed">Terminée</option>
                                    <option value="canceled">Annulée</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.meetings') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Annuler
                            </a>
                            <x-button>
                                {{ __('Créer la réunion') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>