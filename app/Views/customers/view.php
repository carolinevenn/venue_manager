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
            <a class="btn btn-info" href="<?= base_url('/contracts/add/' . esc($customer['customer_id'])); ?>">New Contract</a>
            <a class="btn btn-outline-info" href="<?= base_url('/customers/edit/' . esc($customer['customer_id'])); ?>">
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
            <ul class="nav nav-tabs" id="contracts" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="current-tab" data-toggle="tab" href="#current"
                       role="tab" aria-controls="current" aria-selected="true">Current Contracts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history"
                       role="tab" aria-controls="history" aria-selected="false">History</a>
                </li>
            </ul>
            <div class="tab-content" id="contractsContent">
                <div class="tab-pane fade show active" id="current" role="tabpanel"
                     aria-labelledby="current-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption class="sr-only">List of current contracts</caption>
                            <thead>
                            <tr>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Room</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($current) && is_array($current)) :
                                foreach ($current as $item):
                                    switch (esc($item['booking_status']))
                                    {
                                        case "Confirmed":
                                            $shading = "table-success";
                                            break;
                                        case "Paid":
                                            $shading = "table-primary";
                                            break;
                                        case "Reserved":
                                            $shading = "table-warning";
                                            break;
                                        case "Enquiry":
                                            $shading = "table-secondary";
                                            break;
                                        default:
                                            $shading = "";
                                    }?>
                                    <tr class="<?= $shading ?>" data-href="<?= base_url('/contracts/' . esc($item['contract_id'])); ?>">
                                        <td><?= esc($item['start_date']); ?></td>
                                        <td><?= esc($item['end_date']); ?></td>
                                        <td><?= esc($item['room']); ?></td>
                                        <td><?= esc($item['event_title']); ?></td>
                                        <td><?= esc($item['booking_status']); ?></td>
                                    </tr>
                                <?php endforeach;
                                      endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel"
                     aria-labelledby="history-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption class="sr-only">List of historical contracts</caption>
                            <thead>
                            <tr>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Room</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (! empty($history) && is_array($history)) :
                                    foreach ($history as $item):
                                        switch (esc($item['booking_status']))
                                        {
                                            case "Confirmed":
                                                $shading = "table-success";
                                                break;
                                            case "Paid":
                                                $shading = "table-primary";
                                                break;
                                            case "Reserved":
                                            case "Enquiry":
                                            case "Cancelled":
                                                $shading = "table-danger";
                                                break;
                                            default:
                                                $shading = "";
                                        }?>
                                        <tr class="<?= $shading ?>" data-href="<?= base_url('/contracts/' . esc($item['contract_id'])); ?>">
                                            <td><?= esc($item['start_date']); ?></td>
                                            <td><?= esc($item['end_date']); ?></td>
                                            <td><?= esc($item['room']); ?></td>
                                            <td><?= esc($item['event_title']); ?></td>
                                            <td><?= esc($item['booking_status']); ?></td>
                                        </tr>
                                    <?php endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

