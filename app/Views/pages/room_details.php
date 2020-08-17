<main class="container-xl">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <section class="row mt-2">
                <div class="col">
                    <a href="<?= base_url('/venue'); ?>">&lt; Back</a>
                </div>
            </section>

            <section class="row mt-3 mb-4 justify-content-between">
                <div class="col-auto">
                    <h2>Room Name</h2>
                </div>
                <div class="col-auto">
                    <a class="btn btn-info" href="<?= base_url('/room_edit'); ?>">Edit room details</a>
                </div>
            </section>

            <dl class="row">
                <dt class="col-sm-4"><h6>Price:</h6></dt>
                <dd class="col-sm-8">Hourly rate and/or Daily rate</dd>
                <dt class="col-sm-4"><h6>Capacity:</h6></dt>
                <dd class="col-sm-8">250 seated</dd>
                <dt class="col-sm-4"><h6>Resources:</h6></dt>
                <dd class="col-sm-8">E.g. projector, audio equipment, lights etc.</dd>
            </dl>
        </div>
    </div>

</main>