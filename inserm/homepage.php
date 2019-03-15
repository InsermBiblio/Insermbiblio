<?php
/*Template Name: Homepage*/
require 'config.php';
$context = Timber::get_context();
$context['ezproxy'] = $config['ezproxy'];

$context['infoFooter'] = Timber::get_posts(['category_name' => 'footer-info']);
$context['news'] = Timber::get_posts(array('category_name' => 'actus', 'showposts' => '3'));
$context['services'] = Timber::get_posts(['category_name' => 'services']);
$context['alerte']=Timber::get_posts(['category_name' => 'alerte', 'numberposts' => 1]);

// Votre portail
$portalParent = get_category_by_slug('votre-portail');
$parentID = $portalParent -> cat_ID;
$parent = (array)$portalParent;
$context['votrePortail'] = [
		'title' => $parent["name"],
		'slug' => $parent['slug'],
		'posts' => Timber::get_posts(['category_name' => $parent['slug'], 'category__in' => $parentID])
];
$portalChild = get_categories( array('child_of' => $parentID, 'order' => 'DESC') );
foreach($portalChild as $portal){
	$portals =(array)$portal;
	$context['votrePortail']['child'][] = [
		'name' => $portals['name'],
		'slug' => $portals['slug'],
		'childposts' => Timber::get_posts([ 'category_name' => $portals['slug']])
	];
}
//print_r($context['votrePortail']['child']);
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

$parentOpenID = get_cat_ID('litterature en acces libre');
$openAccess = get_categories( array('child_of' => $parentOpenID, 'orderby' => 'term_id', 'order' => 'ASC', 'exclude' => '23') );
foreach ($openAccess as $link) {
	$links=(array)$link;
	$context['openAccess'][] = [
		'title' => $links['name'],
		'nbcol' => (int)($links['count']/8+1),
		'posts' => Timber::get_posts([ 'category_name' => $links['slug'], 'orderby' => 'name', 'order' => 'ASC' ])
	];
}
$parentThematiques = get_cat_ID('sites thematiques');
$sitesThematiques = get_categories( array('child_of' => $parentThematiques, 'orderby' => 'term_id', 'order' => 'DESC') );
foreach ($sitesThematiques as $link) {
	$links=(array)$link;
	$context['sitesThematiques'][] = [
		'title' => $links['name'],
		'nbcol' => (int)($links['count']/8+1),
		'slug' => $links['slug']
	];
}
$context['home_sidebar'] = Timber::get_widgets('home_sidebar');
$context['basesAccueil'] = Timber::get_posts(['category_name' => bases_accueil, 'showposts' => 3]);
//print_r($context['sitesThematiques']);
Timber::render('homepage.twig', $context);
