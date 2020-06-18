<!-- FullCalendar stylesheets -->
<link href='fullcalendar/core/main.css' rel='stylesheet' />
<link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
<link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
<link href='fullcalendar/bootstrap/main.css' rel='stylesheet' />

<!-- FullCalendar scripts -->
<script src='fullcalendar/core/main.js'></script>
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
            plugins: [ 'resourceTimeGrid', 'bootstrap' ],
            defaultView: 'resourceTimeGridDay',
            resources: [
                {
                    id: 'a',
                    title: 'Auditorium'
                },
                {
                    id: 'b',
                    title: 'Drama Studio'
                },
                {
                    id: 'c',
                    title: 'Dance Studio'
                }
            ],
            themeSystem: 'bootstrap',
            scrollTime: '08:00:00'
        });

        calendar.render();
    });





</script>


