<main class="container-xl">
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('/venue'); ?>">&lt; Back</a>
                </div>
            </section>
            <section class="row my-4">
                <div class="col">
                    <h2>Edit Venue</h2>
                </div>
            </section>

            <!-- Edit Venue form -->
            <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
                <section class="row">
                    <div class="col">
                        <div class="row">
                            <!-- Venue name -->
                            <div class="col form-group">
                                <label for="name">Venue Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="<?= esc($venue['venue_name']); ?>" required>
                                <div class="invalid-feedback">
                                    Please enter the venue name
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7">
                                <!-- Save Changes -->
                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                        id="btnSave" name="btnSave">Save changes</button>
                            </div>
                            <div class="col-5">
                                <!-- Cancel Changes -->
                                <a class="btn btn-outline-danger btn-lg btn-block"
                                   href="<?= base_url('/venue'); ?>">Cancel</a>
                            </div>
                        </div>
                    </div>
                </section>
            <?= form_close(); ?>
        </div>
    </div>
</main>
