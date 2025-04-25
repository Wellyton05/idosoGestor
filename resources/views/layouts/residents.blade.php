<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Residentes') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <!-- Barra de pesquisa -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full md:w-96 mx-auto mt-6 relative">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                
                <div class="relative">
                    <form method="GET" action="{{ route('residents.index') }}" class="flex items>
                        <div class="flex items-center">
                            <input 
                                name="search"
                                type="search" 
                                id="search" 
                                class="block w-full pl-4 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Digite o nome do residente" 
                                required 
                            />

                            <button 
                                type="submit" 
                                class="ml-2 px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-600 transition focus:ring-4 focus:outline-none focus:ring-blue-300"
                            >
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Espaçamento entre a barra de pesquisa e a tabela -->
        <div class="mt-8">
            <!-- Tabela de residentes centralizada com largura controlada -->
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-t border-gray-200">
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 40%">Nome do residente:</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Idade:</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Estado de saúde:</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @forelse($residents as $resident)
                            <tr class="border-b border-gray-200">
                                <td class="py-4 text-sm text-gray-800">{{ $resident->nome }}</td>
                                <td class="py-4 text-sm text-gray-800">{{ $resident->idade }}</td>
                                <td class="py-4 text-sm">
                                    <span class="@if($resident->estado_saude === 'boa') text-green-600 @elseif($resident->estado_saude === 'regular') text-yellow-600 @else text-red-600 @endif font-semibold">
                                        {{ ucfirst($resident->estado_saude) }}
                                    </span>
                                </td>
                                <td class="py-4 text-sm text-gray-800 text-right">
                                <a href="{{ route('residents.edit', $resident) }}" class="text-gray-900 font-bold hover:text-gray-700 mr-2">Editar/Visualizar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
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

            <!-- Botão Adicionar com espaçamento -->
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
