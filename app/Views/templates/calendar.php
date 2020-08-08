<?php
// Select event colors according to booking status
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
            height: '100%',
            initialDate: new Date(),
            initialView: 'resourceTimeGridDay',
            resourceAreaHeaderContent: 'Rooms',
            editable: true,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            allDaySlot: false,
            dayMinWidth: 100,
            customButtons: {
                nextMonth: {
                    text: 'next month',
                    click: function() {
                        calendar.incrementDate({month: 1});
                    }
                },
                prevMonth: {
                    text: 'prev. month',
                    click: function() {
                        calendar.incrementDate({month: -1});
                    }
                }
            },
            headerToolbar: {
                left: 'resourceTimeGridDay,resourceTimeGridWeek,resourceTimelineWeek',
                center: 'title',
                right: 'today prev,next prevMonth,nextMonth'
            },
            themeSystem: 'bootstrap',
            eventOverlap: false,
            resourceAreaWidth: 150, // Width available for resource names in Timeline view
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
                // Create array of room details
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
                // Create array of 'event' (room booking) details
                <?php if (! empty($booking) && is_array($booking)) :
                foreach ($booking as $item): ?>
                {
                    id: '<?= esc($item['booking_id']); ?>',
                    resourceId: '<?= esc($item['room_id']); ?>',
                    title: '<?= esc($item['event_title']); ?>',
                    start: '<?= esc($item['start_time']); ?>',
                    end: '<?= esc($item['end_time']); ?>',
                    color: '<?php getColor(esc($item['booking_status']));?>',
                    url: '<?= base_url('contracts/'.esc($item['contract_id']));?>'
                },
                <?php endforeach;
                endif; ?>
            ],

            // Create new room booking when an empty timeslot is selected
            select: function(arg) {
                // Launch and populate Booking modal
                $('#newBookingModal').modal();
                $('#room').val(arg.resource ? arg.resource.id : '');
                $('#start').val(arg.start);
                $('#end').val(arg.end);
                $('#startTime').val(arg.startStr);
                $('#endTime').val(arg.endStr);
                // Ensure booking is only saved once
                $('#mdlSave').off("click");
                // Save booking
                $('#mdlSave').click(function() {

                    var start =  $('#startTime').val();
                    var end = $('#endTime').val();
                    var id = $('#contract').val();
                    var room = $('#room').val();

                    $.ajax({
                        url: "<?php echo base_url('calendar/add');?>",
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: "POST",
                        data:{start:start, end:end, id:id, room:room},
                        success: function()
                        {
                            alert("Room booking saved");
                            $("#newBookingModal").modal("hide");
                        },
                        fail: function()
                        {
                            alert( "Cannot save this room booking" );
                        },
                        complete: function()
                        {
                            // Reload the page to show the new booking
                            location.reload();
                        }
                    });
                });
            },

            // Move an existing room booking
            eventDrop: function(info) {
                // Ask for confirmation
                if (!confirm("Are you sure about this change?"))
                {
                    // Cancel change
                    info.revert();
                }
                else
                {
                    // Save change
                    var start = info.event.startStr;
                    var end = info.event.endStr;
                    var id = info.event.id;
                    var room =  info.newResource ? info.newResource.id : info.event._def.resourceIds[0];

                    $.ajax({
                        url: "<?php echo base_url('calendar/update');?>",
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: "POST",
                        data:{start:start, end:end, id:id, room:room},
                        success: function()
                        {
                            alert("Room booking updated");
                        },
                        fail: function()
                        {
                            alert( "Cannot update this room booking" );
                        },
                        complete: function()
                        {
                            calendar.refetchEvents();
                        }
                    });
                }
            },
            // Change existing room booking start/end time
            eventResize: function(info) {
                // Ask for confirmation
                if (!confirm("Are you sure about this change?"))
                {
                    // Cancel change
                    info.revert();
                }
                else
                {
                    // Save change
                    var start = info.event.startStr;
                    var end = info.event.endStr;
                    var id = info.event.id;
                    var room = info.event._def.resourceIds[0];

                    $.ajax({
                        url: "<?php echo base_url('calendar/update');?>",
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: "POST",
                        data:{start:start, end:end, id:id, room:room},
                        success: function()
                        {
                            alert("Room booking updated");
                        },
                        fail: function()
                        {
                            alert( "Cannot update this room booking" );
                        },
                        complete: function()
                        {
                            calendar.refetchEvents();
                        }
                    });
                }
            }
        });

        // Render the calendar
        calendar.render();
    });

</script>
