<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Votes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Résultats des votes</h3>
                        <p class="text-gray-600">Consultez les résultats sans voir les votes individuels</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Résolution</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pour</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contre</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abstention</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($resolutions as $resolution)
                                @php
                                    $votes = $resolution->votes;
                                    $total = $votes->count();
                                    $yes = $votes->where('vote', 'yes')->count();
                                    $no = $votes->where('vote', 'no')->count();
                                    $abstain = $votes->where('vote', 'abstain')->count();
                                @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <a href="{{ route('admin.resolutions.edit', $resolution) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $resolution->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            @if($resolution->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($resolution->status === 'approved') bg-green-100 text-green-800
                                            @elseif($resolution->status === 'rejected') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $resolution->status === 'pending' ? 'En cours' : ($resolution->status === 'approved' ? 'Approuvée' : ($resolution->status === 'rejected' ? 'Rejetée' : 'Abstention')) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-8 text-right mr-2">{{ $total > 0 ? round(($yes/$total)*100) : 0 }}%</div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-green-500" style="width: {{ $total > 0 ? ($yes/$total)*100 : 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-8 text-right mr-2">{{ $total > 0 ? round(($no/$total)*100) : 0 }}%</div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-red-500" style="width: {{ $total > 0 ? ($no/$total)*100 : 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-8 text-right mr-2">{{ $total > 0 ? round(($abstain/$total)*100) : 0 }}%</div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gray-500" style="width: {{ $total > 0 ? ($abstain/$total)*100 : 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $total }} votes
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>