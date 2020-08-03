<main class="container-xl">
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('/contracts/'.$contract); ?>">&lt; Back to contract</a>
                </div>
            </section>
            <section class="row my-4">
                <div class="col">
                    <h2>New Invoice</h2>
                </div>
            </section>

            <?php
            if ($method === 'post')
            {
                echo $validation->listErrors();
            }
            ?>

            <?= form_open_multipart(current_url(), 'class="needs-validation" novalidate'); ?>
                <section class="row">
                    <div class="col">
                        <div class="row">
                            <!-- Invoice Date -->
                            <div class="col-md-6 form-group">
                                <label for="date">Invoice Date <span class="font-italic small text-muted">(required)</span></label>
                                <input type="date" class="form-control" id="date" name="date"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter the invoice date
                                </div>
                            </div>
                            <!-- Invoice Number -->
                            <div class="col-md-6 form-group">
                                <label for="number">Invoice Number <span class="font-italic small text-muted">(required)</span></label>
                                <input type="text" class="form-control" id="number" name="number"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter the invoice number
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Invoice Amount -->
                            <div class="col-md-6 form-group">
                                <label for="amount">Invoice Amount <span class="font-italic small text-muted">(required)</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input type="number" class="form-control" id="amount"
                                           name="amount" step=".01" required>
                                    <div class="invalid-feedback">
                                        Please enter the invoice amount
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Paid? -->
                            <div class="col-md-6 form-group">
                                <label for="paidYes paidNo">Invoice Paid? <span class="font-italic small text-muted">(required)</span></label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paidYes" name="paid" value="1"
                                           class="custom-control-input" required>
                                    <label class="custom-control-label" for="paidYes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paidNo" name="paid" value="0"
                                           class="custom-control-input" required>
                                    <label class="custom-control-label" for="paidNo">No</label>
                                    <div class="invalid-feedback">
                                        <br>Please choose an option
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-1">
                            <div class="col">
                                <h6>Upload Invoice Document</h6>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Invoice upload -->
                            <div class="col form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="invoiceUpload"
                                           name="invoiceUpload">
                                    <label class="custom-file-label" for="invoiceUpload">
                                        Choose file
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <!-- Button -->
                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                        id="btnSave" name="btnSave">Save invoice details</button>
                            </div>
                        </div>
                    </div>
                </section>
            <?= form_close(); ?>
        </div>
    </div>
</main>
