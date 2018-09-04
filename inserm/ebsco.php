<?php
/*Template Name: Ebsco*/
$context = Timber::get_context();
$context['news'] = Timber::get_posts(array( 'category_name' => 'infos', 'showposts' => '3'));
Timber::render('ebsco.twig', $context);
