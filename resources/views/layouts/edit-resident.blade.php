@section('title', 'Editar Residente - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Residente') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Card: Informações do Residente --}}
            <div class="bg-white p-6 rounded shadow-md">
                <form action="{{ route('residents.update', $resident) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Exibir mensagem de sucesso --}}

                    {{-- Exibir foto atual se existir --}}
                    <div class="flex items-center gap-6 mb-6">
                        <img src="{{ $resident->photo ? asset('storage/' . $resident->photo) : 'https://via.placeholder.com/150' }}" alt="Foto do residente" class="w-32 h-32 rounded shadow">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $resident->nome }}</h3>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            for="photo"
                            class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                            Editar imagem
                        </label>
                        <input
                            type="file"
                            name="photo"
                            id="photo"
                            accept="image/*"
                            class="hidden"
                            onchange="document.getElementById('photo-name').textContent = this.files[0]?.name || ''"
                        />
                        <p id="photo-name" class="mt-2 text-sm text-gray-600"></p>
                        <p class="text-xs text-gray-500 mt-1">JPG ou PNG até 2MB.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium">Idade</label>
                            <input type="number" name="idade" value="{{ $resident->idade }}" class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Contato</label>
                            <input type="text" name="contato_responsavel" value="{{ $resident->contato_responsavel }}" class="w-full border rounded p-2">
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
                                $opcoes = ['Boa', 'Regular', 'Precária'];
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
                        <button type="submit" class="w-full bg-gray-800 text-white font-semibold py-2 rounded-md hover:bg-gray-600 transition">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>

            {{-- Card: Atividades Realizadas --}}
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-center">ATIVIDADES</h3>

                @if($resident->activities->isEmpty())
                    <p class="text-center text-gray-500">*Nenhuma atividade cadastrada ainda para o residente*</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                                <tr>
                                    <th class="px-4 py-2">Atividade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resident->activities as $atividade)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $atividade->nome }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            {{-- Card: Visitas --}}
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-center">HISTÓRICO DE VISITAS</h3>

                @if($resident->visits->isEmpty())
                    <p class="text-center text-gray-500">*Nenhuma visita programada ainda para o residente*</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                                <tr>
                                    <th class="px-4 py-2">Visitante</th>
                                    <th class="px-4 py-2">Data e Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resident->visits as $visita)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $visita->visitante }}</td>
                                        <td class="px-4 py-2">
                                            {{ optional($visita->data)->format('d/m/Y') ?? '-' }} 
                                            {{ optional(\Carbon\Carbon::createFromFormat('H:i:s', $visita->hora))->format('H:i') ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            {{-- Botões Gerar PDF e Excluir Residente --}}
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-6 flex gap-4 justify-center">
                <a href="{{ route('residents.report', $resident->id) }}" target="_blank"
                class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 transition">
                    Gerar Relatório PDF
                </a>

                <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este residente? Esta ação não poderá ser desfeita.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white py-2 px-6 rounded-md hover:bg-red-700 transition">
                        Excluir Residente
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
