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
                <?php if (! empty($room) && is_array($room)) :
                foreach ($room as $item): ?>
                {
                    id: '<?= esc($item['room_id']); ?>',
                    title: '<?= esc($item['name']); ?>'
                },
                <?php endforeach;
                      endif; ?>
            ],
            events: [
                <?php if (! empty($booking) && is_array($booking)) :
                foreach ($booking as $item): ?>
                {
                    id: '<?= esc($item['booking_id']); ?>',
                    resourceId: '<?= esc($item['room_id']); ?>',
                    title: '<?= esc($item['event_title']); ?>',
                    start: '<?= esc($item['start_time']); ?>',
                    end: '<?= esc($item['end_time']); ?>'
                },
                <?php endforeach;
                endif; ?>
            ],
            themeSystem: 'bootstrap',
            scrollTime: '08:00:00',
        });

        calendar.render();
    });
</script>


