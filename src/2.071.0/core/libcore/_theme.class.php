<?php
//  ******************************************************
// CLASSE REGISSANT LES INFORMATIONS GENERIQUE SUR UN THEME D'AFFICHAGE 
//  ******************************************************

class theme {
    private $id_theme;
    private $id_interface;
    private $lib_theme;
    private $code_theme;
    private $id_langage;
    private $actif;
    private $dir_theme;
    private $dir_css;
    private $dir_js;
    private $dir_img;

    function __construct($id_theme) {
        global $DIR, $bdd;
        $query  = "SELECT id_theme, id_interface, lib_theme, code_theme, id_langage, actif
					FROM interfaces_themes
					WHERE id_theme = '" . $id_theme . "' ";
        $result = $bdd->query($query);
        $theme  = $result->fetchObject();
        // Thème non trouvé
        if (!isset($theme->id_theme)) {
            $erreur = "Tentative de chargement d'un thème inexistant (ID_THEME = " . $id_theme . ")";
            alerte_dev($erreur);
        }
        // Thème non actif
        if (!$theme->actif) {
            $erreur = "Tentative de chargement d'un thème non actif (ID_THEME = " . $id_theme . ")";
            alerte_dev($erreur);
        }
        $this->id_theme     = $theme->id_theme;
        $this->id_interface = $theme->id_interface;
        $this->lib_theme    = $theme->lib_theme;
        $this->code_theme   = $theme->code_theme;
        $this->id_langage   = $theme->id_langage;
        $this->actif        = $theme->actif;
        return true;
    }

// Fonctions d'accès aux données : Retourne les répertoires global du theme
    final public function getDir_theme() {
        global $CHOIX_THEME;
        // Répertoire du thème et de l'interface
        $dir_theme = "themes/" . $CHOIX_THEME . "/" . $_SESSION['interfaces'][$this->id_interface]->getDossier() . "";
        return $dir_theme;
    }
    final public function getDir_gtheme() {
        global $CHOIX_THEME;
        // Répertoire du thème
        $dir_theme = "themes/" . $CHOIX_THEME . "/";
        return $dir_theme;
    }

// Fonctions d'accès aux données : Retourne le répertoire CSS du theme
    final public function getDir_css($condival = 'yes') {
        global $CHOIX_THEME;
		// Si "NO" le repertoire est  relatif à l'interface, si "TES" il est global
        if ($condival == "no") { $dir_css = "themes/" . $CHOIX_THEME . "/css/" . $_SESSION['interfaces'][$this->id_interface]->getDossier() . "";}
		else { $dir_css = "themes/" . $CHOIX_THEME . "/css/";}
        return $dir_css;
    }

// Fonctions d'accès aux données : Retourne le répertoire JS du theme
    final public function getDir_js($condival = 'yes') {
        global $CHOIX_THEME;
		// Si "NO" le repertoire est  relatif à l'interface, si "TES" il est global
        if ($condival == "no") {$dir_js = "themes/" . $CHOIX_THEME . "/js/" . $_SESSION['interfaces'][$this->id_interface]->getDossier() . "";}
		else {$dir_js = "themes/" . $CHOIX_THEME . "/js/";}
        return $dir_js;
    }

// Fonctions d'accès aux données : Retourne le répertoire IMG du theme
    final public function getDir_img($condival = 'yes') {
        global $CHOIX_THEME;
		// Si "NO" le repertoire est  relatif à l'interface, si "TES" il est global
        if ($condival == "no") {$dir_img = "themes/" . $CHOIX_THEME . "/img/";}
		else {$dir_img = "themes/" . $CHOIX_THEME . "/img/" . $_SESSION['interfaces'][$this->id_interface]->getDossier() . "";}
        return $dir_img;
    }

// retourne d'identifiant du thème
    final public function getId_theme() {return $this->id_theme;}
// retourne le libellé du thème
    final public function getLib_theme() {return $this->lib_theme;}
// retourne le libellé du thème
    final public function getCode_theme() {return $this->code_theme;}
}
?>