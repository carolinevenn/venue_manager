<main class="container-xl">
    <section class="row mt-2">
        <div class="col">
            <a href="<?= base_url('/bookings'); ?>">&lt; Back to booking list</a>
        </div>
    </section>
    <section class="row my-4">
        <div class="col">
            <h2>New Booking</h2>
        </div>
    </section>

    <?= form_open_multipart(current_url(), 'class="needs-validation" novalidate'); ?>
        <section class="row">
            <div class="col">

            </div>
        </section>
    <?= form_close(); ?>


</main>