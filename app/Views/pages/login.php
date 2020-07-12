<main class="text-center" id="login-page">
    <?= form_open(current_url(), 'class="form-signin needs-validation" novalidate'); ?>
        <h2 class="mb-5">Venue Manager</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
               required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
    <?= form_close(); ?>
</main>

