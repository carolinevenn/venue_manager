<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('/venue'); ?>">&lt; Back</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>New Staff Member</h2>
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
                <div class="row">
                    <!-- Password -->
                    <div class="col-sm-6 mb-3">
                        <label for="password1">Password <span class="font-italic small text-muted">(required)</span></label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                        <div class="invalid-feedback">
                            Please enter a password
                        </div>
                    </div>
                    <!-- Password confirmation -->
                    <div class="col-sm-6 mb-3">
                        <label for="password2">Confirm Password <span class="font-italic small text-muted">(required)</span></label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                        <div class="invalid-feedback">
                            Please re-enter the password
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <!-- Button -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save staff details</button>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
