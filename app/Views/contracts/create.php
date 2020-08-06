<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/contracts'); ?>">&lt; Back to contract list</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>New Contract</h2>
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

    <!-- New Contract form -->
    <?= form_open_multipart(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Choose Customer -->
                    <div class="col form-group">
                        <label for="customer">
                            Customer <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <?= form_dropdown('customer', $customer_list,
                            ($customer != null ) ? $customer['customer_id'] : set_value('customer'),
                            'class="form-control d-block w-100" id="customer" required'); ?>
                        <div class="invalid-feedback">
                            Please choose a customer
                        </div>
                    </div>
                    <!-- Link to create new customer -->
                    <div class="col-auto align-self-end mb-3">
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
                        <label for="event">
                            Event Title <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="event" name="event" required
                               value="<?= set_value('event'); ?>">
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
                               value="<?= set_value('genre'); ?>">
                    </div>
                    <!-- Running Time -->
                    <div class="col-md-6 form-group">
                        <label for="runTime">Running Time</label>
                        <div class="input-group">
                            <input type="number" class="form-control"id="runTime" name="runTime"
                                   step="1" value="<?= set_value('runTime'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">minutes</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Age Guidance -->
                    <div class="col form-group">
                        <label for="guidance">Age Guidance</label>
                        <input type="text" class="form-control" id="guidance" name="guidance"
                               value="<?= set_value('guidance'); ?>">
                    </div>
                </div>
                <!-- Upload documents -->
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
                    <!-- Quote file upload -->
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="quote" name="quote">
                            <label class="custom-file-label" for="quote">Choose file</label>
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
                    <!-- Contract file upload -->
                    <div class="col form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="contract" name="contract">
                            <label class="custom-file-label" for="contract">Choose file</label>
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
                               value="<?= set_value('type'); ?>">
                    </div>
                    <!-- Booking Status -->
                    <div class="col-md-6 form-group">
                        <label for="status">
                            Booking Status <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <?php
                        $status = array(""=>"Choose...",
                            "Paid"=>"Paid",
                            "Confirmed"=>"Confirmed",
                            "Reserved"=>"Reserved",
                            "Enquiry"=>"Enquiry",
                            "Cancelled"=>"Cancelled");
                        echo form_dropdown('status', $status, set_value('status'),
                            'class="form-control d-block w-100" id="status" required');
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
                               value="<?= set_value('getIn'); ?>">
                    </div>
                    <!-- Get Out time -->
                    <div class="col-md-6 form-group">
                        <label for="getOut">Get Out</label>
                        <input type="datetime-local" class="form-control" id="getOut" name="getOut"
                               value="<?= set_value('getOut'); ?>">
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
                                   step=".01" value="<?= set_value('price'); ?>">
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
                                   step=".01" value="<?= set_value('deposit'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Revenue Split -->
                    <div class="col-md-6 form-group">
                        <label for="split">Revenue Split</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="split" name="split"
                                   step=".01" value="<?= set_value('split'); ?>">
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
                                   step=".01" value="<?= set_value('sales'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Requirements -->
                    <div class="col form-group">
                        <label for="requirements">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements"
                                  rows="2"><?= set_value('requirements'); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Miscellaneous Terms -->
                    <div class="col form-group">
                        <label for="terms">Miscellaneous Terms</label>
                        <textarea class="form-control" id="terms" name="terms"
                                  rows="2"><?= set_value('terms'); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <!-- Save Contract -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save contract</button>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
