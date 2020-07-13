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
                    <h2>Staff Name</h2>
                </div>
                <div class="col-auto">
                    <a class="btn btn-info" href="<?= base_url('/staff_edit'); ?>">Edit staff details</a>
                </div>
            </section>

            <dl class="row">
                <dt class="col-sm-4"><h6>Role:</h6></dt>
                <dd class="col-sm-8">Artistic Director</dd>
                <dt class="col-sm-4"><h6>Email:</h6></dt>
                <dd class="col-sm-8">example@email.com</dd>
                <dt class="col-sm-4"><h6>Phone:</h6></dt>
                <dd class="col-sm-8">01234 567890</dd>
                <dt class="col-sm-4"><h6>Access Level:</h6></dt>
                <dd class="col-sm-8">Administrator</dd>
            </dl>
        </div>
    </div>

</main>