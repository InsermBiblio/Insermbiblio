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

$context['infoFooter'] = Timber::get_posts(['category_name' => 'footer-info']);
$context['single'] = new TimberPost();
$context['category'] = array('nicename'=> $nicename,'name' => $name);
$context['services'] = Timber::get_posts(['category_name' => 'services']);
Timber::render('single.twig', $context);
