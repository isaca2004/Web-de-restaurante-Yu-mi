<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva reserva</title>
</head>
<body style="font-family: sans-serif; color: #2A2019;">

    <h1 style="color: #E8452C;">Nueva reserva en Yu-mi</h1>
    <p>Ha llegado una nueva solicitud de reserva desde la web.</p>

    <table style="border-collapse: collapse; width: 100%; max-width: 500px;">
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Nombre</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Teléfono</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->phone }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Email</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->email }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Fecha</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->date }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Turno</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->time }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Comensales</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->guests }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Notas</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $reserva->notes ?? '-' }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px;">Recuerda confirmarla llamando al cliente.</p>
    <p>Sistema de reservas de Yu-mi</p>

</body>
</html>