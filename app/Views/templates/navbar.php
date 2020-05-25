<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <!-- Logo with link to homepage -->
    <a class="navbar-brand" href="<?= base_url(); ?>">Venue Manager</a>
    <!-- Navbar toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarContent" aria-controls="navbarContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible links -->
    <div class="collapse navbar-collapse text-center" id="navbarContent">
        <!-- Navigation links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">Calendar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/bookings">Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/customers">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/venue">Venue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Log out</a>
            </li>
        </ul>
    </div>
</nav>