<?php
//  ******************************************************
// Prelevements
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST["id_compte_bancaire"])){

$id_compte_bancaire = $_REQUEST["id_compte_bancaire"];
$compte_bancaire = new compte_bancaire($id_compte_bancaire);

$infos_traitena = array();
$count_traitena_a_effectuer = 0;
$traitena_a_effectuer = 0;

$query = "SELECT cb2.id_compte_bancaire,cb2.lib_compte, d.ref_doc, a1.ref_contact, cb2.iban, de.date, sum( montant ) AS montant
                FROM `doc_echeanciers` de
                JOIN documents d ON de.ref_doc = d.ref_doc
                JOIN annuaire a1 ON a1.ref_contact = d.ref_contact
                JOIN comptes_bancaires cb1 ON a1.ref_contact = cb1.ref_contact
                JOIN (SELECT cba0.id_compte_bancaire_src, cba0.id_compte_bancaire_dest, cba0.id_reglement_mode FROM comptes_bancaires_autorisations cba0
                    JOIN comptes_bancaires cb ON cb.id_compte_bancaire = cba0.id_compte_bancaire_src
                    WHERE id_reglement_mode = 5
                    GROUP BY ref_contact
                    ORDER BY cba0.ordre) cba ON cb1.id_compte_bancaire = cba.id_compte_bancaire_src
                JOIN comptes_bancaires cb2 ON cb2.id_compte_bancaire = cba.id_compte_bancaire_dest
                WHERE de.date <= '".date("Y-m-d")."'
                    AND de.id_mode_reglement IN (5)
                    AND d.id_type_doc = 4
                    AND d.id_etat_doc = 18
                    AND cba.id_reglement_mode IN (5)
                    AND
                     ((
                    SELECT sum( montant )
                    FROM reglements_docs rd
                    WHERE rd.ref_doc = de.ref_doc
                    ) < (
                    SELECT sum( montant )
                    FROM doc_echeanciers de2
                    WHERE de2.ref_doc = de.ref_doc && de2.date < now( ) )
                    OR (
                    SELECT sum( montant )
                    FROM reglements_docs rd
                    WHERE rd.ref_doc = de.ref_doc
                    ) IS NULL)
                GROUP BY cb2.id_compte_bancaire;";

$resultat = $bdd->query ($query);
while ($info_traitena = $resultat->fetchObject()) {
    $info_traitena->comptes_bancaires = compte_bancaire::charger_comptes_bancaires($info_traitena->ref_contact , 1, true);
    $infos_traitena[] = $info_traitena;
    $traitena_a_effectuer += $info_traitena->montant;
    $count_traitena_a_effectuer ++;
    }

 $query = "SELECT cb2.id_compte_bancaire,cb2.lib_compte,d.ref_doc,a1.ref_contact ,de.id_doc_echeance, de.date, de.type_reglement ,cb2.iban,  montant
                FROM `doc_echeanciers` de
                JOIN documents d ON de.ref_doc = d.ref_doc
                JOIN annuaire a1 ON a1.ref_contact = d.ref_contact
                JOIN comptes_bancaires cb1 ON a1.ref_contact = cb1.ref_contact
                JOIN (SELECT cba0.id_compte_bancaire_src, cba0.id_compte_bancaire_dest FROM comptes_bancaires_autorisations cba0
                    JOIN comptes_bancaires cb ON cb.id_compte_bancaire = cba0.id_compte_bancaire_src
                    GROUP BY ref_contact
                    ORDER BY cba0.ordre) cba ON cb1.id_compte_bancaire = cba.id_compte_bancaire_src
                JOIN comptes_bancaires cb2 ON cb2.id_compte_bancaire = cba.id_compte_bancaire_dest
                WHERE de.date > '".date("Y-m-d")."'
                    AND de.id_mode_reglement = 5
                    AND d.id_type_doc = 4
                    AND d.id_etat_doc = 18;";

$resultat = $bdd->query ($query);
while ($info_traitena = $resultat->fetchObject()) {
    $info_traitena->comptes_bancaires = compte_bancaire::charger_comptes_bancaires($info_traitena->ref_contact , 1, true);
    $infos_traitena[] = $info_traitena;
    $traitena_a_effectuer += $info_traitena->montant;
    $count_traitena_a_effectuer ++;
    }

$comptes_bancaires	=  compte_bancaire::charger_comptes_bancaires("" , 1);

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_gestion_traites_prelev_traite.inc.php");
}
?>