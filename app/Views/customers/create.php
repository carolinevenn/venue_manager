<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/customers'); ?>">&lt; Back to customer list</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>New Customer</h2>
        </div>
    </section>

    <?php
        if ($method === 'post')
        {
            echo $validation->listErrors();
        }
    ?>

    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Company name -->
                    <div class="col mb-3">
                        <label for="companyName">Company Name <span class="font-italic small text-muted">(required)</span></label>
                        <input type="text" class="form-control" id="companyName"
                               name="companyName" value="<?= set_value('companyName'); ?>"
                               required>
                        <div class="invalid-feedback">
                            Please enter the company name
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Address -->
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                               value="<?= set_value('address'); ?>">
                    </div>
                    <!-- Town -->
                    <div class="col-md-6 mb-3">
                        <label for="town">Town</label>
                        <input type="text" class="form-control" id="town" name="town"
                               value="<?= set_value('town'); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- County -->
                    <div class="col-md-6 mb-3">
                        <label for="county">County</label>
                        <input type="text" class="form-control" id="county" name="county"
                               value="<?= set_value('county'); ?>">
                    </div>
                    <!-- Postcode -->
                    <div class="col-md-6 mb-3">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" id="postcode"  name="postcode"
                               value="<?= set_value('postcode'); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Phone number -->
                    <div class="col-lg-6 mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="<?= set_value('phone'); ?>">
                    </div>
                    <!-- Email address -->
                    <div class="col-lg-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= set_value('email'); ?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Contact name -->
                    <div class="col-lg-6 mb-3">
                        <label for="contactName">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                               value="<?= set_value('contactName'); ?>">
                    </div>
                    <!-- VAT number -->
                    <div class="col-lg-6 mb-3">
                        <label for="vat">VAT number</label>
                        <input type="text" class="form-control" id="vat" name="vat"
                               value="<?= set_value('vat'); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Other details -->
                    <div class="col mb-3">
                        <label for="other">Other details</label>
                        <textarea class="form-control" id="other" name="other" rows="5"><?= set_value('other'); ?></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <!-- Button -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save customer details</button>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
