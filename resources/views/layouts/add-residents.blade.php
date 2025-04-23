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
                        
                        <!--  
                        {{-- Upload de Foto --}}
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    
                            <p class="mt-2 text-gray-500">
                            <button
                                    class="bg-gray-500 text-white font-semibold p-2 rounded-md hover:bg-gray-600 transition">
                                    <label for="photo" class="font-medium text-blue-600 cursor-pointer hover:underline">Inserir foto</label>
                            </button>
                            <input id="photo" name="photo" type="file" accept="image/*" class="hidden" />
                        </div>
                        -->

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
