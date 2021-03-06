<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-info">
    <!-- link to homepage -->
    <a class="navbar-brand" href="<?= base_url(); ?>">Venue Manager</a>
    <!-- Navbar toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarContent" aria-controls="navbarContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible links -->
    <div class="collapse navbar-collapse text-center" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- Current user name and link to change password -->
                <a class="nav-link" id="Current_user"
                   href="<?= base_url('staff/password/'.session()->get('user_id')); ?>">
                    <?= session()->get('user_name') ?>
                </a>
            </li>
        </ul>
        <!-- Navigation links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" id="Home" href="<?= base_url(); ?>">Calendar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Contracts" href="<?= base_url('contracts'); ?>">
                    Contracts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Customers" href="<?= base_url('customers'); ?>">
                    Customers
                </a>
            </li>

            <?php if(session()->get('access') != 'Staff') : ?>
                <li class="nav-item">
                    <a class="nav-link" id="Venue" href="<?= base_url('venue'); ?>">Venue</a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">Log out</a>
            </li>
        </ul>
    </div>
</nav>
