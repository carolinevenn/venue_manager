<main class="container-xl">
    <section class="row d-flex justify-content-between my-4">
        <div class="col-auto">
            <!-- Venue name -->
            <h2>Venue: <?= esc($venue['venue_name']); ?></h2>
        </div>
        <div class="col-auto">
            <!-- Create new staff record -->
            <a class="btn btn-info mb-2" href="<?= base_url('/staff/add'); ?>">
                New Staff Member
            </a>
            <!-- Create new room -->
            <a class="btn btn-info mb-2" href="<?= base_url('/rooms/add'); ?>">
                New Room
            </a>
            <!-- Edit venue details -->
            <a class="btn btn-outline-info mb-2"
               href="<?= base_url('/venue/edit/'.esc($venue['venue_id'])); ?>">
                Venue Details
            </a>
        </div>
    </section>

    <section class="row mt-5">
        <div class="col">
            <h4>Rooms</h4>
        </div>
    </section>

    <!-- Display Rooms -->
    <section class="row">
        <?php if (! empty($rooms) && is_array($rooms)) :
        foreach ($rooms as $item): ?>
            <!-- Individual Room card -->
            <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                <a href="<?= base_url('/rooms/'. esc($item['room_id'])); ?>"
                   class='w-100 d-flex align-items-stretch text-reset'>
                    <div class='card w-100 mb-4'>
                        <!-- Room name -->
                        <h6 class="card-header"><?= esc($item['name']); ?></h6>
                        <!-- Room overview -->
                        <div class='card-body py-2'>
                            <!-- Room capacity -->
                            <p class='card-text'><?= esc($item['capacity']); ?></p>
                            <!-- Room pricing -->
                            <p class='card-text'><?= esc($item['price']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <!-- Error message -->
            <p class="col mt-5">Unable to find any rooms</p>
        <?php endif ?>
    </section>


    <section class="row mt-5">
        <div class="col">
            <h4>Staff</h4>
        </div>
    </section>

    <!-- Display staff -->
    <section class="row">
        <?php if (! empty($staff) && is_array($staff)) :
        foreach ($staff as $item): ?>
            <!-- Individual Staff card -->
            <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                <a href="<?= base_url('/staff/'. esc($item['staff_id'])); ?>"
                   class='w-100 d-flex align-items-stretch text-reset'>
                    <div class='card w-100 mb-4'>
                        <!-- Staff name -->
                        <h6 class="card-header"><?= esc($item['name']); ?></h6>
                        <div class='card-body py-2'>
                            <!-- Staff role -->
                            <p class='card-text'><?= esc($item['role']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <!-- Error message -->
            <p class="col mt-5">Unable to find any staff members</p>
        <?php endif ?>
    </section>

</main>
