<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/bookings'); ?>">&lt; Back to bookings list</a>
        </div>
    </section>
    <section class="row mt-3 mb-4 justify-content-between">
        <div class="col-auto">
            <h2>Event Title</h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-info" href="#">New Document</a>
            <a class="btn btn-outline-info" href="<?= base_url('/booking_edit'); ?>">
                Edit booking details</a>
        </div>
    </section>

</main>