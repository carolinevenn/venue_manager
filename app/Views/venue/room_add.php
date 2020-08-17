<main class="container-xl">
    <section class="row mt-2">
        <div class="col-md-8 col-lg-6 mx-auto">
            <a href="<?= base_url('venue'); ?>">&lt; Back</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2>New Room</h2>
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

    <!-- Create New Room form -->
    <?= form_open(current_url(), 'class="needs-validation" novalidate'); ?>
      <section class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <!-- Room name -->
                    <div class="col form-group">
                        <label for="name">Room Name
                            <span class="font-italic small text-muted">(required)</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter the room name
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Price -->
                    <div class="col-sm-6 form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <!-- Capacity -->
                    <div class="col-sm-6 form-group">
                        <label for="capacity">Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity">
                    </div>
                </div>
                <div class="row">
                    <!-- Resources -->
                    <div class="col form-group">
                        <label for="resources">Included Resources</label>
                        <textarea class="form-control" id="resources" name="resources"
                                  rows="4"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <!-- Save New Room -->
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="btnSave"
                                name="btnSave">Save room details</button>
                    </div>
                </div>
            </div>
        </section>
    <?= form_close(); ?>

</main>
