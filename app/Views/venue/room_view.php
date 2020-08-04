<main class="container-xl">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('/venue'); ?>">&lt; Back</a>
                </div>
            </section>

            <section class="row mt-3 mb-4 justify-content-between">
                <div class="col-auto">
                    <!-- Room Name -->
                    <h2><?= esc($room['name']); ?></h2>
                </div>
                <div class="col-auto">
                    <!-- Edit Room details -->
                    <a class="btn btn-info" href="<?= base_url(
                            '/rooms/edit/'.esc($room['room_id'])); ?>">
                        Edit room details
                    </a>
                </div>
            </section>

            <!-- Room Details -->
            <dl class="row">
                <dt class="col-sm-4"><h6>Price:</h6></dt>
                <dd class="col-sm-8"><?= esc($room['price']); ?></dd>
                <dt class="col-sm-4"><h6>Capacity:</h6></dt>
                <dd class="col-sm-8"><?= esc($room['capacity']); ?></dd>
                <dt class="col-sm-4"><h6>Resources:</h6></dt>
                <dd class="col-sm-8"><?= esc($room['resources']); ?></dd>
            </dl>
        </div>
    </div>

</main>
