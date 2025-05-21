<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'utilisateur') }} : {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nom -->
                            <div>
                                <x-label for="name" :value="__('Nom complet')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                            </div>

                            <!-- Rôle -->
                            <div>
                                <x-label for="role_id" :value="__('Rôle')" />
                                <select id="role_id" name="role_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Bâtiment -->
                            <div>
                                <x-label for="building_number" :value="__('Numéro de bâtiment')" />
                                <x-input id="building_number" class="block mt-1 w-full" type="text" name="building_number" :value="old('building_number', $user->building_number)" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.users') }}" class="text-gray-600 hover:text-gray-900 mr-4">
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