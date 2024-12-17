<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reminder Email</title>
</head>
<body>
    <h1>Hello, {{ $recipientName }}</h1>
    <p>Just a reminder:</p>
    <p>{{ $messages }}</p>
    <p>Reminder Time: {{ $reminderTime }}</p>
</body>
</html>