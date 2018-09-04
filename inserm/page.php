<?php
/*
 * Title: Page template.
 */
$context = Timber::get_context();
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
Timber::render('page.twig', $context);
