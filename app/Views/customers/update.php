<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('customers/'.esc($customer['customer_id'])); ?>">
                &lt; Back to customer
            </a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>Edit Customer</h2>
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

    <!-- Update Customer form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Company name -->
                    <div class="col form-group">
                        <label for="companyName">Company Name
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="companyName" name="companyName"
                               value="<?= esc($customer['company_name']); ?>" required>
                        <div class="invalid-feedback">
                            Please enter the company name
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Address -->
                    <div class="col-md-6 form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                        value="<?= esc($customer['address']); ?>">
                    </div>
                    <!-- Town -->
                    <div class="col-md-6 form-group">
                        <label for="town">Town</label>
                        <input type="text" class="form-control" id="town" name="town"
                               value="<?= esc($customer['town']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- County -->
                    <div class="col-md-6 form-group">
                        <label for="county">County</label>
                        <input type="text" class="form-control" id="county" name="county"
                               value="<?= esc($customer['county']); ?>">
                    </div>
                    <!-- Postcode -->
                    <div class="col-md-6 form-group">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" id="postcode" name="postcode"
                               value="<?= esc($customer['postcode']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Phone number -->
                    <div class="col-lg-6 form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="<?= esc($customer['phone']); ?>">
                    </div>
                    <!-- Email address -->
                    <div class="col-lg-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= esc($customer['email']); ?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Contact name -->
                    <div class="col-lg-6 form-group">
                        <label for="contactName">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                               value="<?= esc($customer['contact_name']); ?>">
                    </div>
                    <!-- VAT number -->
                    <div class="col-lg-6 form-group">
                        <label for="vat">VAT number</label>
                        <input type="text" class="form-control" id="vat" name="vat"
                        value="<?= esc($customer['vat_number']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Other details -->
                    <div class="col form-group">
                        <label for="other">Other details</label>
                        <textarea class="form-control" id="other" name="other"
                                  rows="5"><?= esc($customer['other_details']); ?></textarea>
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
                           href="<?= base_url('customers/'.esc($customer['customer_id'])); ?>">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
