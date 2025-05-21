<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Résolutions de la copropriété') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Liste des résolutions</h3>
                        <p class="text-gray-600">Consultez les résolutions en cours et passées</p>
                    </div>

                    <div class="space-y-6">
                        @foreach($resolutions as $resolution)
                        <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-lg text-blue-600">{{ $resolution->title }}</h4>
                                    <div class="mt-2 flex flex-wrap gap-4">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Début: {{ $resolution->vote_start_date->format('d/m/Y') }}
                                        </div>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Fin: {{ $resolution->vote_end_date->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($resolution->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($resolution->status === 'approved') bg-green-100 text-green-800
                                    @elseif($resolution->status === 'rejected') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    @if($resolution->status === 'pending') En cours
                                    @elseif($resolution->status === 'approved') Approuvée
                                    @elseif($resolution->status === 'rejected') Rejetée
                                    @else Abstention @endif
                                </span>
                            </div>
                            
                            @if($resolution->description)
                            <div class="mt-3 text-gray-700">
                                <p class="font-medium">Description :</p>
                                <p class="mt-1">{{ $resolution->description }}</p>
                            </div>
                            @endif

                            @if($resolution->status === 'pending' && now()->between($resolution->vote_start_date, $resolution->vote_end_date))
                            <div class="mt-4">
                                <a href="{{ route('votes.index') }}" class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Participer au vote
                                </a>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>