<main class="container-xl">
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('contracts/'.$contract); ?>">&lt; Back to contract</a>
                </div>
            </section>
            <section class="row my-4">
                <div class="col">
                    <h2>New Event Instance</h2>
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

            <!-- Create new event instance form -->
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
                                       name="showTime" required>
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
                                           name="standard" step=".01">
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
                                           name="concession" step=".01">
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
                                           name="student" step=".01">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <!-- Save Event Instance -->
                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                        id="btnSave" name="btnSave">Save event instance</button>
                            </div>
                        </div>
                    </div>
                </section>
            <?= form_close(); ?>
        </div>
    </div>
</main>
