@section('title', 'Atividades - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-900">
                {{ __('Atividades') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Barra de pesquisa -->
            <form method="GET" action="{{ route('activities.index') }}" 
                class="flex flex-col md:flex-row md:items-end gap-4 bg-white p-6 rounded-lg shadow-sm border border-gray-100 max-w-6xl mx-auto"
            >
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome da atividade</label>
                    <input 
                        name="search"
                        type="search" 
                        id="search" 
                        value="{{ request('search') }}"
                        placeholder="Digite o nome da atividade"
                        class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
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
                        href="{{ route('activities.index') }}"
                        class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors shadow-sm"
                    >
                        Limpar
                    </a>
                    <a 
                        href="{{ route('activities.reportPdf') }}"
                        target="_blank"
                        class="px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition"
                    >
                        Gerar Relatório
                    </a>
                </div>
            </form>

            <!-- Tabela -->
            <div class="mt-8 max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-sm border border-gray-100 overflow-x-auto">
                <table class="w-full text-gray-700 text-sm table-fixed">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium w-1/4">Atividade</th>
                            <th class="py-3 px-4 text-left font-medium w-3/4">Participantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities as $activity)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4 font-semibold text-gray-900 align-top">
                                    <div class="break-words">{{ $activity->nome }}</div>
                                </td>
                                <td class="py-4 px-4 text-gray-800">
                                    <!-- Formulário de adição - sempre no topo -->
                                    <div class="mb-4">
                                        <form method="POST" action="{{ route('activities.addResident', $activity->id) }}" class="flex items-center gap-2">
                                            @csrf
                                            <div class="flex-1 min-w-0">
                                                <select name="resident_id" required
                                                    class="appearance-none border border-gray-300 rounded-md px-3 pr-8 py-2 text-sm text-gray-700
                                                    focus:ring-2 focus:ring-green-400 focus:border-green-400 w-full transition"
                                                >
                                                    <option value="" disabled selected>Selecione um residente</option>
                                                    @foreach($residents as $resident)
                                                        <option value="{{ $resident->id }}">{{ $resident->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" 
                                                class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-md shadow-sm transition flex-shrink-0"
                                            >
                                                +
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Container dos participantes com altura fixa e scroll -->
                                    <div class="border border-gray-300 rounded-md p-3 bg-gray-50">
                                        @if($activity->residents->count() > 0)
                                            <div class="max-h-32 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                                                    @foreach($activity->residents as $participant)
                                                        <div class="flex items-center justify-between bg-white px-3 py-2 rounded-lg text-sm text-gray-800 shadow-sm border border-gray-200">
                                                            <span class="truncate flex-1 mr-2">{{ $participant->nome }}</span>
                                                            <form 
                                                                method="POST" 
                                                                action="{{ route('activities.removeResident', [$activity->id, $participant->id]) }}" 
                                                                onsubmit="return confirm('Tem certeza que deseja excluir este residente dessa atividade? Esta ação não poderá ser desfeita.');"
                                                                class="flex-shrink-0"
                                                            >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button 
                                                                    type="submit" 
                                                                    class="text-white bg-red-500 hover:bg-red-600 w-6 h-6 rounded-full flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-red-400 transition-colors" 
                                                                    title="Remover participante" 
                                                                    aria-label="Remover participante {{ $participant->nome }}"
                                                                >
                                                                    ×
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center text-gray-500 py-4 text-sm">
                                                Nenhum participante adicionado
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        Nenhuma atividade encontrada.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex justify-center">
                {{ $activities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>