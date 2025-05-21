<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Résultats du vote') }} : {{ $resolution->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <a href="{{ route('votes.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Retour aux votes
                        </a>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold">{{ $resolution->title }}</h3>
                        <p class="text-gray-600 mt-1">{{ $resolution->description }}</p>
                        <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Période de vote: {{ $resolution->vote_start_date->format('d/m/Y') }} - {{ $resolution->vote_end_date->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Pour -->
                        <div class="border rounded-lg p-4 text-center">
                            <div class="text-3xl font-bold text-green-600">{{ $yesCount }}</div>
                            <div class="text-gray-600 mt-1">Pour</div>
                            <div class="h-2 bg-gray-200 rounded-full mt-3 overflow-hidden">
                                <div class="h-full bg-green-500" style="width: {{ $totalVotes > 0 ? ($yesCount/$totalVotes)*100 : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Contre -->
                        <div class="border rounded-lg p-4 text-center">
                            <div class="text-3xl font-bold text-red-600">{{ $noCount }}</div>
                            <div class="text-gray-600 mt-1">Contre</div>
                            <div class="h-2 bg-gray-200 rounded-full mt-3 overflow-hidden">
                                <div class="h-full bg-red-500" style="width: {{ $totalVotes > 0 ? ($noCount/$totalVotes)*100 : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Abstention -->
                        <div class="border rounded-lg p-4 text-center">
                            <div class="text-3xl font-bold text-gray-600">{{ $abstainCount }}</div>
                            <div class="text-gray-600 mt-1">Abstention</div>
                            <div class="h-2 bg-gray-200 rounded-full mt-3 overflow-hidden">
                                <div class="h-full bg-gray-500" style="width: {{ $totalVotes > 0 ? ($abstainCount/$totalVotes)*100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="font-medium mb-2">Détails des votes</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p>Total des votants: <span class="font-semibold">{{ $totalVotes }}</span></p>
                            <p class="mt-1">Majorité requise: <span class="font-semibold">50% + 1 voix</span></p>
                            @if($resolution->status !== 'pending')
                            <p class="mt-1">Résultat final: 
                                <span class="font-semibold 
                                    @if($resolution->status === 'approved') text-green-600
                                    @elseif($resolution->status === 'rejected') text-red-600
                                    @else text-gray-600 @endif">
                                    {{ $resolution->status === 'approved' ? 'Approuvée' : ($resolution->status === 'rejected' ? 'Rejetée' : 'Abstention') }}
                                </span>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>