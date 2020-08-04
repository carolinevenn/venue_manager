<main class="container-xl">
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('/contracts/'.$invoice['contract_id']); ?>">
                        &lt; Back to contract
                    </a>
                </div>
            </section>
            <section class="row my-4">
                <div class="col">
                    <h2>Edit Invoice</h2>
                </div>
            </section>

            <?php
            // Display any validation errors
            if ($method === 'post')
            {
                echo $validation->listErrors();
            }
            ?>

            <!-- Edit Invoice form -->
            <?= form_open_multipart(current_url(), 'class="needs-validation" novalidate'); ?>
                <section class="row">
                    <div class="col">
                        <div class="row">
                            <!-- Invoice Date -->
                            <div class="col-md-6 form-group">
                                <label for="date">Invoice Date
                                    <span class="font-italic small text-muted">(required)</span>
                                </label>
                                <input type="date" class="form-control" id="date" name="date"
                                       value="<?= esc($invoice['date']); ?>" required>
                                <div class="invalid-feedback">
                                    Please enter the invoice date
                                </div>
                            </div>
                            <!-- Invoice Number -->
                            <div class="col-md-6 form-group">
                                <label for="number">Invoice Number
                                    <span class="font-italic small text-muted">(required)</span>
                                </label>
                                <input type="text" class="form-control" id="number" name="number"
                                       value="<?= esc($invoice['invoice_number']); ?>" required>
                                <div class="invalid-feedback">
                                    Please enter the invoice number
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Invoice Amount -->
                            <div class="col-md-6 form-group">
                                <label for="amount">Invoice Amount
                                    <span class="font-italic small text-muted">(required)</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input type="number" class="form-control" id="amount"
                                           name="amount" step=".01" required
                                           value="<?= esc($invoice['amount']); ?>">
                                    <div class="invalid-feedback">
                                        Please enter the invoice amount
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Paid? -->
                            <div class="col-md-6 form-group">
                                <label for="paidYes paidNo">Invoice Paid?
                                    <span class="font-italic small text-muted">(required)</span>
                                </label><br>
                                <!-- 'Yes' radio -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paidYes" name="paid" value="1"
                                           class="custom-control-input" required
                                           <?= (esc($invoice['paid']) == '1') ? "checked" : ""; ?>>
                                    <label class="custom-control-label" for="paidYes">Yes</label>
                                </div>
                                <!-- 'No' radio -->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paidNo" name="paid" value="0"
                                           class="custom-control-input" required
                                           <?= (esc($invoice['paid']) == '0') ? "checked" : ""; ?>>
                                    <label class="custom-control-label" for="paidNo">No</label>
                                    <div class="invalid-feedback">
                                        <br>Please choose an option
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upload invoice document -->
                        <div class="row mt-4 mb-1">
                            <div class="col">
                                <h6>Upload Invoice Document
                                    <span class="font-italic small text-muted">
                                        (PDF, DOCX, or XLSX files only)
                                    </span>
                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <!-- File upload -->
                            <div class="col form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="invoiceUpload"
                                           name="invoiceUpload">
                                    <label class="custom-file-label" for="invoiceUpload">
                                        <?= esc($invoice['invoice']); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-7">
                                <!-- Save changes -->
                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                        name="btnSave">Save changes</button>
                            </div>
                            <div class="col-5">
                                <!-- Cancel changes -->
                                <a class="btn btn-outline-danger btn-lg btn-block"
                                   href="<?= base_url('/contracts/'.$invoice['contract_id']); ?>">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?= form_close(); ?>

            <!-- Launch Delete Invoice modal -->
            <section class="row mt-5">
                <div class="col-auto mx-auto">
                    <h4>Delete Invoice</h4>
                </div>
            </section>
            <section class="row mt-2">
                <div class="col-auto mx-auto">
                    <button class="btn btn-outline-danger" data-toggle="modal"
                            data-target="#deleteModal">Delete</button>
                </div>
            </section>
        </div>
    </div>
</main>


<!-- Delete Invoice Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
     aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Event Instance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to permanently delete this invoice?</h5>
            </div>
            <div class="modal-footer">
                <?= form_open(base_url('invoices/delete/'.esc($invoice['invoice_id']))); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
