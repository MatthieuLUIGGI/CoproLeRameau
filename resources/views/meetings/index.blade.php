<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Réunions de la copropriété') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Calendrier des réunions</h3>
                        <p class="text-gray-600">Consultez les réunions passées et à venir</p>
                    </div>

                    <div class="space-y-6">
                        @foreach($meetings as $meeting)
                        <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-lg text-blue-600">{{ $meeting->title }}</h4>
                                    <div class="flex items-center mt-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $meeting->date_time->format('d/m/Y H:i') }}
                                    </div>
                                    <div class="flex items-center mt-1 text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $meeting->location }}
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($meeting->status === 'planned') bg-blue-100 text-blue-800
                                    @elseif($meeting->status === 'completed') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    @if($meeting->status === 'planned') À venir
                                    @elseif($meeting->status === 'completed') Terminée
                                    @else Annulée @endif
                                </span>
                            </div>
                            
                            @if($meeting->description)
                            <div class="mt-3 text-gray-700">
                                <p class="font-medium">Description :</p>
                                <p class="mt-1">{{ $meeting->description }}</p>
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