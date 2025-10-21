<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Visitas</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-size: 13px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-visits {
            text-align: center;
            font-style: italic;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório Geral de Visitas Agendadas</h1>

        @if($visits->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Visitante</th>
                        <th>Residente Visitado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visits as $visit)
                        <tr>
                            <td>{{ $visit->data ? \Carbon\Carbon::parse($visit->data)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $visit->hora ? \Carbon\Carbon::parse($visit->hora)->format('H:i') : '-' }}</td>
                            <td>{{ $visit->visitante }}</td>
                            <td>{{ $visit->resident->nome ?? 'Residente não encontrado' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-visits">Nenhuma visita agendada encontrada.</p>
        @endif

    </div>
</body>
</html>