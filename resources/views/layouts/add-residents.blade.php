{{-- resources/views/home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Residente') }}
        </h2>
    </x-slot>   

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('residents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        {{-- Upload de Foto --}}
                        <div class="w-full">
                            <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto do Residente</label>
                            <label for="photo" class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-xl p-4 text-gray-500 hover:border-blue-500 hover:bg-gray-50 cursor-pointer transition space-y-1">
                                {{-- SVG menor e centralizado --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v6m0-6l-3 3m3-3l3 3m0-10V4m0 0H9m3 0h3" />
                                </svg>
                                <span class="text-sm text-gray-600">Clique para adicionar uma foto</span>
                                <span class="text-xs text-gray-400">(JPG, PNG - máx: 2MB)</span>
                            </label>
                            <input id="photo" name="photo" type="file" accept="image/*" class="hidden" />
                        </div>

                        {{-- Campos de texto --}}
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome completo</label>
                            <input type="text" name="nome" id="nome" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <label for="idade" class="block text-sm font-medium text-gray-700">Idade</label>
                            <input type="number" name="idade" id="idade" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <label for="nome_responsavel" class="block text-sm font-medium text-gray-700">Nome familiar/Responsável</label>
                            <input type="text" name="nome_responsavel" id="nome_responsavel" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <label for="contato_responsavel" class="block text-sm font-medium text-gray-700">Contato familiar/Responsável</label>
                            <input type="text" name="contato_responsavel" id="contato_responsavel" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                            <input type="text" name="cpf" id="cpf" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <label for="estado_saude" class="block text-sm font-medium text-gray-700">Estado atual de saúde</label>
                            <select name="estado_saude" id="estado_saude" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Selecione...</option>
                                <option value="boa">Boa</option>
                                <option value="regular">Regular</option>
                                <option value="precaria">Precária</option>
                            </select>
                        </div>

                        {{-- Botão --}}
                        <div>
                            <button type="submit"
                                    class="w-full bg-gray-800 text-white font-semibold py-2 rounded-md hover:bg-gray-600 transition">
                                Cadastrar Residente
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
