<main class="container-xl">

    <!-- Display Calendar -->
    <section class="row calendar mt-4">
        <div class="col">
            <div id='calendar'></div>
        </div>
    </section>


    <!-- New Booking Modal -->
    <div class="modal fade" id="newBookingModal" tabindex="-1" role="dialog"
         aria-labelledby="newBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="newBookingModalLabel">New Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- New Booking form -->
                <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col form-group">
                                    <!-- Choose Contract -->
                                    <label for="contract">Contract
                                        <span class="font-italic small text-muted">(required)</span>
                                    </label>
                                    <?= form_dropdown('contract', $contract_list,'',
                                        'class="form-control d-block w-100" id="contract" 
                                            required'); ?>
                                    <div class="invalid-feedback">
                                        Please choose a contract
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Room Name -->
                                <div class="col form-group">
                                    <label for="room">Room</label>
                                    <?= form_dropdown('room', $room_list,'',
                                        'class="form-control d-block w-100" id="room" 
                                        disabled'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Start Time -->
                                <div class="col form-group">
                                    <label for="start">Start time</label>
                                    <!-- Formatted datetime (disabled) -->
                                    <input type="text" class="form-control" name="start" id="start"
                                           disabled>
                                    <!-- Un-formatted datetime (hidden) -->
                                    <input type="hidden" id="startTime" name="startTime">
                                </div>
                            </div>
                            <div class="row">
                                <!-- End Time -->
                                <div class="col form-group">
                                    <label for="end">End time</label>
                                    <!-- Formatted datetime (disabled) -->
                                    <input type="text" class="form-control" name="end" id="end"
                                           disabled>
                                    <!-- Un-formatted datetime (hidden) -->
                                    <input type="hidden" id="endTime" name="endTime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Cancel booking -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cancel
                        </button>
                        <!-- Save booking -->
                        <button type="button" class="btn btn-success" id="mdlSave">
                            Save booking
                        </button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    
</main>
