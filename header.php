<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link href="<?= get_template_directory_uri() ?>/assets/ds6/css/common_version%3D473.css" rel="stylesheet" type="text/css">
    <script src="<?= get_template_directory_uri() ?>/assets/ds6/js/jquery.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/ds6/js/assembly.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/ds6/js/swiper.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/ds6/js/ecscript.js"></script>
</head>
<body class="theme2">
<?php get_template_part('templates/header') ?>
<?php if(get_option('ophim_is_ads') == 'on') { ?>
<div id=top_addd></div>
<?php } ?>