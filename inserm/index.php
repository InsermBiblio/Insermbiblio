<?php

$context = Timber::get_context();
$context['lang']=substr($context[site]->language, 0, 2);
$context['posts'] = Timber::get_posts(array( 'showposts' => '10'));
Timber::render('index.twig', $context);
// print_r($context);
