@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reservations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reservations</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card p-3">
            <div id='calendar'></div>
        </div>

    </section>
    <!-- /.content -->
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            firstDay: 1,
            // Add other configuration options as needed
            dateClick: function (info) {
                $('#eventDate').val(info.dateStr); // Fill the date field in the modal
                $('#eventModal').modal('show'); // Show the modal
            },
            selectable: true,
            slotMinTime: '08:00:00',
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            headerToolbar: {
                left: 'prev today next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/reservations/json',
            eventClassNames: function (arg) {
                var statusColor = '';

                switch (arg.event.extendedProps.status) {
                    case 'Requested':
                        statusColor = 'bg-warning';
                        break;
                    case 'Approved':
                        statusColor = 'bg-success';
                        break;
                    case 'Rejected':
                        statusColor = 'bg-danger';
                        break;
                    default:
                        statusColor = '';
                }

                return [statusColor];
            },

        });

        calendar.render();
    });

</script>

@include('features.reservation.modals.add_event')
@endsection
