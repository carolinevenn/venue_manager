<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/customers'); ?>">&lt; Back to customer list</a>
        </div>
    </section>
    <section class="row mt-3 mb-4 justify-content-between">
        <div class="col-auto">
            <h2><?= esc($customer['company_name']); ?></h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-info" href="<?= base_url('/booking_add'); ?>">New Booking</a>
            <a class="btn btn-outline-info" href="<?= base_url('/customer_edit'); ?>">
                Edit customer details</a>
        </div>
    </section>

    <section class="row">
        <div class="col-lg-4">
            <dl class="row">
                <dt class="col-sm-5"><h6>Address:</h6></dt>
                <dd class="col-sm-7">
                    <?= esc($customer['address']); ?><br>
                    <?= esc($customer['town']); ?><br>
                    <?= esc($customer['county']); ?><br>
                    <?= esc($customer['postcode']); ?>
                </dd>
                <dt class="col-sm-5"><h6>Phone number:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['phone']); ?></dd>
                <dt class="col-sm-5"><h6>Email:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['email']); ?></dd>
                <dt class="col-sm-5"><h6>Contact name:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['contact_name']); ?></dd>
                <dt class="col-sm-5"><h6>VAT number:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['vat_number']); ?></dd>
                <dt class="col-sm-5"><h6>Customer ID:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['customer_id']); ?></dd>
                <dt class="col-sm-5"><h6>Other details:</h6></dt>
                <dd class="col-sm-7"><?= esc($customer['other_details']); ?></dd>
            </dl>
        </div>

        <div class="col-lg-8">
            <ul class="nav nav-tabs" id="bookings" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="current-tab" data-toggle="tab" href="#current"
                       role="tab" aria-controls="current" aria-selected="true">Current Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history"
                       role="tab" aria-controls="history" aria-selected="false">History</a>
                </li>
            </ul>
            <div class="tab-content" id="bookingsContent">
                <div class="tab-pane fade show active" id="current" role="tabpanel"
                     aria-labelledby="current-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption class="sr-only">List of current bookings</caption>
                            <thead>
                            <tr>
                                <th scope="col">Start Date</th>
                                <th scope="col">Room</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-success" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">12 May 2021</th>
                                <td>Dance Studio</td>
                                <td>Advanced Ballet</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr class="table-primary" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">6 June 2021</th>
                                <td>Auditorium</td>
                                <td>Summer Showcase</td>
                                <td>Paid</td>
                            </tr>
                            <tr class="table-success" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">15 May 2021</th>
                                <td>Dance Studio</td>
                                <td>Ballet for Beginners</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr class="table-warning" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">9 May 2021</th>
                                <td>Drama Studio</td>
                                <td>Tap for Beginners</td>
                                <td>Reserved</td>
                            </tr>
                            <tr class="table-secondary" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">3 December 2021</th>
                                <td>Auditorium</td>
                                <td>Christmas Showcase</td>
                                <td>Enquiry</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel"
                     aria-labelledby="history-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption class="sr-only">List of historical bookings</caption>
                            <thead>
                            <tr>
                                <th scope="col">Start Date</th>
                                <th scope="col">Room</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-primary" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">12 May 2020</th>
                                <td>Dance Studio</td>
                                <td>Advanced Ballet</td>
                                <td>Paid</td>
                            </tr>
                            <tr class="table-primary" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">6 June 2020</th>
                                <td>Auditorium</td>
                                <td>Summer Showcase</td>
                                <td>Paid</td>
                            </tr>
                            <tr class="table-primary" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">15 May 2020</th>
                                <td>Dance Studio</td>
                                <td>Ballet for Beginners</td>
                                <td>Paid</td>
                            </tr>
                            <tr class="table-danger" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">9 May 2020</th>
                                <td>Drama Studio</td>
                                <td>Tap for Beginners</td>
                                <td>Cancelled</td>
                            </tr>
                            <tr class="table-danger" data-href="<?= base_url('/booking_details'); ?>">
                                <th scope="row">3 December 2019</th>
                                <td>Auditorium</td>
                                <td>Christmas Showcase</td>
                                <td>Enquiry</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

