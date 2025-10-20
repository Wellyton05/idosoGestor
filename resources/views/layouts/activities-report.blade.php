<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Atividades e Participantes</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        .container {
            width: 95%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            font-size: 18px;
        }
        .activity-block {
            margin-bottom: 25px;
            border: 1px solid #eee;
            padding: 15px;
            border-radius: 5px;
            page-break-inside: avoid; /* Tenta não quebrar o bloco da atividade entre páginas */
        }
        .activity-block h2 {
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 10px;
            color: #000;
            background-color: #f4f4f4;
            padding: 8px;
            border-radius: 3px;
        }
        ul {
            padding-left: 20px;
            margin: 0;
        }
        li {
            margin-bottom: 5px;
        }
        .no-participants {
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório de Atividades e Participantes</h1>

        @forelse($activities as $activity)
            <div class="activity-block">
                <h2>Atividade: {{ $activity->nome }}</h2>
                
                @if($activity->residents->count() > 0)
                    <strong>Participantes ({{ $activity->residents->count() }}):</strong>
                    <ul>
                        @foreach($activity->residents->sortBy('nome') as $participant)
                            <li>{{ $participant->nome }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="no-participants">Nenhum participante cadastrado nesta atividade.</p>
                @endif
            </div>
        @empty
            <p>Nenhuma atividade cadastrada.</p>
        @endforelse

    </div>
</body>
</html>