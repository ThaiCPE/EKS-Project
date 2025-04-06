<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>