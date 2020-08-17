<!-- Footer -->
<footer class="text-center mt-3">
    <em>Venue Manager | &copy; 2020</em>
</footer>

<!-- JavaScript -->
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<!-- Bootstrap JavaScript-->
<script src="<?= base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- JavaScript for custom file input -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js">
</script>
<!-- Custom JavaScript-->
<script src="<?= base_url('scripts.js'); ?>"></script>

<?php if (isset($title)) : ?>
    <!-- Navbar highlighting -->
    <script>
        var pageTitle =  document.getElementById("<?= esc($title); ?>");
        if(pageTitle) {
            pageTitle.classList.add("active");
        }
    </script>
<?php endif ?>

</body>
</html>
