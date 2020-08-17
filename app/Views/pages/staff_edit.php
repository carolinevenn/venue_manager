<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('/staff_details'); ?>">&lt; Back to staff record</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>Edit Staff Member</h2>
        </div>
    </section>

    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Staff name -->
                    <div class="col mb-3">
                        <label for="name">Name <span class="font-italic small text-muted">(required)</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter the name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Email address -->
                    <div class="col-sm-6 mb-3">
                        <label for="email">Email <span class="font-italic small text-muted">(required)</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address
                        </div>
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6 mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="row">
                    <!-- Role -->
                    <div class="col-sm-6 mb-3">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>
                    <!-- Access Level -->
                    <div class="col-sm-6 mb-3">
                        <label for="access">Access Level <span class="font-italic small text-muted">(required)</span></label>
                        <select class="form-control d-block w-100" id="access" name="access" required>
                            <option value="">Choose...</option>
                            <option>Staff</option>
                            <option>Manager</option>
                            <option>Administrator</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose an access level
                        </div>
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
                           href="<?= base_url('/staff_details'); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

    <!-- Delete staff -->
    <section class="row mt-5">
        <div class="col-auto mx-auto">
            <h4>Delete Staff Record</h4>
        </div>
    </section>
    <section class="row mt-2">
        <div class="col-auto mx-auto">
            <button class="btn btn-outline-danger">Delete</button>
        </div>
    </section>
</main>