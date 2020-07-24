<?php
function getColor($status)
{
    switch ($status)
    {
        case "Confirmed":
            echo "#28a745";
            break;
        case "Paid":
            echo "#007bff";
            break;
        case "Reserved":
            echo "#ffc107";
            break;
        case "Enquiry":
            echo "#a0a6ac";
            break;
        default:
            echo "#dc3545";
    }
}
?>

<!-- FullCalendar stylesheets -->
<link href='fullcalendar-scheduler/lib/main.css' rel='stylesheet' />

<!-- FullCalendar scripts -->
<script src='fullcalendar-scheduler/lib/main.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'en-gb',
            timeZone: 'local',
            initialDate: new Date(),
            initialView: 'resourceTimeGridDay',
            resourceAreaHeaderContent: 'Rooms',
            editable: true,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            dayMinWidth: 100,
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'resourceTimeGridDay,resourceTimeGridWeek,resourceTimelineWeek'
            },
            themeSystem: 'bootstrap',
            eventOverlap: false, // will cause the event to take up entire resource height
            resourceAreaWidth: 150,
            datesAboveResources: true,
            scrollTime: '08:00:00',
            views: {
                resourceTimelineWeek: {
                    slotDuration: '04:00:00',
                    scrollTime: '00:00:00',
                    buttonText: 'timeline'
                }
            },
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
                    end: '<?= esc($item['end_time']); ?>',
                    color: '<?php getColor(esc($item['booking_status']));?>',
                },
                <?php endforeach;
                endif; ?>
            ],

        });

        calendar.render();
    });
</script>


