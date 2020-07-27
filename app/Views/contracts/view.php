<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/contracts'); ?>">&lt; Back to contract list</a>
        </div>
    </section>
    <section class="row mt-3 mb-4 justify-content-between">
        <div class="col-auto">
            <h2><?= esc($contract['event_title']); ?></h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-info" href="#">Export</a>
            <a class="btn btn-outline-info" href="<?= base_url('contracts/edit/' .  esc($contract['contract_id'])); ?>">
                Edit contract details</a>
        </div>
    </section>

    <section class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-auto mb-3 mb-md-5 order-last order-md-first">
                    <div class="nav flex-column nav-pills" id="tabs" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="customer-tab" data-toggle="pill" href="#customer-panel"
                           role="tab" aria-controls="customer-panel" aria-selected="true">Customer &gt;</a>
                        <a class="nav-link" id="room-tab" data-toggle="pill" href="#room-panel"
                           role="tab" aria-controls="room-panel" aria-selected="false">Room Bookings &gt;</a>
                        <a class="nav-link" id="event-tab" data-toggle="pill" href="#event-panel"
                           role="tab" aria-controls="event-panel" aria-selected="false">Event Instances &gt;</a>
                        <a class="nav-link" id="invoice-tab" data-toggle="pill" href="#invoice-panel"
                           role="tab" aria-controls="invoice-panel" aria-selected="false">Invoices &gt;</a>
                    </div>
                </div>
                <div class="col-12">
                    <dl class="row">
                        <dt class="col-sm-5"><h6>Booking Status:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['booking_status']); ?></dd>
                        <dt class="col-sm-5"><h6>Genre:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['genre']); ?></dd>
                        <dt class="col-sm-5"><h6>Age Guidance:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['guidance']); ?></dd>
                        <dt class="col-sm-5"><h6>Running Time:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['running_time']); ?> minutes</dd>
                        <dt class="col-sm-5"><h6>Get In:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['get_in']); ?></dd>
                        <dt class="col-sm-5"><h6>Get Out:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['get_out']); ?></dd>
                        <dt class="col-sm-5"><h6>Requirements:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['requirements']); ?></dd>
                        <dt class="col-sm-5"><h6>Contract Type:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['contract_type']); ?></dd>
                        <dt class="col-sm-5"><h6>Agreed Price:</h6></dt>
                        <dd class="col-sm-7">£ <?= esc($contract['price_agreed']); ?></dd>
                        <dt class="col-sm-5"><h6>Deposit:</h6></dt>
                        <dd class="col-sm-7">£ <?= esc($contract['deposit']); ?></dd>
                        <dt class="col-sm-5"><h6>Revenue Split:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['revenue_split']); ?> %</dd>
                        <dt class="col-sm-5"><h6>Ticket Sales:</h6></dt>
                        <dd class="col-sm-7">£ <?= esc($contract['ticket_sales']); ?></dd>
                        <dt class="col-sm-5"><h6>Miscellaneous Terms:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['misc_terms']); ?></dd>
                        <dt class="col-sm-5"><h6>Updated By:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['updated_by']); ?></dd>
                        <dt class="col-sm-5"><h6>Updated On:</h6></dt>
                        <dd class="col-sm-7"><?= esc($contract['updated_on']); ?></dd>
                    </dl>
                </div>

                <div class="col-12 mb-4">
                    <a class="btn btn-info" href="<?= base_url(esc($contract['quote'])); ?>">Quote</a>
                    <a class="btn btn-info" href="<?= base_url(esc($contract['contract'])); ?>">Contract</a>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="tab-content" id="panels">
                <div class="tab-pane fade show active" id="customer-panel" role="tabpanel"
                     aria-labelledby="customer-tab">
                    <div class="row mb-4">
                        <div class="col">
                            <h3><?= esc($customer['company_name']); ?></h3>
                        </div>
                    </div>

                    <dl class="row">
                        <dt class="col-sm-4"><h6>Address:</h6></dt>
                        <dd class="col-sm-8">
                            <?= esc($customer['address']); ?><br>
                            <?= esc($customer['town']); ?><br>
                            <?= esc($customer['county']); ?><br>
                            <?= esc($customer['postcode']); ?>
                        </dd>
                        <dt class="col-sm-4"><h6>Phone number:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['phone']); ?></dd>
                        <dt class="col-sm-4"><h6>Email:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['email']); ?></dd>
                        <dt class="col-sm-4"><h6>Contact name:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['contact_name']); ?></dd>
                        <dt class="col-sm-4"><h6>VAT number:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['vat_number']); ?></dd>
                        <dt class="col-sm-4"><h6>Customer ID:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['customer_id']); ?></dd>
                        <dt class="col-sm-4"><h6>Other details:</h6></dt>
                        <dd class="col-sm-8"><?= esc($customer['other_details']); ?></dd>
                    </dl>

                </div>

                <div class="tab-pane fade" id="room-panel" role="tabpanel"
                     aria-labelledby="room-tab">
                    <?php if (! empty($bookings) && is_array($bookings)) :
                        foreach ($bookings as $item): ?>
                        <div class="row mb-2">
                            <div class="col">
                                <h4><?= esc($item['name']); ?></h4>
                                <p><?= esc($item['start']); ?> - <?= esc($item['end']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php else : ?>
                        <p class="col mt-5">No room bookings</p>
                    <?php endif ?>

                </div>

                <div class="tab-pane fade" id="event-panel" role="tabpanel"
                     aria-labelledby="event-tab">
                    <?php if (! empty($events) && is_array($events)) :
                        foreach ($events as $item): ?>
                            <div class="row mb-2">
                                <div class="col">
                                    <h4><?= esc($item['show']); ?></h4>
                                </div>
                            </div>
                            <dl class="row mb-4">
                                <dt class="col-sm-4"><h6>Standard:</h6></dt>
                                <dd class="col-sm-8">£ <?= esc($item['standard']); ?></dd>
                                <dt class="col-sm-4"><h6>Concession:</h6></dt>
                                <dd class="col-sm-8">£ <?= esc($item['concession']); ?></dd>
                                <dt class="col-sm-4"><h6>Student:</h6></dt>
                                <dd class="col-sm-8">£ <?= esc($item['student']); ?></dd>
                            </dl>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="col mt-5">No event instances</p>
                    <?php endif ?>

                </div>

                <div class="tab-pane fade" id="invoice-panel" role="tabpanel"
                     aria-labelledby="invoice-tab">
                    <?php if (! empty($invoices) && is_array($invoices)) :
                        foreach ($invoices as $item): ?>
                            <div class="row mb-2">
                                <div class="col">
                                    <h4><?= esc($item['invoice_date']); ?></h4>
                                </div>
                            </div>
                            <dl class="row mb-4">
                                <dt class="col-sm-4"><h6>Invoice Number:</h6></dt>
                                <dd class="col-sm-8"><?= esc($item['invoice_number']); ?></dd>
                                <dt class="col-sm-4"><h6>Amount:</h6></dt>
                                <dd class="col-sm-8">£ <?= esc($item['amount']); ?></dd>
                                <dt class="col-sm-4"><h6>Paid:</h6></dt>
                                <dd class="col-sm-8"><?= ($item['paid'] == 1) ? 'Yes' : 'No'; ?></dd>
                            </dl>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <p class="col mt-5">No invoices</p>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </section>

</main>