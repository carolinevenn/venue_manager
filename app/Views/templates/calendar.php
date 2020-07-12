<!-- FullCalendar stylesheets -->
<link href='fullcalendar/core/main.css' rel='stylesheet' />
<link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
<link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
<link href='fullcalendar/bootstrap/main.css' rel='stylesheet' />

<!-- FullCalendar scripts -->
<script src='fullcalendar/core/main.js'></script>
<script src='fullcalendar/core/locales/en-gb.js'></script>
<script src='fullcalendar/daygrid/main.js'></script>
<script src='fullcalendar/timegrid/main.js'></script>
<script src='fullcalendar/resource-common/main.js'></script>
<script src='fullcalendar/resource-daygrid/main.js'></script>
<script src='fullcalendar/resource-timegrid/main.js'></script>
<script src='fullcalendar/bootstrap/main.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'en-gb',
            plugins: [ 'resourceTimeGrid', 'bootstrap' ],
            defaultView: 'resourceTimeGridDay',
            header: {
                left: 'resourceTimeGridDay,resourceTimeGridWeek',
                center: 'title',
                right: 'today prev,next'
            },
            datesAboveResources: true,
            resources: [
                {
                    id: '1',
                    title: 'Auditorium'
                },
                {
                    id: '2',
                    title: 'Drama Studio'
                },
                {
                    id: '3',
                    title: 'Dance Studio'
                }
            ],
            themeSystem: 'bootstrap',
            scrollTime: '08:00:00',
        });

        calendar.render();
    });
</script>


