<?php
/*Template Name: Contact*/
$context = Timber::get_context();
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

Timber::render('contact.twig', $context);
