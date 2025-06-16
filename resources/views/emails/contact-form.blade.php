<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 10px; text-align: center; }
        .content { margin: 20px 0; }
        .footer { font-size: 0.8em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nuevo mensaje de contacto</h2>
        </div>

        <div class="content">
            <p><strong>Nombre:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Teléfono:</strong> {{ $phone ?? 'No proporcionado' }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $messageContent }}</p>
        </div>

        <div class="footer">
            <p>Este mensaje fue enviado desde el formulario de contacto de {{ config('app.name') }}</p>
            <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
