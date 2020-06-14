<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/customer_details'); ?>">&lt; Back to customer</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>Edit Customer</h2>
        </div>
    </section>

    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Company name -->
                    <div class="col mb-3">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                        <div class="invalid-feedback">
                            Please enter the company name
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Address -->
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <div class="invalid-feedback">
                            Please enter the address
                        </div>
                    </div>
                    <!-- Town -->
                    <div class="col-md-6 mb-3">
                        <label for="town">Town</label>
                        <input type="text" class="form-control" id="town" name="town" required>
                        <div class="invalid-feedback">
                            Please enter the town
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- County -->
                    <div class="col-md-6 mb-3">
                        <label for="county">County</label>
                        <input type="text" class="form-control" id="county" name="county" required>
                        <div class="invalid-feedback">
                            Please enter the county
                        </div>
                    </div>
                    <!-- Postcode -->
                    <div class="col-md-6 mb-3">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" id="postcode"  name="postcode" required>
                        <div class="invalid-feedback">
                            Please enter the postcode
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Phone number -->
                    <div class="col-lg-6 mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        <div class="invalid-feedback">
                            Please enter the phone number
                        </div>
                    </div>
                    <!-- Email address -->
                    <div class="col-lg-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Contact name -->
                    <div class="col-lg-6 mb-3">
                        <label for="contactName">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName" required>
                        <div class="invalid-feedback">
                            Please enter a name
                        </div>
                    </div>
                    <!-- VAT number -->
                    <div class="col-lg-6 mb-3">
                        <label for="vat">VAT number</label>
                        <input type="text" class="form-control" id="vat" name="vat" required>
                        <div class="invalid-feedback">
                            Please enter the VAT number
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Other details -->
                    <div class="col mb-3">
                        <label for="other">Other details</label>
                        <textarea class="form-control" id="other" name="other" rows="5"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-7">
                        <!-- Button -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save changes</button>
                    </div>
                    <div class="col-5">
                        <!-- Button -->
                        <a class="btn btn-outline-danger btn-lg btn-block"
                           href="<?= base_url('/customer_details'); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

    <!-- Delete customer -->
    <section class="row mt-5">
        <div class="col">
            <h4>Delete Customer</h4>
        </div>
    </section>
    <section class="row mt-2">
        <div class="col">
            <button class="btn btn-outline-danger">Delete</button>
        </div>
    </section>

</main>