<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #3498db;
        }

        p {
            margin-bottom: 20px;
        }

        .thank-you {
            font-weight: bold;
            color: #27ae60;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Appointment Confirmation</h1>

        <p>Dear {{ $appointment->fullname }},</p>

        <p>Your appointment has been approved! Your schedule is {{ $appointment->date }} at {{ $appointment->time }}.</p>

        <p>Please see to it to be at the office on time. Thank you!</p>

        <p>Have a Good Day!</p>

        <div class="footer">
            <p>This is an automated email. Please do not reply to this message.</p>
        </div>
    </div>
</body>
</html>
