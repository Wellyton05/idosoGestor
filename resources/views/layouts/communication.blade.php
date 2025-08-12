@section('title', 'Comunicação - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-900">
                {{ __('Comunicação') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <!-- Barra de pesquisa -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('communication.index') }}" 
                  class="flex flex-col md:flex-row md:items-end gap-4 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome do residente</label>
                    <input 
                        name="search"
                        type="search" 
                        id="search" 
                        value="{{ request('search') }}"
                        class="block w-full pl-4 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                               focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Digite o nome do residente" 
                    />
                </div>

                <div class="flex gap-2">
                    <button 
                        type="submit" 
                        class="px-5 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-600"
                    >
                        Buscar
                    </button>
                    <a 
                        href="{{ route('communication.index') }}"
                        class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors shadow-sm"
                    >
                        Limpar
                    </a>
                </div>
            </form>
        </div>

        <!-- Lista de comunicação -->
        <div class="mt-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium">Nome do residente</th>
                            <th class="py-3 px-4 text-left font-medium">Familiar/Responsável</th>
                            <th class="py-3 px-4 text-center font-medium">Contato</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residents as $resident)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4 font-medium text-gray-900">{{ $resident->nome }}</td>
                                <td class="py-4 px-4">{{ $resident->nome_responsavel }}</td>
                                <td class="py-4 px-4 text-center">
                                    @if($resident->contato_responsavel)
                                        <a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $resident->contato_responsavel) }}" 
                                           target="_blank" 
                                           class="inline-flex items-center gap-2 px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                            <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" width="20" alt="WhatsApp">
                                            WhatsApp
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Sem contato</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-gray-500">
                                    Nenhum residente encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="mt-6 flex justify-center">
                {{ $residents->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
