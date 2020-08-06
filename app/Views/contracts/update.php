<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/contracts/'.esc($contract['contract_id'])); ?>">
                &lt; Back to contract
            </a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>Edit Contract</h2>
        </div>
    </section>

    <!-- Display any validation errors -->
    <?php if ($method === 'post') : ?>
        <section class="row">
            <div class="col-auto mx-auto alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Update Contract form -->
    <?= form_open_multipart(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Choose Customer -->
                    <div class="col form-group">
                        <label for="customer">Customer
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <?= form_dropdown('customer', $customer_list,
                            esc($contract['customer_id']), 'id="customer" 
                            class="form-control d-block w-100" required'); ?>
                        <div class="invalid-feedback">
                            Please choose a customer
                        </div>
                    </div>
                    <!-- Link to create new customer -->
                    <div class="col-auto align-self-end form-group">
                        <a class="btn btn-outline-info"
                           href="<?= base_url('/customers/add'); ?>">New Customer</a>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col">
                        <h5>Event details</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- Event title -->
                    <div class="col form-group">
                        <label for="event">Event Title
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="event" name="event" required
                               value="<?= esc($contract['event_title']); ?>">
                        <div class="invalid-feedback">
                            Please enter the event title
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Genre -->
                    <div class="col-md-6 form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre"
                               value="<?= esc($contract['genre']); ?>">
                    </div>
                    <!-- Running Time -->
                    <div class="col-md-6 form-group">
                        <label for="runTime">Running Time</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="runTime" name="runTime"
                                   step="1" value="<?= esc($contract['running_time']); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">minutes</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Guidance -->
                    <div class="col form-group">
                        <label for="guidance">Age Guidance</label>
                        <input type="text" class="form-control" id="guidance" name="guidance"
                               value="<?= esc($contract['guidance']); ?>">
                    </div>
                </div>
                <!-- Upload Documents -->
                <div class="row mt-4 mb-1">
                    <div class="col">
                        <h6>Upload Quote
                            <span class="font-italic small text-muted">
                                (PDF, DOCX, or XLSX files only)
                            </span>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <!-- Quote upload -->
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="quote" name="quote">
                            <label class="custom-file-label" for="quote">
                                <?= esc($contract['quote']); ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-1">
                    <div class="col">
                        <h6>Upload Contract
                            <span class="font-italic small text-muted">
                                (PDF, DOCX, or XLSX files only)
                            </span>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <!-- Contract upload -->
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="contract"
                                   name="contract">
                            <label class="custom-file-label" for="contract">
                                <?= esc($contract['contract']); ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto borderLeft">
                <div class="row mt-4 mt-lg-0 mb-2">
                    <div class="col">
                        <h5>Contract details</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- Contract Type -->
                    <div class="col-md-6 form-group">
                        <label for="type">Contract Type</label>
                        <input type="text" class="form-control" id="type" name="type"
                               value="<?= esc($contract['contract_type']); ?>">
                    </div>
                    <!-- Booking Status -->
                    <div class="col-md-6 form-group">
                        <label for="status">Booking Status
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <?php
                        $status = array(""=>"Choose...",
                            "Paid"=>"Paid",
                            "Confirmed"=>"Confirmed",
                            "Reserved"=>"Reserved",
                            "Enquiry"=>"Enquiry",
                            "Cancelled"=>"Cancelled");
                        echo form_dropdown('status', $status, esc($contract['booking_status']),
                            'id="status" class="form-control d-block w-100" required');
                        ?>
                        <div class="invalid-feedback">
                            Please choose a status
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Get In time -->
                    <div class="col-md-6 form-group">
                        <label for="getIn">Get In</label>
                        <input type="datetime-local" class="form-control" id="getIn" name="getIn"
                               value="<?= esc($contract['get_in']); ?>">
                    </div>
                    <!-- Get Out time -->
                    <div class="col-md-6 form-group">
                        <label for="getOut">Get Out</label>
                        <input type="datetime-local" class="form-control" id="getOut" name="getOut"
                               value="<?= esc($contract['get_out']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Agreed Price -->
                    <div class="col-md-6 form-group">
                        <label for="price">Agreed Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">£</div>
                            </div>
                            <input type="number" class="form-control" id="price" name="price"
                                   step=".01" value="<?= esc($contract['price_agreed']); ?>">
                        </div>
                    </div>
                    <!-- Deposit -->
                    <div class="col-md-6 form-group">
                        <label for="deposit">Deposit</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">£</div>
                            </div>
                            <input type="number" class="form-control" id="deposit" name="deposit"
                                   step=".01" value="<?= esc($contract['deposit']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Revenue Split -->
                    <div class="col-md-6 form-group">
                        <label for="split">Revenue Split</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="split" name="split"
                                   step=".01" value="<?= esc($contract['revenue_split']); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                    </div>
                    <!-- Ticket Sales -->
                    <div class="col-md-6 form-group">
                        <label for="sales">Ticket Sales</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">£</div>
                            </div>
                            <input type="number" class="form-control" id="sales" name="sales"
                                   step=".01" value="<?= esc($contract['ticket_sales']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Requirements -->
                    <div class="col form-group">
                        <label for="requirements">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements"
                                  rows="2"><?= esc($contract['requirements']); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Miscellaneous Terms -->
                    <div class="col form-group">
                        <label for="terms">Miscellaneous Terms</label>
                        <textarea class="form-control" id="terms" name="terms"
                                  rows="2"><?= esc($contract['misc_terms']); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-7">
                        <!-- Save Changes -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save changes</button>
                    </div>
                    <div class="col-5">
                        <!-- Cancel Changes -->
                        <a class="btn btn-outline-danger btn-lg btn-block"
                           href="<?= base_url('/contracts/'.esc($contract['contract_id'])); ?>">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
