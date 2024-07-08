<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Correo Electrónico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            text-align: center;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #555555;
        }
        .content .button {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            background-color: #007bff;
            padding: 10px 20px;
            margin: 20px 0;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ $message->embed(public_path('assets/img/logohorizontal.png')) }}" alt="Logo">
        </div>
        <div class="content">
            <h1>Verificación de Correo Electrónico</h1>
            <p>Hola,</p>
            <p>Por favor, haz clic en el botón siguiente para verificar tu correo electrónico:</p>
            <a href="{{ $url }}" class="button">Verificar Correo Electrónico</a>
            <p>Si no solicitaste esta verificación, puedes ignorar este correo.</p>
        </div>
        <div class="footer">
            <p>Gracias por usar nuestra aplicación!</p>
            <p>Si tienes algún problema o pregunta sobre la app, contáctanos:</p>
            <p>WhatsApp 095 869 1809</p>
        </div>
    </div>
</body>
</html>
