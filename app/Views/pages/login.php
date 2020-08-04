<main class="text-center" id="login-page">
    <!-- Login form -->
    <?= form_open(current_url(), 'class="form-signin needs-validation" novalidate'); ?>
        <h2 class="mb-5">Venue Manager</h2>
        <!-- Email address -->
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control"
               placeholder="Email address" required autofocus>
        <!-- Password -->
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control"
               placeholder="Password" required>
        <!-- Submit -->
        <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
    <?= form_close(); ?>
</main>

