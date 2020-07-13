<main class="container-xl">
    <section class="row d-flex justify-content-between my-4">
        <div class="col-auto">
            <h2>Customers</h2>
        </div>
        <div class="col-auto order-md-3 mb-2 mb-md-0">
            <a class="btn btn-info" href="<?= base_url('/customers/add'); ?>">New Customer</a>
        </div>
        <div class="col-md-6 order-md-2">
            <!-- Search bar -->
            <?= form_open(current_url(), 'class="mx-auto"'); ?>
                <div class="input-group mx-auto">
                    <input type="search" class="form-control" id="search" name="search"
                           placeholder="Search customers" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </section>

    <section class="row">

        <?php if (! empty($customers) && is_array($customers)) :
            foreach ($customers as $item): ?>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                    <a href="<?= base_url('/customers/' . esc($item['customer_id'])); ?>"
                       class='w-100 d-flex align-items-stretch text-reset'>
                        <div class='card w-100 mb-4'>
                            <h6 class="card-header"><?= esc($item['company_name']); ?></h6>
                            <div class='card-body py-2'>
                                <p class='card-text'><?= esc($item['town']) . ", " . esc($item['county']); ?></p>
                                <p class='card-text'><?= esc($item['phone']); ?></p>
                                <p class='card-text'><?= esc($item['email']); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        <?php else : ?>
            <h3>No Customers</h3>
            <p>Unable to find any customers.</p>
        <?php endif ?>

    </section>
</main>