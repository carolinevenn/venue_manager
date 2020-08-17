<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('venue'); ?>">&lt; Back</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>New Staff Member</h2>
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

    <!-- Create Staff Member form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Staff name -->
                    <div class="col form-group">
                        <label for="name">Name
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= set_value('name'); ?>" required>
                        <div class="invalid-feedback">
                            Please enter the name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Email address -->
                    <div class="col-sm-6 form-group">
                        <label for="email">Email
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= set_value('email'); ?>" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address
                        </div>
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6 form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="<?= set_value('phone'); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Role -->
                    <div class="col-sm-6 form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role"
                               value="<?= set_value('role'); ?>">
                    </div>
                    <!-- Access Level -->
                    <div class="col-sm-6 form-group">
                        <label for="access">Access Level
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <?php
                        $level = array(""=>"Choose...",
                            "Staff"=>"Staff",
                            "Manager"=>"Manager",
                            "Administrator"=>"Administrator");
                        echo form_dropdown('access', $level,  set_value('access'),
                            'class="form-control d-block w-100" id="access" required');
                        ?>
                        <div class="invalid-feedback">
                            Please choose an access level
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Password -->
                    <div class="col-sm-6 form-group">
                        <label for="password1">Password
                            <span class="font-italic small text-muted">(8+ characters required)</span>
                        </label>
                        <input type="password" class="form-control" id="password1" name="password1"
                               required>
                        <div class="invalid-feedback">
                            Please enter a password
                        </div>
                    </div>
                    <!-- Password confirmation -->
                    <div class="col-sm-6 form-group">
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
                    <div class="col">
                        <!-- Save staff details -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save staff details</button>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
