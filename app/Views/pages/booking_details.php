<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/bookings'); ?>">&lt; Back to bookings list</a>
        </div>
    </section>
    <section class="row mt-3 mb-4 justify-content-between">
        <div class="col-auto">
            <h2>Event Title</h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-info" href="#">Export</a>
            <a class="btn btn-outline-info" href="<?= base_url('/booking_edit'); ?>">
                Edit booking details</a>
        </div>
    </section>

    <section class="row">
        <div class="col-lg-4">
            <div class="row mb-5">
                <div class="col-auto">
                    <div class="nav flex-column nav-pills" id="tabs" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="customer-tab" data-toggle="pill" href="#customer-panel"
                           role="tab" aria-controls="customer-panel" aria-selected="true">Customer &gt;</a>
                        <a class="nav-link" id="room-tab" data-toggle="pill" href="#room-panel"
                           role="tab" aria-controls="room-panel" aria-selected="false">Rooms &gt;</a>
                        <a class="nav-link" id="event-tab" data-toggle="pill" href="#event-panel"
                           role="tab" aria-controls="event-panel" aria-selected="false">Event Instances &gt;</a>
                        <a class="nav-link" id="invoice-tab" data-toggle="pill" href="#invoice-panel"
                           role="tab" aria-controls="invoice-panel" aria-selected="false">Invoices &gt;</a>
                    </div>
                </div>
            </div>

            <dl class="row">
                <dt class="col-sm-5"><h6>Running Time:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Genre:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Guidance:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Agreed Price:</h6></dt>
                <dd class="col-sm-7">£...</dd>
                <dt class="col-sm-5"><h6>Deposit:</h6></dt>
                <dd class="col-sm-7">£...</dd>
                <dt class="col-sm-5"><h6>Contract Type:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Revenue Split:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Booking Status:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Requirements:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Ticket Sales:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Get In:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Get Out:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Miscellaneous Terms:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Updated By:</h6></dt>
                <dd class="col-sm-7">...</dd>
                <dt class="col-sm-5"><h6>Updated On:</h6></dt>
                <dd class="col-sm-7">...</dd>
            </dl>

            <div class="row">
                <div class="col">
                    <a class="btn btn-info" href="#">Quote</a>
                    <a class="btn btn-info" href="#">Contract</a>
                </div>
            </div>

        </div>

        <div class="col-lg-8">
            <div class="tab-content" id="panels">
                <div class="tab-pane fade show active" id="customer-panel" role="tabpanel"
                     aria-labelledby="customer-tab">Customer details</div>
                <div class="tab-pane fade" id="room-panel" role="tabpanel"
                     aria-labelledby="room-tab">Room details</div>
                <div class="tab-pane fade" id="event-panel" role="tabpanel"
                     aria-labelledby="event-tab">Event details</div>
                <div class="tab-pane fade" id="invoice-panel" role="tabpanel"
                     aria-labelledby="invoice-tab">Invoice details</div>
            </div>
        </div>
    </section>

</main>