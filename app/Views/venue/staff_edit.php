<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('staff/'.esc($staff['staff_id'])); ?>">&lt; Back</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>Edit Staff Details</h2>
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

    <!-- Edit Staff form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Staff ID (hidden) -->
                    <input type="hidden" id="staffId" name="staffId"
                           value="<?= esc($staff['staff_id']); ?>">
                    <!-- Staff name -->
                    <div class="col form-group">
                        <label for="name">Name
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="<?= esc($staff['name']); ?>">
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
                        <input type="email" class="form-control" id="email" name="email" required
                               value="<?= esc($staff['email']); ?>">
                        <div class="invalid-feedback">
                            Please enter a valid email address
                        </div>
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6 form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="<?= esc($staff['phone']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Role -->
                    <div class="col-sm-6 form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role"
                               value="<?= esc($staff['role']); ?>">
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
                        echo form_dropdown('access', $level,  esc($staff['access_level']),
                            'class="form-control d-block w-100" id="access" required');
                        ?>
                        <div class="invalid-feedback">
                            Please choose an access level
                        </div>
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
                           href="<?= base_url('staff/'.esc($staff['staff_id'])); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

    <!-- Reset Password -->
    <section class="row mt-5">
        <div class="col-auto mx-auto">
            <h4>Reset Password</h4>
        </div>
    </section>
    <section class="row mt-2">
        <div class="col-auto mx-auto">
            <a class="btn btn-outline-danger"
               href="<?= base_url('staff/password/'.esc($staff['staff_id'])); ?>">
                Reset
            </a>
        </div>
    </section>

    <!-- Launch Delete Staff modal -->
    <section class="row mt-5">
        <div class="col-auto mx-auto">
            <h4>Delete Staff Record</h4>
        </div>
    </section>
    <section class="row mt-2">
        <div class="col-auto mx-auto">
            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
                Delete
            </button>
        </div>
    </section>

</main>


<!-- Delete Staff Modal -->
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
                <h5>Are you sure you want to permanently delete this staff member?</h5>
            </div>
            <div class="modal-footer">
                <?= form_open(base_url('staff/delete/'.esc($staff['staff_id']))); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
