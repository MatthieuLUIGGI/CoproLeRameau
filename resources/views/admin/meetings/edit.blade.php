<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la réunion') }} : {{ $meeting->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.meetings.update', $meeting) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Titre -->
                            <div>
                                <x-label for="title" :value="__('Titre de la réunion')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $meeting->title)" required />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="3" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $meeting->description) }}</textarea>
                            </div>

                            <!-- Date/Heure -->
                            <div>
                                <x-label for="date_time" :value="__('Date et Heure')" />
                                <x-input id="date_time" class="block mt-1 w-full" type="datetime-local" name="date_time" 
                                    value="{{ old('date_time', $meeting->date_time->format('Y-m-d\TH:i')) }}" required />
                            </div>

                            <!-- Lieu -->
                            <div>
                                <x-label for="location" :value="__('Lieu')" />
                                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location', $meeting->location)" required />
                            </div>

                            <!-- Statut -->
                            <div>
                                <x-label for="status" :value="__('Statut')" />
                                <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="planned" {{ $meeting->status === 'planned' ? 'selected' : '' }}>Planifiée</option>
                                    <option value="completed" {{ $meeting->status === 'completed' ? 'selected' : '' }}>Terminée</option>
                                    <option value="canceled" {{ $meeting->status === 'canceled' ? 'selected' : '' }}>Annulée</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.meetings') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Annuler
                            </a>
                            <x-button>
                                {{ __('Enregistrer les modifications') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>