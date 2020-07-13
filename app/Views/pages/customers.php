<main class="container-xl">
    <section class="row d-flex justify-content-between my-4">
        <div class="col-auto">
            <h2>Customers</h2>
        </div>
        <div class="col-auto order-md-3 mb-2 mb-md-0">
            <a class="btn btn-info" href="<?= base_url('/customer_add'); ?>">New Customer</a>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/customer_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="#" class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer, that take up more than one line</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="#" class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="#" class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="#" class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="#" class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Customer name</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Other details about the customer</p>
                    </div>
                </div>
            </a>
        </div>

    </section>
</main>