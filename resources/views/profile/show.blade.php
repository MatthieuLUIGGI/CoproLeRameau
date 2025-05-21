<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Section 1: Informations personnelles -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        Informations personnelles
                    </h3>
                    <button @click="showPersonalInfo = !showPersonalInfo" class="text-blue-600 hover:text-blue-800 text-sm">
                        <span x-text="showPersonalInfo ? 'Masquer' : 'Modifier'"></span>
                    </button>
                </div>

                <div x-show="showPersonalInfo" x-transition>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nom -->
                            <div>
                                <x-input-label for="name" value="Nom complet" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" 
                                    :value="old('name', $user->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" value="Email" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" 
                                    :value="old('email', $user->email)" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Bâtiment -->
                            <div>
                                <x-input-label for="building_number" value="Numéro de bâtiment" />
                                <x-text-input id="building_number" name="building_number" type="text" 
                                    class="mt-1 block w-full" :value="old('building_number', $user->building_number)" />
                                <x-input-error :messages="$errors->get('building_number')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 space-x-3">
                            <x-secondary-button @click="showPersonalInfo = false" type="button">
                                Annuler
                            </x-secondary-button>
                            <x-primary-button>
                                Enregistrer
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <div x-show="!showPersonalInfo" x-transition class="space-y-2">
                    <p><span class="font-medium">Nom :</span> {{ $user->name }}</p>
                    <p><span class="font-medium">Email :</span> {{ $user->email }}</p>
                    <p><span class="font-medium">Bâtiment :</span> {{ $user->building_number ?? 'Non renseigné' }}</p>
                </div>
            </div>

            <!-- Section 2: Mot de passe -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        Sécurité du compte
                    </h3>
                    <button @click="showPasswordForm = !showPasswordForm" class="text-blue-600 hover:text-blue-800 text-sm">
                        <span x-text="showPasswordForm ? 'Masquer' : 'Modifier'"></span>
                    </button>
                </div>

                <div x-show="showPasswordForm" x-transition>
                    <form method="POST" action="{{ route('profile.update-password') }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <!-- Mot de passe actuel -->
                            <div>
                                <x-input-label for="current_password" value="Mot de passe actuel" />
                                <x-text-input id="current_password" name="current_password" type="password" 
                                    class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <!-- Nouveau mot de passe -->
                            <div>
                                <x-input-label for="new_password" value="Nouveau mot de passe" />
                                <x-text-input id="new_password" name="new_password" type="password" 
                                    class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->updatePassword->get('new_password')" class="mt-2" />
                            </div>

                            <!-- Confirmation -->
                            <div>
                                <x-input-label for="new_password_confirmation" value="Confirmer le nouveau mot de passe" />
                                <x-text-input id="new_password_confirmation" name="new_password_confirmation" 
                                    type="password" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->updatePassword->get('new_password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 space-x-3">
                            <x-secondary-button @click="showPasswordForm = false" type="button">
                                Annuler
                            </x-secondary-button>
                            <x-primary-button>
                                Mettre à jour
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <div x-show="!showPasswordForm" x-transition>
                    <p class="text-gray-600">Pour votre sécurité, nous vous recommandons d'utiliser un mot de passe unique et complexe.</p>
                </div>
            </div>

            <!-- Section 3: Suppression du compte -->
            <div class="bg-white shadow-sm rounded-lg p-6 border border-red-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-red-800">Zone dangereuse</h3>
                        <div class="mt-2 text-sm text-red-600">
                            <p>Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                        </div>
                        <div class="mt-4">
                            <button @click="showDeleteAccount = true" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition">
                                Supprimer mon compte
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de confirmation -->
                <div x-show="showDeleteAccount" x-transition class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: none;">
                    <div class="fixed inset-0 transform transition-all" @click="showDeleteAccount = false">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg sm:mx-auto" @click.stop>
                        <div class="px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Confirmer la suppression</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600">Veuillez entrer votre mot de passe pour confirmer la suppression définitive de votre compte.</p>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50">
                            <form method="POST" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <div>
                                    <x-input-label for="password" value="Mot de passe" class="sr-only" />
                                    <x-text-input id="password" name="password" type="password" class="block w-full" placeholder="Votre mot de passe" required />
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end space-x-3">
                                    <x-secondary-button @click="showDeleteAccount = false" type="button">
                                        Annuler
                                    </x-secondary-button>
                                    <x-danger-button>
                                        Supprimer définitivement
                                    </x-danger-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('profile', () => ({
                showPersonalInfo: false,
                showPasswordForm: false,
                showDeleteAccount: false, // Initialisé à false par défaut
                
                init() {
                    // Afficher les sections s'il y a des erreurs
                    this.showPersonalInfo = @json($errors->hasAny('name', 'email', 'building_number'));
                    this.showPasswordForm = @json($errors->updatePassword->isNotEmpty());
                    // Ne pas initialiser showDeleteAccount à true ici
                }
            }));
        });
    </script>
    @endpush
</x-app-layout>