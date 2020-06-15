<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('/room_details'); ?>">&lt; Back to room details</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>Edit Room</h2>
        </div>
    </section>

    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Room name -->
                    <div class="col mb-3">
                        <label for="name">Room Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter the room name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Price -->
                    <div class="col-sm-6 mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <!-- Capacity -->
                    <div class="col-sm-6 mb-3">
                        <label for="capacity">Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity">
                    </div>
                </div>
                <div class="row">
                    <!-- Resources -->
                    <div class="col mb-3">
                        <label for="resources">Included Resources</label>
                        <textarea class="form-control" id="resources" name="resources" rows="4"></textarea>
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
                           href="<?= base_url('/room_details'); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

    <!-- Delete room -->
    <section class="row mt-5">
        <div class="col-auto mx-auto">
            <h4>Delete Room</h4>
        </div>
    </section>
    <section class="row mt-2">
        <div class="col-auto mx-auto">
            <button class="btn btn-outline-danger">Delete</button>
        </div>
    </section>

</main>