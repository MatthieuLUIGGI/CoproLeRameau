<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-indigo-800">
                <span class="block text-indigo-600 text-xl font-light">Espace Copropriétaires</span>
                Le Rameau
            </h1>
        </div>
    </x-slot>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-700 to-blue-600 text-white py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3')] bg-cover bg-center"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6 animate-fade-in-down">Bienvenue dans votre espace copropriété</h2>
                <p class="text-xl mb-8 opacity-90 animate-fade-in-down animate-delay-100">
                    Gestion simplifiée des réunions, résolutions et votes en ligne pour la copropriété Le Rameau
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-fade-in-up animate-delay-200">
                    <a href="#features" class="px-6 py-3 bg-white text-indigo-700 font-medium rounded-lg hover:bg-gray-100 transition duration-300">
                        Découvrir les fonctionnalités
                    </a>
                    @if($nextMeeting)
                    <a href="{{ route('meetings.index') }}" class="px-6 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white hover:text-indigo-700 transition duration-300">
                        Prochaine réunion
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-white/10 backdrop-blur-sm"></div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Comment fonctionne notre plateforme ?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Un outil moderne pour faciliter la gestion de votre copropriété
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Réunions</h3>
                        <p class="text-gray-600">
                            Consultez les dates des prochaines assemblées générales, accédez aux comptes-rendus des réunions précédentes et recevez des notifications.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Résolutions</h3>
                        <p class="text-gray-600">
                            Prenez connaissance des décisions soumises au vote, consultez les détails de chaque résolution et suivez l'évolution des discussions.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Votes en ligne</h3>
                        <p class="text-gray-600">
                            Participez aux décisions importantes de votre copropriété depuis chez vous, en toute sécurité et transparence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Next Meeting Section -->
    @if($nextMeeting)
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3 bg-indigo-800 p-8 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="text-5xl font-bold">{{ $nextMeeting->date_time->format('d') }}</div>
                                <div class="text-xl uppercase">{{ $nextMeeting->date_time->format('M') }}</div>
                                <div class="text-2xl mt-2">{{ $nextMeeting->date_time->format('Y') }}</div>
                                <div class="mt-4 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $nextMeeting->date_time->format('H:i') }}
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-8 bg-white">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Prochaine assemblée générale</h3>
                            <h4 class="text-xl text-indigo-600 mb-4">{{ $nextMeeting->title }}</h4>
                            <div class="flex items-center text-gray-600 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                {{ $nextMeeting->location }}
                            </div>
                            <p class="text-gray-600 mb-6">{{ Str::limit($nextMeeting->description, 200) }}</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('meetings.index') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                                    Voir les détails
                                </a>
                                <a href="#" class="px-6 py-2 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition duration-300">
                                    Ajouter à mon calendrier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Active Resolutions -->
    @if($activeResolutions->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Résolutions en cours</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Participez aux décisions importantes de votre copropriété
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    @foreach($activeResolutions as $resolution)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-indigo-500 hover:shadow-lg transition duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $resolution->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($resolution->description, 150) }}</p>
                                </div>
                                <div class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">
                                    J-{{ now()->diffInDays($resolution->vote_end_date) }}
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    <span class="font-medium">Vote ouvert jusqu'au:</span> 
                                    {{ $resolution->vote_end_date->format('d/m/Y') }}
                                </div>
                                <a href="{{ route('votes.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                                    Voter maintenant
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('resolutions.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300">
                        Voir toutes les résolutions
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-16 bg-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">
                @auth
                    Merci de participer activement à votre copropriété !
                @else
                    Prêt à participer activement à votre copropriété ?
                @endauth
            </h2>
            <p class="text-xl opacity-90 max-w-2xl mx-auto mb-8">
                @auth
                    Accédez à toutes les fonctionnalités pour contribuer aux décisions collectives.
                @else
                    Connectez-vous pour accéder à toutes les fonctionnalités et contribuer aux décisions collectives.
                @endauth
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @auth
                    <!-- Boutons pour utilisateurs connectés -->
                    <a href="{{ route('meetings.index') }}" class="px-8 py-3 bg-white text-indigo-700 font-medium rounded-lg hover:bg-gray-100 transition duration-300 text-lg">
                        Voir les réunions
                    </a>
                    <a href="{{ route('resolutions.index') }}" class="px-8 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white hover:text-indigo-700 transition duration-300 text-lg">
                        Consulter les résolutions
                    </a>
                    @if($activeResolutions->count() > 0)
                        <a href="{{ route('votes.index') }}" class="px-8 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-800 transition duration-300 text-lg">
                            Participer aux votes
                        </a>
                    @endif
                @else
                    <!-- Boutons pour visiteurs non connectés -->
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-indigo-700 font-medium rounded-lg hover:bg-gray-100 transition duration-300 text-lg">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="px-8 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white hover:text-indigo-700 transition duration-300 text-lg">
                        Créer un compte
                    </a>
                @endauth
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out forwards;
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-delay-100 {
            animation-delay: 0.1s;
        }
        .animate-delay-200 {
            animation-delay: 0.2s;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endpush
</x-app-layout>