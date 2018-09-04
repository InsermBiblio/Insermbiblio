<?php
$context = Timber::get_context();
$category = get_the_category();
$nicename = $category[0]->category_nicename;
$name = $category[0]->name;
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
$context['single'] = new TimberPost();
$context['category'] = array('nicename'=> $nicename,'name' => $name);
Timber::render('single.twig', $context);
