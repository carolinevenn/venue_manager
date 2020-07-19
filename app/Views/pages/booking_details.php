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
        <div class="col-md-4">
            <div class="row">
                <div class="col-auto mb-3 mb-md-5 order-last order-md-first">
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
                <div class="col-12">
                    <dl class="row">
                        <dt class="col-sm-5"><h6>Booking Status:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Genre:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Age Guidance:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Running Time:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Get In:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Get Out:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Requirements:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Contract Type:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Agreed Price:</h6></dt>
                        <dd class="col-sm-7">£...</dd>
                        <dt class="col-sm-5"><h6>Deposit:</h6></dt>
                        <dd class="col-sm-7">£...</dd>
                        <dt class="col-sm-5"><h6>Revenue Split:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Ticket Sales:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Miscellaneous Terms:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Updated By:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                        <dt class="col-sm-5"><h6>Updated On:</h6></dt>
                        <dd class="col-sm-7">...</dd>
                    </dl>
                </div>

                <div class="col-12 mb-4">
                    <a class="btn btn-info" href="#">Quote</a>
                    <a class="btn btn-info" href="#">Contract</a>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="tab-content" id="panels">
                <div class="tab-pane fade show active" id="customer-panel" role="tabpanel"
                     aria-labelledby="customer-tab">
                    <div class="row mb-4 justify-content-between">
                        <div class="col">
                            <h3>Company name</h3>
                        </div>
                    </div>

                    <dl class="row">
                        <dt class="col-sm-4"><h6>Address:</h6></dt>
                        <dd class="col-sm-8">Address<br>Town<br>County<br>Postcode</dd>
                        <dt class="col-sm-4"><h6>Phone number:</h6></dt>
                        <dd class="col-sm-8">01234 567890</dd>
                        <dt class="col-sm-4"><h6>Email:</h6></dt>
                        <dd class="col-sm-8">email@example.com</dd>
                        <dt class="col-sm-4"><h6>Contact name:</h6></dt>
                        <dd class="col-sm-8">Mr John Smith</dd>
                        <dt class="col-sm-4"><h6>VAT number:</h6></dt>
                        <dd class="col-sm-8">123456789</dd>
                        <dt class="col-sm-4"><h6>Customer ID:</h6></dt>
                        <dd class="col-sm-8">12345</dd>
                        <dt class="col-sm-4"><h6>Other details:</h6></dt>
                        <dd class="col-sm-8">Any other details about the customer that might be considered relevant</dd>
                    </dl>

                </div>

                <div class="tab-pane fade" id="room-panel" role="tabpanel"
                     aria-labelledby="room-tab">
                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Start Time - End Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Room:</h6></dt>
                        <dd class="col-sm-8">Room name</dd>
                        <dt class="col-sm-4"><h6>Price:</h6></dt>
                        <dd class="col-sm-8">Hourly rate and/or Daily rate</dd>
                        <dt class="col-sm-4"><h6>Capacity:</h6></dt>
                        <dd class="col-sm-8">250 seated</dd>
                        <dt class="col-sm-4"><h6>Resources:</h6></dt>
                        <dd class="col-sm-8">E.g. projector, audio equipment, lights etc.</dd>
                    </dl>

                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Start Time - End Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Room:</h6></dt>
                        <dd class="col-sm-8">Room name</dd>
                        <dt class="col-sm-4"><h6>Price:</h6></dt>
                        <dd class="col-sm-8">Hourly rate and/or Daily rate</dd>
                        <dt class="col-sm-4"><h6>Capacity:</h6></dt>
                        <dd class="col-sm-8">250 seated</dd>
                        <dt class="col-sm-4"><h6>Resources:</h6></dt>
                        <dd class="col-sm-8">E.g. projector, audio equipment, lights etc.</dd>
                    </dl>

                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Start Time - End Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Room:</h6></dt>
                        <dd class="col-sm-8">Room name</dd>
                        <dt class="col-sm-4"><h6>Price:</h6></dt>
                        <dd class="col-sm-8">Hourly rate and/or Daily rate</dd>
                        <dt class="col-sm-4"><h6>Capacity:</h6></dt>
                        <dd class="col-sm-8">250 seated</dd>
                        <dt class="col-sm-4"><h6>Resources:</h6></dt>
                        <dd class="col-sm-8">E.g. projector, audio equipment, lights etc.</dd>
                    </dl>
                </div>

                <div class="tab-pane fade" id="event-panel" role="tabpanel"
                     aria-labelledby="event-tab">
                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Show Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Standard:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Concession:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Student:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                    </dl>

                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Show Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Standard:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Concession:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Student:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                    </dl>

                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Show Time</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Standard:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Concession:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Student:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                    </dl>
                </div>

                <div class="tab-pane fade" id="invoice-panel" role="tabpanel"
                     aria-labelledby="invoice-tab">
                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Invoice date</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Invoice Number:</h6></dt>
                        <dd class="col-sm-8">...</dd>
                        <dt class="col-sm-4"><h6>Amount:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Paid:</h6></dt>
                        <dd class="col-sm-8">Yes/No</dd>
                    </dl>

                    <div class="row mb-2 justify-content-between">
                        <div class="col">
                            <h3>Invoice date</h3>
                        </div>
                    </div>
                    <dl class="row mb-4">
                        <dt class="col-sm-4"><h6>Invoice Number:</h6></dt>
                        <dd class="col-sm-8">...</dd>
                        <dt class="col-sm-4"><h6>Amount:</h6></dt>
                        <dd class="col-sm-8">£...</dd>
                        <dt class="col-sm-4"><h6>Paid:</h6></dt>
                        <dd class="col-sm-8">Yes/No</dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

</main>