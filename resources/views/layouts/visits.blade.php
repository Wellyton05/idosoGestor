<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestão de Visitas</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Formulário de Agendamento -->
        <div>
            <h3 class="text-lg font-semibold">Agende uma visita</h3>
            <p class="text-sm text-gray-500 mb-4">Selecione data, horário e informe o nome do residente para agendar uma visita</p>

            <form method="POST" action="{{ route('visits.store') }}" class="space-y-4">
                @csrf

                <!-- Data -->
                <label class="block text-sm font-medium text-gray-700">Data</label>
                <input type="date" name="data" class="w-full border rounded px-3 py-2" required>

                <!-- Horários -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Horários</label>
                    <div class="grid grid-cols-4 gap-2 text-center">
                        @foreach(['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00'] as $index => $horario)
                            <div>
                                <input type="radio" name="hora" id="hora-{{ $index }}" value="{{ $horario }}" class="peer hidden" required>
                                <label for="hora-{{ $index }}" class="block border rounded px-2 py-1 cursor-pointer peer-checked:bg-gray-800 peer-checked:text-white">
                                    {{ $horario }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Nome visitante -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nome Visitante</label>
                    <input type="text" name="visitante" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Residente -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Residente (idoso)</label>
                    <select name="resident_id" class="w-full border rounded px-3 py-2" required>
                        @foreach($residentes as $residente)
                            <option value="{{ $residente->id }}">{{ $residente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full bg-gray-800 text-white font-semibold py-2 py-2 rounded-md hover:bg-gray-600 transition">AGENDAR</button>
            </form>
        </div>

        <!-- Calendário de Visitas -->
        <div>
            <h3 class="text-lg font-semibold">Calendário de visitas</h3>
            <p class="text-sm text-gray-500 mb-4">Consulte os agendamentos feitos</p>

            <form method="GET" action="{{ route('visits.index') }}" class="mb-4">
                <input type="date" name="data" value="{{ request('data', today()->toDateString()) }}" class="border rounded px-3 py-2">
                <button class="ml-2 bg-gray-800 text-white px-3 py-2 rounded font-semibold hover:bg-gray-600 transition">Filtrar</button>
            </form>

            @php
                $periodos = [
                    'Manhã' => ['09:00', '10:00', '11:00', '12:00'],
                    'Tarde' => ['13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
                    'Noite' => ['19:00', '20:00', '21:00']
                ];
            @endphp

            @foreach($periodos as $titulo => $horas)
                <div class="border mb-4 rounded overflow-hidden">
                    <div class="bg-gray-100 px-4 py-2 font-medium flex justify-between">
                        <span>{{ $titulo }}</span>
                        <span>{{ $horas[0] }} - {{ end($horas) }}</span>
                    </div>
                    @foreach($visitas->where('data', $dataSelecionada)->whereIn('hora', $horas) as $visita)
                        <div class="px-4 py-2 border-t text-sm">
                            <strong>{{ $visita->hora }}</strong> - {{ $visita->visitante }} visita {{ $visita->residente->nome }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
