<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Residentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Barra de pesquisa -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full md:w-96 mx-auto mt-6 relative">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                
                <div class="relative">
                    <form>
                        <div class="flex items-center">
                            <input 
                                type="search" 
                                id="search" 
                                class="block w-full pl-4 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Digite o nome do residente" 
                                aria-label="Pesquisar residente" 
                                required 
                            />

                            <button 
                                type="submit" 
                                class="ml-2 px-4 py-2 text-sm font-medium text-gray-800 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300"
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
            <!-- Tabela de residentes com espaçamento adequado -->
            <div>
                <table class="w-full bg-white">
                    <thead>
                        <tr class="border-b border-t border-gray-200">
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 40%">Nome do residente</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Idade</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Estado de saúde</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Editar/Visualizar</th>
                        </tr>
                    </thead>
                    <!--
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 text-sm text-gray-800">Augustinho</td>
                            <td class="py-4 text-sm text-gray-800">60</td>
                            <td class="py-4 text-sm text-gray-800">xxx</td>
                            <td class="py-4 text-sm text-gray-800 text-right">
                                <button class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    -->
                </table>
            </div>

            <!-- Paginação com espaçamento -->
            <div class="mt-8 flex justify-center">
                <nav class="inline-flex rounded">
                    <button class="px-3 py-1 text-sm text-white bg-gray-800 rounded-l">1</button>
                    <button class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-r border-l border-gray-200">2</button>
                    <button class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-r border-gray-200">3</button>
                    <span class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-gray-200">...</span>
                    <button class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-r border-gray-200">7</button>
                    <button class="px-3 py-1 text-sm text-gray-700 bg-white border-t border-b border-r border-gray-200 rounded-r">8</button>
                </nav>
            </div>

            <!-- Botão Adicionar com espaçamento -->
            <div class="mt-6 flex justify-center">
                <a 
                    href="{{ route('add-residents') }}"
                    class="flex items-center px-8 py-2 text-white rounded"
                    style="background-color: rgba(31, 41, 55, 1);
                    padding: 10px 20px;"
                >
                    Adicionar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
