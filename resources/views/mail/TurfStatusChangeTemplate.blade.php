<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Change Notification Email</title>
    <style>
        body {
            font-family: sans-serif;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <h1>Your Turf
        is @if ($turf->status == 1)
            Activated
        @elseif ($turf->status == 2)
            On hold
        @elseif ($turf->status == 0)
            InActive
        @endif
    </h1>
    <p>Turf Name: {{ $turf->turf_name }}</p>
    <p>Turf Size: {{ $turf->size }}</p>
    <p>Turf Type: {{ $turf->turf_type }}</p>
    <p>Turf Phone: {{ $turf->phone }}</p>
    <p>Turf Location: {{ $turf->location }}</p>
    <p>Turf Activated: {{ $turf->activated_at }}</p>
    @if ($turf->status != 0)
        <p>Turf Deactive: {{ $turf->deactivated_at }} (this date turf status will be deactivated)</p>
    @endif
</body>

</html>
