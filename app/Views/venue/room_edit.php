<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('/rooms/'.esc($room['room_id'])); ?>">
                &lt; Back to room details
            </a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>Edit Room</h2>
        </div>
    </section>

    <?php
    // Display any validation errors
    if ($method === 'post')
    {
        echo $validation->listErrors();
    }
    ?>

    <!-- Edit Room form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Room name -->
                    <div class="col form-group">
                        <label for="name">Room Name
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="<?= esc($room['name']); ?>">
                        <div class="invalid-feedback">
                            Please enter the room name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Price -->
                    <div class="col-sm-6 form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                               value="<?= esc($room['price']); ?>">
                    </div>
                    <!-- Capacity -->
                    <div class="col-sm-6 form-group">
                        <label for="capacity">Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity"
                               value="<?= esc($room['capacity']); ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Resources -->
                    <div class="col form-group">
                        <label for="resources">Included Resources</label>
                        <textarea class="form-control" id="resources" name="resources"
                                  rows="4"><?= esc($room['resources']); ?></textarea>
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
                           href="<?= base_url('/rooms/'. esc($room['room_id'])); ?>">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
