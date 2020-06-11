// Make table rows clickable
jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});

// Navbar highlighting
document.getElementById("<?= esc($title); ?>").classList.add("active");
