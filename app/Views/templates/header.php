<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title>Venue Manager</title>
</head>
<body>

