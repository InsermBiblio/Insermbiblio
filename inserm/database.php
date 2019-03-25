<?php
/**
* Template Name: databases
*
* Description: Defines default template of Databases.
*
*/
require 'config.php';
$context = Timber::get_context();
$context['ezproxy'] = $config['ezproxy'];
$context['services'] = Timber::get_posts(['category_name' => 'services']);

$linkCategoriesFooter = get_categories(array('taxonomy' => 'link_category', 'orderby' => 'term_id', 'include' => '2,3,4,5'));
foreach($linkCategoriesFooter as $slug){
	$slugs =(array)$slug;
	$context['linksFooter'][] = [
		'name' => $slugs['name'],
		'slug' => $slugs['slug'],
		'nbcol' => (int)($slugs['count']/5+1),
		'bookmarks' => get_bookmarks(array('category_name' => $slugs['name']))
	];
}
$context['infoFooter'] = Timber::get_posts(['category_name' => 'footer-info']);

$context['basesThematiques'] = [
		'title' => get_category_by_slug('bases_thematiques')->name,
		'posts' => Timber::get_posts(['category_name' => 'bases_thematiques', 'orderby' => 'name', 'order' => 'ASC'])
];
$context['ebooksWiley'] = [
		'title' => get_category_by_slug('e_books_wiley')->name,
		'posts' => Timber::get_posts(['category_name' => 'e_books_wiley', 'orderby' => 'name', 'order' => 'ASC'])
];
$parentLinkID = get_cat_ID('liens utiles');
$useLinks = get_categories( array('child_of' => $parentLinkID, 'orderby' => 'term_id', 'order' => 'ASC',) );
foreach ($useLinks as $link) {
	$links=(array)$link;
	$context['useLinks'][] = [
		'title' => $links['name'],
		'nbcol' => (int)($links['count']/7+1),
		'posts' => Timber::get_posts([ 'category_name' => $links['slug'], 'orderby' => 'name', 'order' => 'ASC' ])
	];
}

Timber::render('database.twig', $context);
//print_r($context['useLinks']);