<main class="container-xl">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('venue'); ?>">&lt; Back</a>
                </div>
            </section>

            <section class="row mt-3 mb-4 justify-content-between">
                <div class="col-auto">
                    <!-- Staff Name -->
                    <h2><?= esc($staff['name']); ?></h2>
                </div>
                <div class="col-auto">
                    <!-- Edit Staff details -->
                    <a class="btn btn-info"
                       href="<?= base_url('staff/edit/'.esc($staff['staff_id'])); ?>">
                        Edit staff details
                    </a>
                </div>
            </section>

            <!-- Staff Details -->
            <dl class="row">
                <dt class="col-sm-4"><h6>Role:</h6></dt>
                <dd class="col-sm-8"><?= esc($staff['role']); ?></dd>
                <dt class="col-sm-4"><h6>Email:</h6></dt>
                <dd class="col-sm-8"><?= esc($staff['email']); ?></dd>
                <dt class="col-sm-4"><h6>Phone:</h6></dt>
                <dd class="col-sm-8"><?= esc($staff['phone']); ?></dd>
                <dt class="col-sm-4"><h6>Access Level:</h6></dt>
                <dd class="col-sm-8"><?= esc($staff['access_level']); ?></dd>
            </dl>
        </div>
    </div>

</main>
