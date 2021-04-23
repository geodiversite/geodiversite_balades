<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Insertion des css du plugin dans les pages publiques
 *
 * @param $flux
 * @return mixed
 */
function geol_balades_insert_head_css($flux) {
	$flux .= "\n".'<link rel="stylesheet" href="'. find_in_path('css/geol_balades.css') .'" />';
	return $flux;
}

/**
 * Insertion dans le pipeline formulaire_charger (SPIP)
 * 
 * Surcharge du formulaire de gis dans l'espace public
 * 
 * @param array $flux
 * @return array $flux
 */
function geol_balades_formulaire_charger($flux){
	if (($flux['args']['form']=='editer_gis') AND !test_espace_prive()) {
		$flux['data']['nodraw'] = 'oui';
		$flux['data']['noimport'] = 'oui';
	}
	return $flux;
}

/**
 * Insertion dans le pipeline diogene_charger (Plugin diogene)
 * 
 * Passer l'option nodraw à la saisie de la carte pour ne pas la polluer avec la barre de dessin de gis_geometries
 * 
 * @param array $flux
 * @return array $flux
 */
function geol_balades_diogene_charger($flux){
	$flux['data']['nodraw'] = 'oui';
	$flux['data']['noimport'] = 'oui';
	return $flux;
}
