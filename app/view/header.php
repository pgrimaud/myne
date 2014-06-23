<?php
    $tab_name = pathinfo($_SERVER['PHP_SELF']);
    include '../lib/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Myne</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo VIEW_URL; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo VIEW_URL; ?>/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo VIEW_URL; ?>/css/alertify.core.css" rel="stylesheet">
    <link href="<?php echo VIEW_URL; ?>/css/alertify.bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- fav -->
    <link rel="shortcut icon" href="<?php echo VIEW_URL; ?>/img/favicon.png">

    <script type="text/javascript" src="js/vendor/jquery.min.js"></script>
</head>
<body>
    <div id="wrapper">
    <?php
        if ($tab_name['filename'] != "index")
            include 'navbar.php';
    ?>
