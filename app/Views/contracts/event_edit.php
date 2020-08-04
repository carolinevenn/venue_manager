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
                    <h2>Edit Event Instance</h2>
                </div>
            </section>

            <?php
            // Display any validation errors
            if ($method === 'post')
            {
                echo $validation->listErrors();
            }
            ?>

            <!-- Edit event instance form -->
            <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
                <section class="row">
                    <div class="col">
                        <div class="row">
                            <!-- Show Time -->
                            <div class="col form-group">
                                <label for="showTime">Show Time
                                    <span class="font-italic small text-muted">(required)</span>
                                </label>
                                <input type="datetime-local" class="form-control" id="showTime"
                                       name="showTime" value="<?= esc($event['show_time']); ?>"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter the show time
                                </div>
                            </div>
                        </div>

                        <!-- Standard Ticket Price -->
                        <div class="row">
                            <div class="col form-group">
                                <label for="standard">Standard Ticket</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input type="number" class="form-control" id="standard"
                                           name="standard" step=".01"
                                           value="<?= esc($event['standard']); ?>">
                                </div>
                            </div>
                        </div>
                        <!-- Concession Ticket Price -->
                        <div class="row">
                            <div class="col form-group">
                                <label for="concession">Concession Ticket</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input type="number" class="form-control" id="concession"
                                           name="concession" step=".01"
                                           value="<?= esc($event['concession']); ?>">
                                </div>
                            </div>
                        </div>
                        <!-- Student Ticket Price -->
                        <div class="row">
                            <div class="col form-group">
                                <label for="student">Student Ticket</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input type="number" class="form-control" id="student"
                                           name="student" step=".01"
                                           value="<?= esc($event['student']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7">
                                <!-- Save Changes -->
                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                        name="btnSave">
                                    Save changes
                                </button>
                            </div>
                            <div class="col-5">
                                <!-- Cancel Changes -->
                                <a class="btn btn-outline-danger btn-lg btn-block"
                                   href="<?= base_url('/contracts/'.$contract); ?>">Cancel</a>
                            </div>
                        </div>
                    </div>
                </section>
            <?= form_close(); ?>

            <!-- Launch Delete Event Instance Modal -->
            <section class="row mt-5">
                <div class="col-auto mx-auto">
                    <h4>Delete Event Instance</h4>
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


<!-- Delete Event Instance Modal -->
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
                <h5>Are you sure you want to permanently delete this event instance?</h5>
            </div>
            <div class="modal-footer">
                <?= form_open(base_url('events/delete/'.esc($event['instance_id']))); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
