<?php
global $paged;
    if (!isset($paged) || !$paged){
        $paged = 1;
    }
$context = Timber::get_context();
$args = array(
  'post_type' => array('post', 'page'),
  's' => get_search_query(),
  'paged' => $paged
);
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

$context['title'] = get_search_query();
$context['posts'] = Timber::get_posts($args);
$context['pagination'] = Timber::get_pagination();
Timber::render('search.twig', $context);
