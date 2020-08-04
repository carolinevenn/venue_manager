<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>

    <!-- FontAwesome stylesheet -->
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- FullCalendar initialisation (where required) -->
    <?php
        if (isset($title) && $title == 'Home')
        {
            require ("calendar.php");
        }
    ?>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('/styles.css'); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('/favicon.png'); ?>">

    <title>Venue Manager</title>
</head>
<body>
