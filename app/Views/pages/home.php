<main class="container-xl">
    <section class="row">
        <div class="col">
            <h1>Calendar</h1>
        </div>
    </section>

    <section class="row calendar">
        <div class="col">
            <div id='calendar'></div>
        </div>
    </section>



    <!-- New Booking Modal -->
    <div class="modal fade" id="newBookingModal" tabindex="-1" role="dialog"
         aria-labelledby="newBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newBookingModalLabel">New Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col form-group">
                                <label for="contract">Contract <span class="font-italic small text-muted">(required)</span></label>
                                <?= form_dropdown('contract', $contract_list,'',
                                    'class="form-control d-block w-100" id="contract" required'); ?>
                                <div class="invalid-feedback">
                                    Please choose a contract
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="room">Room</label>
                                <?= form_dropdown('room', $room_list,'',
                                    'class="form-control d-block w-100" id="room" disabled'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="start">Start time</label>
                                <input type="text" class="form-control" name="start" id="start" disabled>
                                <input type="hidden" id="startTime" name="startTime">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="end">End time</label>
                                <input type="text" class="form-control" name="end" id="end" disabled>
                                <input type="hidden" id="endTime" name="endTime">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="saveNewBooking()">Save booking</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    
</main>