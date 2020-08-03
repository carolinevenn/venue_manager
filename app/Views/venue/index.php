<main class="container-xl">
    <section class="row d-flex justify-content-between my-4">
        <div class="col-auto">
            <h2>Venue: <?= esc($venue['venue_name']); ?></h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-info mb-2" href="<?= base_url('/staff/add'); ?>">New Staff Member</a>
            <a class="btn btn-info mb-2" href="<?= base_url('/rooms/add'); ?>">New Room</a>
            <a class="btn btn-outline-info mb-2" href="<?= base_url('/venue/edit/'.esc($venue['venue_id'])); ?>">Venue Details</a>
        </div>
    </section>

    <section class="row mt-5">
        <div class="col">
            <h4>Rooms</h4>
        </div>
    </section>

    <section class="row">
        <?php if (! empty($rooms) && is_array($rooms)) :
        foreach ($rooms as $item): ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                <a href="<?= base_url('/rooms/'. esc($item['room_id'])); ?>"
                   class='w-100 d-flex align-items-stretch text-reset'>
                    <div class='card w-100 mb-4'>
                        <h6 class="card-header"><?= esc($item['name']); ?></h6>
                        <div class='card-body py-2'>
                            <p class='card-text'><?= esc($item['capacity']); ?></p>
                            <p class='card-text'><?= esc($item['price']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <p class="col mt-5">Unable to find any rooms</p>
        <?php endif ?>
    </section>


    <section class="row mt-5">
        <div class="col">
            <h4>Staff</h4>
        </div>
    </section>

    <section class="row">
        <?php if (! empty($staff) && is_array($staff)) :
        foreach ($staff as $item): ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                <a href="<?= base_url('/staff/'. esc($item['staff_id'])); ?>"
                   class='w-100 d-flex align-items-stretch text-reset'>
                    <div class='card w-100 mb-4'>
                        <h6 class="card-header"><?= esc($item['name']); ?></h6>
                        <div class='card-body py-2'>
                            <p class='card-text'><?= esc($item['role']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <p class="col mt-5">Unable to find any staff members</p>
        <?php endif ?>
    </section>

</main>
