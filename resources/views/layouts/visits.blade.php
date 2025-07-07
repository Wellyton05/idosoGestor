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

        <!-- Calendário -->
        <div class="w-full md:flex-1 bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Calendário de Visitas</h3>
            <div id="calendar"></div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt-br', 
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listWeek'
            },
            buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Dia',
                list: 'Lista'
            },
            noEventsContent: 'Nenhuma visita agendada',
            events: @json($visitas->map(fn($v) => [
                'title' => $v->visitante . ' → ' . $v->residente->nome,
                'start' => $v->data->format('Y-m-d') . 'T' . $v->hora
            ]))
        });
        calendar.render();
    });
</script>