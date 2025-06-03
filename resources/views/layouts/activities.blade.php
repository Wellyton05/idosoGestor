@section('title', 'Atividades - ' . config('app.name'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atividades') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Barra de pesquisa -->
            <div class="w-full md:w-96 mx-auto mt-6">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Nome da atividade</label>

                <form method="GET" action="{{ route('activities.index') }}" class="flex items-center">
                    <input 
                        name="search"
                        type="search" 
                        id="search" 
                        class="block w-full pl-4 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Digite o nome da atividade" 
                    />
                    <button 
                        type="submit" 
                        class="ml-2 px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-600 transition"
                    >
                        Buscar
                    </button>
                </form>
            </div>

            <!-- Tabela -->
            <div class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-t border-gray-200">
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 40%">Atividade:</th>
                            <th class="py-3 text-left text-sm font-medium text-gray-700" style="width: 60%">Participantes:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities as $activity)
                            <tr class="border-b border-gray-200">
                                <!-- Nome da atividade -->
                                <td class="py-4 text-sm text-gray-800 font-semibold">{{ $activity->nome }}</td>
                                
                                <!-- Select e botão de adicionar participante -->
                                <td class="py-4 text-sm text-gray-800">
                                <!-- Formulário de adicionar participante -->
                                <form method="POST" action="{{ route('activities.addResident', $activity->id) }}" class="flex items-center space-x-2">
                                    @csrf
                                    <select name="resident_id" class="border border-gray-300 rounded px-2 py-1 text-sm">
                                        @foreach($residents as $resident)
                                            <option value="{{ $resident->id }}">{{ $resident->nome }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-2 py-1 rounded" title="Adicionar participante">
                                        +
                                    </button>
                                </form>

                                <!-- Participantes já vinculados -->
                                <ul class="mt-3 space-y-1">
                                    @foreach($activity->residents as $participant)
                                        <li class="flex justify-between items-center bg-gray-100 px-3 py-1 rounded">
                                            <span>{{ $participant->nome }}</span>
                                            <form method="POST" action="{{ route('activities.removeResident', [$activity->id, $participant->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 px-2 py-1 rounded" title="Remover participante">
                                                    x
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-4 text-center text-gray-500">
                                    Nenhuma atividade encontrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="mt-8 flex justify-center">
                {{ $activities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
