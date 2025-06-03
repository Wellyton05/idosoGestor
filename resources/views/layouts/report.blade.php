<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório do Residente</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h1 { font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>
    <h1>Relatório do Residente: {{ $resident->nome }}</h1>

    <p><strong>Idade:</strong> {{ $resident->idade }}</p>
    <p><strong>Estado de Saúde:</strong> {{ $resident->estado_saude }}</p>

    <h2>Atividades Recentes</h2>
    <ul>
        @foreach ($resident->activities as $atividade)
    <li>
        {{ $atividade->nome }} - 
        @if ($atividade->pivot && $atividade->pivot->created_at)
            {{ \Carbon\Carbon::parse($atividade->pivot->created_at)->format('d/m/Y') }}
        @else
            Data não disponível
        @endif
    </li>
        @endforeach
    </ul>

    <h2>Visitas Recentes</h2>
    <ul>
        @foreach ($resident->visits as $visita)
            <li>{{ $visita->visitante }} - {{ $visita->data->format('d/m/Y') }} às {{ $visita->hora }}</li>
        @endforeach
    </ul>
</body>
</html>
