<main class="container-xl">
    <section class="row">
        <div class="col">
            <h1><?= esc($title); ?></h1>
        </div>
    </section>

    <section class="row">
        <div class="col-md-12 col-lg-9 col-xl-7 mx-auto">
            <?= form_open(current_url()); ?>

            <?= form_close(); ?>
        </div>
    </section>

</main>