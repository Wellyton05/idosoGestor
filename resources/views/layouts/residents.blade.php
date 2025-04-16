<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Residentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-72 mx-auto mt-10 relative">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                
                <div class="relative">
                    <form>
                        <div class="flex items-center">


                            <!-- Campo de entrada -->
                            <input 
                                type="search" 
                                id="search" 
                                class="block w-full pl-10 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="Digite o nome do residente" 
                                aria-label="Pesquisar residente" 
                                required 
                            />

                            <!-- Botão de busca -->
                            <button 
                                type="submit" 
                                class="ml-2 px-4 py-2 text-sm font-medium text-gray-700 mb-1 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                            >
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>