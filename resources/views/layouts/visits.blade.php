@section('title', 'Visitas - ' . config('app.name'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestão de Visitas</h2>
    </x-slot>
    <div class="min-h-[calc(100vh-4rem)] flex justify-center items-start bg-gray-50 px-4 py-8 gap-8 flex-wrap md:flex-nowrap">
        <div class="w-full max-w-md bg-white p-8 rounded shadow">
            <!-- Formulário de Agendamento -->
            <h3 class="text-lg font-semibold mb-4">Agende uma visita</h3>
            <p class="text-sm text-gray-500 mb-6">Selecione data, horário e informe o nome do residente para agendar uma visita</p>
            <form method="POST" action="{{ route('visits.store') }}" class="space-y-6">
                @csrf
                <!-- Data -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Data</label>
                    <input type="date" name="data" class="w-full border rounded px-3 py-2" required>
                </div>
                <!-- Horários -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Horário</label>
                    <input 
                        type="time" 
                        name="hora" 
                        id="hora" 
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        required
                    >
                </div>
                <!-- Nome visitante -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome Visitante</label>
                    <input type="text" name="visitante" class="w-full border rounded px-3 py-2" required>
                </div>
                <!-- Residente -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Residente (idoso)</label>
                    <select name="resident_id" class="w-full border rounded px-3 py-2" required>
                        @foreach($residentes as $residente)
                            <option value="{{ $residente->id }}">{{ $residente->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-gray-800 text-white font-semibold py-2 rounded-md hover:bg-gray-600 transition">
                    AGENDAR
                </button>
            </form>
        </div>
        
        <!-- Lista de Visitas -->
        <div class="w-full md:flex-1 bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Lista de Visitas Agendadas</h3>
            
            @if($visitas->count() > 0)
                <div class="space-y-4">
                    @foreach($visitas as $visita)
                        <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">{{ $visita->visitante }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Residente: <span class="font-medium">{{ $visita->residente->nome }}</span>
                                    </p>
                                    <div class="flex items-center mt-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $visita->data->format('d/m/Y') }}
                                        <svg class="w-4 h-4 ml-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $visita->hora }}
                                    </div>
                                </div>
                            </div>
                                <!-- Ações -->
                               <div class="flex justify-end mt-3 pt-3 border-t border-gray-100">
                                <form method="POST" action="{{ route('visits.destroy', $visita) }}" class="inline" 
                                      onsubmit="return confirm('Tem certeza que deseja cancelar esta visita?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                                        Cancelar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Paginação -->
                <div class="mt-6">
                    {{ $visitas->links() }}
                </div>
                
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma visita agendada</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Comece agendando uma nova visita usando o formulário ao lado.
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>