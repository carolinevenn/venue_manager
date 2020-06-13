<main class="container-xl">
    <section class="row mt-4">
        <div class="col">
            <h2>Bookings</h2>
        </div>
    </section>
    <!-- 'Search and filter' form -->
    <?= form_open(current_url()); ?>
        <section class="row mb-5 d-flex justify-content-between">
            <div class="col-md my-3 my-md-0 align-self-end">
                <!-- Search bar -->
                <div class="input-group mx-auto">
                    <input type="search" class="form-control" id="search" name="search"
                           placeholder="Search bookings" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <!-- Filter by status -->
            <div class="col-sm-auto mb-3 mb-sm-0">
                <label for="status">Status:</label>
                <select class="form-control d-block w-100" id="status" name="status" onchange="this.form.submit();">
                    <option>All</option>
                    <option>Confirmed</option>
                    <option>Enquiry</option>
                    <option>Paid</option>
                    <option>Reserved</option>
                </select>
            </div>
            <!-- Filter by room -->
            <div class="col-sm-auto mb-3 mb-sm-0">
                <label for="room">Room:</label>
                <select class="form-control d-block w-100" id="room" name="room" onchange="this.form.submit();">
                    <option>All</option>
                    <option>Auditorium</option>
                    <option>Dance Studio</option>
                    <option>Drama Studio</option>
                    <option>Bar</option>
                </select>
            </div>
            <!-- Sort products -->
            <div class="col-sm-auto">
                <label for="sort">Sort by:</label>
                <select class="form-control d-block w-100" id="sort" name="sort" onchange="this.form.submit();">
                    <option>Most recently altered</option>
                    <option>Event Date</option>
                    <option>Event Title (A-Z)</option>
                    <option>Event Title (Z-A)</option>
                </select>
            </div>
        </section>
    <?= form_close(); ?>	<!-- End of 'sort and filter' form -->


    <section class="row">
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div><div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div><div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div><div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div><div class="col-sm-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
            <a href="<?= base_url('/booking_details'); ?>"
               class='w-100 d-flex align-items-stretch text-reset'>
                <div class='card w-100 mb-4'>
                    <h6 class="card-header">Event title</h6>
                    <div class='card-body py-2'>
                        <p class='card-text'>Date, room, etc.</p>
                    </div>
                </div>
            </a>
        </div>

    </section>
</main>