@section('title', 'Residentes - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Residentes') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <!-- Barra de pesquisa -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('residents.index') }}" class="flex flex-col md:flex-row md:items-end gap-4 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input 
                        name="search"
                        type="search" 
                        id="search" 
                        value="{{ request('search') }}"
                        class="block w-full pl-4 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
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
                        href="{{ route('residents.index') }}"
                        class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors shadow-sm"
                    >
                        Limpar
                    </a>
                </div>
            </form>
        </div>

        <!-- Espaçamento entre a barra de pesquisa e a tabela -->
<div class="mt-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium">Nome do residente</th>
                            <th class="py-3 px-4 text-left font-medium">Idade</th>
                            <th class="py-3 px-4 text-left font-medium">Estado de saúde</th>
                            <th class="py-3 px-4 text-right font-medium">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residents as $resident)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4 font-medium text-gray-900">{{ $resident->nome }}</td>
                                <td class="py-4 px-4">{{ $resident->idade }}</td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($resident->estado_saude === 'Boa') bg-green-100 text-green-700
                                        @elseif($resident->estado_saude === 'Regular') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700
                                        @endif
                                    ">
                                        {{ ucfirst($resident->estado_saude) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <a 
                                        href="{{ route('residents.edit', $resident) }}" 
                                        class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium transition-colors"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M4 13v7h7l9-9-7-7-9 9z"/>
                                        </svg>
                                        Editar/Visualizar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">
                                    Nenhum residente cadastrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação com espaçamento -->   
            <div class="mt-8 flex justify-center">
                {{ $residents->links() }}
            </div>

            <!-- Botão Adicionar com espaçamento e centralizado -->
            <div class="mt-6 flex justify-center">
                <a 
                    href="{{ route('residents.create') }}"
                    class="flex items-center px-8 py-2 text-white rounded bg-gray-800 hover:bg-gray-600 transition"
                    style="padding: 10px 20px;"
                >
                    Adicionar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>