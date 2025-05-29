@section('title', 'Editar Residente - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Residente') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('residents.update', $resident) }}" method="POST" class="bg-white p-6 rounded shadow-md">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-6 mb-6">
                    <img src="https://via.placeholder.com/150" alt="Foto do residente" class="w-32 h-32 rounded shadow">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $resident->nome }}</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium">Idade</label>
                        <input type="number" name="idade" value="{{ $resident->idade }}" class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Contato</label>
                        <input type="text" name="contato" value="{{ $resident->contato_responsavel }}" class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">CPF</label>
                        <input type="text" name="cpf" value="{{ $resident->cpf }}" class="w-full border rounded p-2">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Estado de Saúde</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @php
                            $opcoes = ['Saudável', 'Estável', 'Necessita de Monitoramento', 'Dependência Parcial', 'Dependência Total', 'Cuidados paliativos'];
                        @endphp
                        @foreach ($opcoes as $opcao)
                            <label class="inline-flex items-center">
                                <input type="radio" name="estado_saude" value="{{ $opcao }}" {{ $resident->estado_saude === $opcao ? 'checked' : '' }}>
                                <span class="ml-2">{{ $opcao }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
