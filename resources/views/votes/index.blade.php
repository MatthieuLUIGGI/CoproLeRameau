<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votes en cours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($resolutions->isEmpty())
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center p-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun vote en cours</h3>
                <p class="mt-1 text-sm text-gray-500">Il n'y a actuellement aucune résolution ouverte au vote.</p>
            </div>
            @else
            <div class="space-y-6">
                @foreach($resolutions as $resolution)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-blue-600">{{ $resolution->title }}</h3>
                                <p class="mt-1 text-gray-600">{{ $resolution->description }}</p>
                                <div class="mt-3 flex items-center text-sm text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Vote ouvert du {{ $resolution->vote_start_date->format('d/m/Y') }} au {{ $resolution->vote_end_date->format('d/m/Y') }}
                                </div>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                {{ now()->between($resolution->vote_start_date, $resolution->vote_end_date) ? 'En cours' : 'Terminé' }}
                            </span>
                        </div>

                        @if(now()->between($resolution->vote_start_date, $resolution->vote_end_date))
                        <div class="mt-6">
                            <form method="POST" action="{{ route('votes.submit', ['resolution' => $resolution->id]) }}" 
                                id="voteForm-{{ $resolution->id }}">
                                @csrf
                                
                                @if(auth()->user()->hasVotedForResolution($resolution->id))
                                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-green-700">
                                                Vous avez déjà voté pour cette résolution.
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <fieldset class="space-y-4">
                                        <legend class="sr-only">Choix de vote</legend>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <!-- Option Oui -->
                                            <label class="relative flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                                <div class="flex items-center h-5">
                                                    <input id="vote_yes_{{ $resolution->id }}" name="vote" type="radio" value="yes" 
                                                        {{ auth()->user()->votes()->where('resolution_id', $resolution->id)->where('vote', 'yes')->exists() ? 'checked' : '' }}
                                                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                                </div>
                                                <div class="ml-3 flex items-center">
                                                    <span class="h-3 w-3 bg-green-500 rounded-full mr-2"></span>
                                                    <span class="font-medium text-gray-700">Pour</span>
                                                </div>
                                            </label>
                                            <!-- Option Non -->
                                            <label class="relative flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                                <div class="flex items-center h-5">
                                                    <input id="vote_no_{{ $resolution->id }}" name="vote" type="radio" value="no" 
                                                        {{ auth()->user()->votes()->where('resolution_id', $resolution->id)->where('vote', 'no')->exists() ? 'checked' : '' }}
                                                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                                </div>
                                                <div class="ml-3 flex items-center">
                                                    <span class="h-3 w-3 bg-red-500 rounded-full mr-2"></span>
                                                    <span class="font-medium text-gray-700">Contre</span>
                                                </div>
                                            </label>
                                            <!-- Option Abstention -->
                                            <label class="relative flex items-start p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                                                <div class="flex items-center h-5">
                                                    <input id="vote_abstain_{{ $resolution->id }}" name="vote" type="radio" value="abstain" 
                                                        {{ auth()->user()->votes()->where('resolution_id', $resolution->id)->where('vote', 'abstain')->exists() ? 'checked' : '' }}
                                                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                                </div>
                                                <div class="ml-3 flex items-center">
                                                    <span class="h-3 w-3 bg-gray-500 rounded-full mr-2"></span>
                                                    <span class="font-medium text-gray-700">Abstention</span>
                                                </div>
                                            </label>
                                        </div>
                                    </fieldset>
                                    <div class="mt-6 flex items-center justify-between">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Valider mon vote définitif
                                        </button>
                                    </div>
                                @endif
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Confirmation avant vote
        const voteForms = document.querySelectorAll('form[id^="voteForm"]');
        
        voteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Confirmez votre vote',
                    html: (() => {
                        const checked = form.querySelector('input[name="vote"]:checked');
                        let choix = '';
                        if (checked) {
                            if (checked.value === 'yes') choix = 'voter pour';
                            else if (checked.value === 'no') choix = 'voter contre';
                            else if (checked.value === 'abstain') choix = 'vous abstenir';
                        }
                        return `<div style=\"margin-bottom:8px;\">Vous vous apprêtez à <strong>${choix}</strong>.</div>` +
                            '<div>Attention : ce vote est définitif et ne pourra plus être modifié !</div>';
                    })(),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, je confirme',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>
    @endpush
</x-app-layout>