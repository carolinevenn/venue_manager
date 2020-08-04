<main class="container-xl">
    <section class="row mt-4 justify-content-between">
        <div class="col-auto">
            <h2>Contracts</h2>
        </div>
        <!-- Link to create new contract -->
        <div class="col-auto">
            <a class="btn btn-info" href="<?= base_url('/contracts/add'); ?>">New Contract</a>
        </div>
    </section>

    <!-- 'Search and filter contracts' form -->
    <?= form_open(current_url()); ?>
        <section class="row mb-5 d-flex justify-content-between">
            <div class="col-md my-3 my-md-0 align-self-end">
                <!-- Search bar -->
                <div class="input-group mx-auto">
                    <input type="search" class="form-control" id="search" name="search"
                           placeholder="Search contracts" aria-label="Search"
                           value="<?= set_value('search'); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-search" alt="Search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Filter by status -->
            <div class="col-sm-auto mb-3 mb-sm-0">
                <label for="status">Status:</label>
                <?php
                $status = array("All"=>"All",
                                "Paid"=>"Paid",
                                "Confirmed"=>"Confirmed",
                                "Reserved"=>"Reserved",
                                "Enquiry"=>"Enquiry",
                                "Cancelled"=>"Cancelled",
                                "History"=>"Historical");
                echo form_dropdown('status', $status, set_value('status'),
                    'id="status" class="form-control d-block w-100" 
                        onchange="this.form.submit();"');
                ?>

            </div>
            <!-- Filter by room -->
            <div class="col-sm-auto mb-3 mb-sm-0">
                <label for="room">Room:</label>
                <?= form_dropdown('room', $rooms, set_value('room'), 'id="room"
                    class="form-control d-block w-100" onchange="this.form.submit();"'); ?>
            </div>
            <!-- Sort products -->
            <div class="col-sm-auto">
                <label for="sort">Sort by:</label>
                <?php
                $sort = array("altered"=>"Most recently altered",
                    "booking"=>"Booking Date",
                    "az"=>"Event Title (A-Z)",
                    "za"=>"Event Title (Z-A)");
                echo form_dropdown('sort', $sort, set_value('sort'), 'id="sort" 
                    class="form-control d-block w-100" onchange="this.form.submit();"');
                ?>
            </div>
        </section>
    <?= form_close(); ?>	<!-- End of 'sort and filter' form -->

    <!-- Display contract cards -->
    <section class="row">
        <?php if (! empty($contracts) && is_array($contracts)) :
        foreach ($contracts as $item):
            // Set shading according to booking status
            switch (esc($item['booking_status']))
            {
                case "Confirmed":
                    $shading = "card-success";
                    break;
                case "Paid":
                    $shading = "card-primary";
                    break;
                case "Reserved":
                    $shading = "card-warning";
                    break;
                case "Enquiry":
                    $shading = "card-secondary";
                    break;
                case "Cancelled":
                    $shading = "card-danger";
                    break;
                default:
                    $shading = "";
            }?>
            <!-- Individual contract card -->
            <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                <a href="<?= base_url('/contracts/' . esc($item['contract_id'])); ?>"
                   class='w-100 d-flex align-items-stretch text-reset'>
                    <div class='card w-100 mb-4'>
                        <!-- Event Title -->
                        <h6 class="card-header <?= $shading ?>">
                            <?= esc($item['event_title']); ?>
                        </h6>
                        <div class='card-body py-2'>
                            <!-- Booking duration -->
                            <p class='card-text'>
                                <?= esc($item['start_date']); ?> - <?= esc($item['end_date']); ?>
                            </p>
                            <!-- Room name -->
                            <p class='card-text'><?= esc($item['room']); ?></p>
                            <!-- Booking status -->
                            <p class='card-text'><?= esc($item['booking_status']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <!-- Error message -->
            <p class="col mt-5">Unable to find any contracts</p>
        <?php endif ?>

    </section>
</main>
