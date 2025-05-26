@section('title', 'Comunicação - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comunicação') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full md:w-96 mx-auto mt-6 relative">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                
                <div class="relative">
                    <form method="GET" action="{{ route('communication.index') }}" class="flex items>
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
        <div class="mt-8">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-t border-gray-200">
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 40%">Nome do residente:</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Familiar/Responsável:</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 20%">Contato:</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @forelse($residents as $resident)
                            <tr class="border-b border-gray-200">
                                <td class="py-4 text-sm text-gray-800">{{ $resident->nome }}</td>
                                <td class="py-4 text-sm text-gray-800">{{ $resident->nome_responsavel }}</td>
                                <td class="py-4 text-sm text-gray-800 text-right">
                                    <a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $resident->contato_responsavel) }}" target="_blank">
                                        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" width="27.5" alt="WhatsApp">
                                    </a>
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

                <div class="mt-8 flex justify-center">
                    {{ $residents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
