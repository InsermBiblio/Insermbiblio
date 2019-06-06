<?php
$context = Timber::get_context();

$context['services'] = Timber::get_posts(['category_name' => 'services']);
$context['infoFooter'] = Timber::get_posts(['category_name' => 'footer-info']);
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

$category = get_the_category();
$nicename = $category[0]->category_nicename;
$name = $category[0]->name;
$parent = $category[0]->parent;
$parentThematiques = get_cat_ID('sites thematiques');
$parentOmics = get_cat_ID('omics');
$context['category'] = array('nicename'=> $nicename,'name' => $name);
if ($parent == $parentThematiques or $parent == $parentOmics) {
	$sitesThematiques = get_categories( array('child_of' => $parentThematiques, 'orderby' => 'name', 'order' => 'ASC') );
	foreach ($sitesThematiques as $link) {
		$links=(array)$link;
		if ($links['parent'] == $parentThematiques) {
			$context['sitesThematiques'][] = [
				'title' => $links['name'],
				'slug' => $links['slug']
			];
		}
		elseif ($links['parent'] == $parentOmics) {
			$context['omics'][] =[
				'title' => $links['name'],
				'slug' => $links['slug']
			];
		}
	}
    Timber::render('sites-thematiques.twig', $context);
}
elseif ($nicename == "outils-gestion") {
	$context['biblio'] = Timber::get_posts(['category_name' => 'logiciels-bibliographiques']);
	$context['autres'] = Timber::get_posts(['category_name' => 'autres-outils']);
	Timber::render('outils.twig', $context);
}
elseif ($nicename == "ressources") {
	Timber::render('ressources.twig', $context);
}
elseif ($nicename == "publications") {
	Timber::render('publications.twig', $context);
}
elseif ($nicename == "actus") {
	Timber::render('actus.twig', $context);
}
else {
    Timber::render('category.twig', $context);
}
//print_r($context['biblio']);