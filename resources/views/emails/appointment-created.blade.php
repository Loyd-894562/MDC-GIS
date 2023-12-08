<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/emails/appointment-created.blade.php -->

<p>Dear {{ $appointment->fullname }},</p>

<p>Your appointment has been successfully scheduled for {{ $appointment->date }} at {{ $appointment->time }}.</p>

<p>Reason: {{ $appointment->reason }}</p>

<p>Thank you for choosing our service.</p>

</body>
</html>
