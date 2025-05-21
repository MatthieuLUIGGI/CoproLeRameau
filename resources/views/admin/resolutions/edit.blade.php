<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la résolution') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($resolution->votes()->exists())
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-yellow-700">
                                Des votes existent pour cette résolution. La modification des dates est désactivée.
                            </p>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.resolutions.update', $resolution) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Titre -->
                            <div>
                                <x-label for="title" :value="__('Titre')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" 
                                    :value="old('title', $resolution->title)" required autofocus />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="5"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>{{ old('description', $resolution->description) }}</textarea>
                            </div>

                            <!-- Date de début -->
                            <div>
                                <x-label for="vote_start_date" :value="__('Date d\'ouverture')" />
                                <x-input id="vote_start_date" class="block mt-1 w-full" type="date" 
                                    name="vote_start_date" :value="old('vote_start_date', $resolution->vote_start_date->format('Y-m-d'))" 
                                    required :disabled="$resolution->votes()->exists()" />
                            </div>

                            <!-- Date de fin -->
                            <div>
                                <x-label for="vote_end_date" :value="__('Date de clôture')" />
                                <x-input id="vote_end_date" class="block mt-1 w-full" type="date" 
                                    name="vote_end_date" :value="old('vote_end_date', $resolution->vote_end_date->format('Y-m-d'))" 
                                    required :disabled="$resolution->votes()->exists()" />
                            </div>

                            <!-- Statut -->
                            <div>
                                <x-label for="status" :value="__('Statut')" />
                                <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="pending" {{ $resolution->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="approved" {{ $resolution->status === 'approved' ? 'selected' : '' }}>Approuvée</option>
                                    <option value="rejected" {{ $resolution->status === 'rejected' ? 'selected' : '' }}>Rejetée</option>
                                    <option value="abstained" {{ $resolution->status === 'abstained' ? 'selected' : '' }}>Abstention</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.resolutions') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Annuler
                            </a>
                            <x-button>
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>

                    @if($resolution->votes()->count() === 0)
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <form method="POST" action="{{ route('admin.resolutions.delete', $resolution) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette résolution?')">
                                Supprimer cette résolution
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <form method="POST" action="{{ route('admin.resolutions.delete', $resolution) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700" 
                                onclick="return confirm('ATTENTION: Cette résolution a des votes associés. Voulez-vous vraiment supprimer cette résolution et tous ses votes?')">
                                Supprimer la résolution et les {{ $resolution->votes()->count() }} votes associés
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>