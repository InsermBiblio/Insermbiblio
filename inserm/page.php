<?php
/*
 * Title: Page template.
 */
$context = Timber::get_context();
$context['services'] = Timber::get_posts(['category_name' => 'services']);
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

if ($context['posts'][0]->slug == 'la-bibliotheque-numerique-de-linserm') {
	Timber::render('presentation.twig', $context);
}
else {
	Timber::render('page.twig', $context);
}
