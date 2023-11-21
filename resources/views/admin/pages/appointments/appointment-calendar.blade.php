@extends('admin.layout.base')

@section('content')
    <div id='calendar'></div>
@endsection

@section('scripts')
    <script src="{{ asset('/node_modules/@fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('/node_modules/@fullcalendar/daygrid/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOMContentLoaded event fired');
            var appointments = {!! $appointments !!};
            var events = [];
            appointments.forEach(function(appointment) {
                events.push({
                    title: 'Appointment',
                    start: appointment.date // Assuming appointment.date is a valid date string
                    // You might need to format the date according to FullCalendar's requirements
                    // For example, if 'date' is in 'YYYY-MM-DD' format, it should work fine
                });
            });


            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                events: events
            });

            calendar.render();
        });
    </script>
@endsection
