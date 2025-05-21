<footer class="bg-gradient-to-b from-green-50 to-white border-t border-green-200 mt-12 py-8 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo et description -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <svg class="w-10 h-10 text-green-600" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" fill="#F0FDF4" stroke="#16A34A" stroke-width="2"/>
                        <path d="M16 32C18 28 22 24 24 24C26 24 30 28 32 32" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24 16V24" stroke="#16A34A" stroke-width="2" stroke-linecap="round"/>
                        <path d="M32 24H36" stroke="#16A34A" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 24H16" stroke="#16A34A" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span class="font-bold text-xl text-green-700">Le Rameau</span>
                </div>
                <p class="text-gray-600 text-sm">
                    Plateforme de gestion collaborative pour la copropriété Le Rameau. Transparence, efficacité et participation au cœur de notre démarche.
                </p>
            </div>

            <!-- Liens rapides -->
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-green-700 tracking-wider uppercase">Navigation</h3>
                    <ul class="mt-4 space-y-2">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('meetings.index') }}" class="text-gray-600 hover:text-green-600 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Réunions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('resolutions.index') }}" class="text-gray-600 hover:text-green-600 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Résolutions
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-green-700 tracking-wider uppercase">Légal</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('legal') }}" class="text-gray-600 hover:text-green-600 text-sm">Mentions légales</a></li>
                        <li><a href="{{ route('privacy') }}" class="text-gray-600 hover:text-green-600 text-sm">Politique de confidentialité</a></li>
                        <li><a href="{{ route('terms') }}" class="text-gray-600 hover:text-green-600 text-sm">CGU</a></li>
                        <li><a href="{{ route('rgpd') }}" class="text-gray-600 hover:text-green-600 text-sm">RGPD</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-sm font-semibold text-green-700 tracking-wider uppercase">Contact</h3>
                <ul class="mt-4 space-y-3">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-600 text-sm">contact@lerameau.fr</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-gray-600 text-sm">01 23 45 67 89</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-600 text-sm">5 Rue André Malraux<br>21000 Dijon, France</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright et mentions -->
        <div class="mt-12 pt-8 border-t border-green-200 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-xs">
                &copy; {{ date('Y') }} Copropriété Le Rameau. Tous droits réservés.
            </p>
            <div class="mt-4 md:mt-0 flex space-x-6">
                <a href="{{ route('legal') }}" class="text-gray-400 hover:text-green-600 text-xs">Mentions légales</a>
                <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-green-600 text-xs">Politique de confidentialité</a>
                <a href="{{ route('terms') }}" class="text-gray-400 hover:text-green-600 text-xs">Conditions d'utilisation</a>
                <a href="{{ route('rgpd') }}" class="text-gray-400 hover:text-green-600 text-xs">RGPD</a>
            </div>
        </div>
    </div>
</footer>