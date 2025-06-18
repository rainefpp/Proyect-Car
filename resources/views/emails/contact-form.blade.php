<!DOCTYPE html>
<html>

<head>
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            align-content: center;
        }

        .header {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .content {
            margin: 20px 0;
        }

        .footer {
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Gracias por contactar a <strong>Carzone</strong></h2>
        </div>

        <div class="content">
            <p><strong>{{ $name }}</strong>, tu mensaje fue recibido y tendras una pronta respuesta de nuestro
                equipo, gracias por preferirnos.</p>
        </div>

        <div class="footer">
            <p>Este mensaje fue enviado desde el formulario de contacto de {{ config('app.name') }}</p>
            <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>

</html>
