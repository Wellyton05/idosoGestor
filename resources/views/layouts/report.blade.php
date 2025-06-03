<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório do Residente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 40px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        h2 {
            font-size: 18px;
            margin-top: 30px;
            margin-bottom: 10px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            color: #2c3e50;
        }

        p {
            margin: 4px 0;
        }

        .section {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .info-box {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <h1>Relatório do Residente</h1>

    <div class="info-box">
        <p><strong>Nome:</strong> {{ $resident->nome }}</p>
        <p><strong>CPF:</strong> {{ $resident->cpf }}</p>
        <p><strong>Idade:</strong> {{ $resident->idade }} anos</p>
        <p><strong>Estado de Saúde:</strong> {{ $resident->estado_saude }}</p>
        <p><strong>Nome familiar/responsável:</strong> {{ $resident->nome_responsavel }}</p>
        <p><strong>Contato(familiar/responsável):</strong> {{ $resident->contato_responsavel }}</p>
    </div>

    <div class="section">
        <h2>Atividades</h2>
        @if($resident->activities->count())
            <table>
                <thead>
                    <tr>
                        <th>Atividade</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resident->activities as $atividade)
                        <tr>
                            <td>{{ $atividade->nome }}</td>
                            <td>
                                @if ($atividade->pivot && $atividade->pivot->created_at)
                                    {{ \Carbon\Carbon::parse($atividade->pivot->created_at)->format('d/m/Y') }}
                                @else
                                    Não disponível
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhuma atividade registrada.</p>
        @endif
    </div>

    <div class="section">
        <h2>Visitas</h2>
        @if($resident->visits->count())
            <table>
                <thead>
                    <tr>
                        <th>Visitante</th>
                        <th>Data</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resident->visits as $visita)
                        <tr>
                            <td>{{ $visita->visitante }}</td>
                            <td>{{ $visita->data->format('d/m/Y') }}</td>
                            <td>{{ $visita->hora }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhuma visita registrada.</p>
        @endif
    </div>

</body>
</html>
