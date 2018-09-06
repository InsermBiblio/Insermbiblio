<?php
$context = Timber::get_context();

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

$category = get_the_category();
$nicename = $category[0]->category_nicename;
$name = $category[0]->name;
$context['category'] = array('nicename'=> $nicename,'name' => $name);
$context['post'] = Timber::get_posts();
if (substr($category[0]->category_nicename,0,3)=='faq'){
    Timber::render('faq.twig', $context);
}
else if (substr($category[0]->category_nicename,0,4)=='aide'){
    Timber::render('help.twig', $context);
}
else {
    Timber::render('category.twig', $context);
}
// print_r($context);
