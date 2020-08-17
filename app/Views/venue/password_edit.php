<main class="container-xl">

    <section class="row my-4">
        <div class="col-auto mx-auto">
            <h2>Change Password</h2>
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

    <!-- Reset Password form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Password -->
                    <div class="col-sm-8 form-group mx-auto">
                        <label for="password1">New Password
                            <span class="font-italic small text-muted">(8+ characters required)</span>
                        </label>
                        <input type="password" class="form-control" id="password1" name="password1"
                               required>
                        <div class="invalid-feedback">
                            Please enter a password
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Password confirmation -->
                    <div class="col-sm-8 form-group mx-auto">
                        <label for="password2">Confirm Password
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="password" class="form-control" id="password2" name="password2"
                               required>
                        <div class="invalid-feedback">
                            Please re-enter the password
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <!-- Save Changes -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save changes</button>
                    </div>
                    <div class="col-6">
                        <!-- Cancel Changes -->
                        <a class="btn btn-outline-danger btn-lg btn-block"
                           href="<?= base_url('staff/'.esc($staff_id)); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
