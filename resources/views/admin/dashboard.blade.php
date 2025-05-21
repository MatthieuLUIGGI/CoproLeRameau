<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Première ligne : Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Utilisateurs -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Utilisateurs</h3>
                        <p class="text-3xl font-bold">{{ $usersCount }}</p>
                        <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">Gérer</a>
                    </div>
                </div>

                <!-- Réunions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Réunions</h3>
                        <p class="text-3xl font-bold">{{ $meetingsCount }}</p>
                        <a href="{{ route('admin.meetings') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">Gérer</a>
                    </div>
                </div>

                <!-- Résolutions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Résolutions</h3>
                        <p class="text-3xl font-bold">{{ $resolutionsCount }}</p>
                        <a href="{{ route('admin.resolutions') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">Gérer</a>
                    </div>
                </div>

                <!-- Votes -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Votes</h3>
                        <p class="text-3xl font-bold">{{ $votesCount }}</p>
                        <a href="{{ route('admin.votes') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">Consulter</a>
                    </div>
                </div>
            </div>

            <!-- Deuxième ligne : Actions rapides -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Création -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Actions rapides</h3>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('admin.meetings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Nouvelle réunion
                            </a>
                            <a href="{{ route('admin.resolutions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Nouvelle résolution
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Statistiques votes -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Activité récente des votes</h3>
                        @if($recentVotes->isEmpty())
                            <p class="text-gray-500">Aucun vote récent</p>
                        @else
                            <div class="space-y-4">
                                @foreach($recentVotes as $resolution)
                                <div>
                                    <h4 class="font-medium">{{ $resolution->title }}</h4>
                                    <div class="flex items-center mt-1">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $resolution->votes->where('vote', 'yes')->count() / max(1, $resolution->votes->count()) * 100 }}%"></div>
                                            <div class="bg-red-600 h-2.5 rounded-full -ml-1" style="width: {{ $resolution->votes->where('vote', 'no')->count() / max(1, $resolution->votes->count()) * 100 }}%"></div>
                                            <div class="bg-gray-500 h-2.5 rounded-full -ml-1" style="width: {{ $resolution->votes->where('vote', 'abstain')->count() / max(1, $resolution->votes->count()) * 100 }}%"></div>
                                        </div>
                                        <span class="ml-3 text-sm text-gray-500">{{ $resolution->votes->count() }} votes</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('admin.votes') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Voir tous les votes →</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>