<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Employe;
use App\Conger;
use DateTime;

class EmployeController extends Controller
{
    public function voir_emp()
    {
        $liste_employe = Employe::listeEmploye();
        return view('voir_employe',[
            'liste_employe' => $liste_employe,
        ]
    );
    }

    public function ficheSalaire(Request $request)
    {
        $idsociete = $request->session()->get('idsociete');
        $idemploye=request('idemploye');
        $datepaie = request('datepaie');
        $nbre_jour = 30;
        $datefin = date("Y-m-d",strtotime(date("Y-m-d",strtotime($datepaie)). '+'.$nbre_jour .'days'));

        // A propos entreprise
        $societe = Employe::detailsociete($idsociete);
        foreach($societe as $scs)
        {
            $noms = $scs->nom;
            $cnapss = $scs->cnaps;
            $adresses = $scs->adresse;
            $telephones = $scs->telephone;
            $numif = $scs->numif;
            $numrc = $scs->numrc;
            $numstat = $scs->numstat;
        }



        // a propos employe
        $detail_employe = Employe::aproposSalaire($idemploye);
        foreach($detail_employe as $rows)
        {
              $nomemp = $rows->nomemp;
              $prenom = $rows->prenom;
              $idemploye = $rows->idemploye;
              $numerocnaps = $rows->numerocnaps;
              $debut_service = $rows->debut_service;
              $anciennete = $rows->anciennete;
              $poste = $rows->poste;
              $salairebase = $rows->salairebrut;
              $taux_journalier = $rows->salairebrut/30;
              $taux_horaire = $rows->salairebrut/173.33;
              $indice = $rows->salairebrut/1.334;
              $droit_conger = $taux_journalier;
              $droit_preavis = $taux_journalier;
        }


        $datepaie_ok = DateTime::createFromFormat('Y-m-d', $datepaie);
        $annee = $datepaie_ok->format("Y");
        $Mois = 1;//$datepaie_ok->format("m");
        $get_heure = Employe::get_heure_supp($idemploye,$annee,$Mois);
        foreach($get_heure as $get_heures)
        {
              //heure supp 30
            $nbre_heure_30 = $get_heures->heuresupp8;
            $heure_sup_30 = $taux_horaire + 0.3;
            $heure_sup_30_final = $heure_sup_30 * $nbre_heure_30;

            //heure supp 50 final
            $heure_sup_40_final = 0;

            //heure supp 100 final
            $heure_sup_100_final = 0;
              //heure sup 50
            $nbre_heure_50 = $get_heures->heuresupp50;
            $heure_sup_50 = $taux_horaire + 0.5;
            $heure_sup_50_final = $heure_sup_50 * $nbre_heure_50;

        }

        // heure nuit
        $get_heure_nuit =  Employe::get_heure_nuit($idemploye,$annee,$Mois);
        foreach($get_heure_nuit as $get_heure_nuits)
        {
            $nbre_heure_nuit = $get_heure_nuits->total_heure;
            $heure_supp_nuit = $taux_horaire + 0.4;
            $heure_supp_nuit_final = $heure_supp_nuit + $nbre_heure_nuit;
        }
        //heure abscence
        $get_heure_absence = Employe::get_heure_abscence($idemploye,$annee,$Mois);
        foreach($get_heure_absence as $get_heure_absences)
        {
                $nbre_heure_absence = $get_heure_absences->total_heure;
                $cout_absence = $taux_horaire*$nbre_heure_absence;

        }


        //indemnite de licencement
        $licencement = $taux_journalier;

        // salaire brute
        $total_salairebrute = ($salairebase + $heure_supp_nuit_final +  $heure_sup_30_final + $heure_sup_50_final) - $cout_absence;

        //prime
        $prime = 0;

        //periode ant
        $periode_ant = 0;

         // irsa
         $irsa = Employe::irsaEmploye($total_salairebrute);
         foreach($irsa as $irsas)
         {    $irsa_inf_350 = 0;
              $irsa1 = $irsas->irsa1;
              $irsa2 = $irsas->irsa2;
              $irsa3 = $irsas->irsa3;
              $irsa4 = $irsas->irsa4;
              $irsa_total = $irsas->somme;
         }


        // Salaire brut de l employe x
        $salairebrut = collect(\DB::select(' select salaire_brut_emp(?) as salaire_brut', [$idemploye]))->first();
        $retenue_cnaps = $total_salairebrute*0.01;
        $retenue_sanitaire = $total_salairebrute*0.01;
        $total_retenue = $irsa_total + $retenue_cnaps + $retenue_sanitaire;
        $avance = 0;
        $net_a_payer = $total_salairebrute - $total_retenue;

        $montant_imposable = $total_salairebrute - (($total_retenue) - $total_salairebrute*0.01 -
        $total_salairebrute*0.01);

        $existe_salaire = Employe::if_salaire_existe($idemploye,$annee,$Mois);

        return view('fiche_salaire',[
            'idemploye' => $idemploye,
            'detail_employe' => $detail_employe,
            'societe' => $societe,
            'irsaemp' => $irsa,
            'salairebrut' => $salairebrut->salaire_brut,
            'nomemp' => $nomemp,
            'prenom' => $prenom,
            'numerocnaps' => $numerocnaps,
            'debut_service' => $debut_service,
            'anciennete' => $anciennete,
            'poste' => $poste,
            'salairebase' => $salairebase,
            'taux_journalier' => $taux_journalier,
            'taux_horaire' => $taux_horaire,
            'indice' => $indice,
            'noms' => $noms,
            'cnapss' => $cnapss,
            'adresses' => $adresses,
            'telephones' => $telephones,
            'numif' => $numif,
            'numrc' => $numrc,
            'numstat' => $numstat,
            'droit_conger' => $droit_conger,
            'droit_preavis' => $droit_preavis,
            'irsa_inf_350' => $irsa_inf_350,
            'irsa1' => $irsa1,
            'irsa2' => $irsa2,
            'irsa3' => $irsa3,
            'irsa4' => $irsa4,
            'irsa_total' => $irsa_total,
            'retenue_cnaps' => $retenue_cnaps,
            'retenue_sanitaire' => $retenue_sanitaire,
            'net_a_payer' => $net_a_payer,
            'montant_imposable' => $montant_imposable,
            'datepaie' => $datepaie,
            'datefin' => $datefin,
            'heure_sup_30_final' => $heure_sup_30_final,
            'heure_sup_50_final' => $heure_sup_50_final,
            'heure_sup_40_final' => $heure_sup_40_final,
            'heure_sup_100_final' => $heure_sup_100_final,
            'nbre_heure_30' => $nbre_heure_30,
            'nbre_heure_50' => $nbre_heure_50,
            'nbre_heure_nuit' => $nbre_heure_nuit,
            'heure_supp_nuit_final' => $heure_supp_nuit_final,
            'cout_absence' => $cout_absence,
            'nbre_heure_absence' => $nbre_heure_absence,
            'licencement' => $licencement,
            'total_salairebrute' => $total_salairebrute,
            'total_retenue' => $total_retenue,
            'existe_salaire' => $existe_salaire,
            'prime' => $prime,
            'periode_ant' => $periode_ant,
            'avance' => $avance,
            'annee' => $annee,
            'mois' => $Mois
        ]
        );
    }

    public function exporterSalaire()
    {
             Employe::inserer_fiche_paie(request('idemploye'),request('nomemp'),request('prenom'),request('debut_service'),request('poste'),request('numerocnaps'),request('salairebase'),request('taux_journalier'),request('taux_horaire'),request('datepaie'),request('nbre_heure_absence'),request('heure_sup_30_final'),request('heure_sup_40_final'),request('heure_sup_50_final'),request('heure_sup_100_final'),request('heure_supp_nuit_final'),request('prime'),request('periode_ant'),request('droit_conger'),request('droit_preavis'),request('licencement'),request('total_salairebrute'),request('retenue_cnaps'),request('retenue_sanitaire'),request('irsa_inf_350'),request('irsa1'),request('irsa2'),request('irsa3'),request('irsa4'),request('irsa_total'),request('total_retenue'),request('avance'),request('net_a_payer'),request('montant_imposable'),request('annee'),request('mois'));
    }

    public  function voir_etat_paie()
    {
        $liste = Employe::etat_de_paie();
        $total = Employe::total();
        return view('Etat_de_paie',[
            'liste' => $liste,
            'total' => $total,

        ]);
    }

    public function recherchePaie()
    {
        $annee = request('annee');
        $mois = request('mois');
        $liste = Employe::recherchePaie($annee,$mois);
        // foreach($liste as $rows)
        // {
        //     $cat = Employe::get_categorie($rows->idemploye);
        // }
        $total = Employe::totalAn($annee,$mois);
        return view('Etat_de_paie',
            ['liste' => $liste,
            'total' => $total,
    ]);
    }

    public function historique()
    {
        $liste = Employe::get_liste();
        $total = Employe::count_emp();
         return view('historique_emp',[
                'liste' => $liste,
                'total' => $total,
         ]);
    }

    public function detail_emp()
    {
        return view('detail_emp',[
            'idemploye' => request('id'),
        ]);
    }

    public function voir_detail_emp()
    {
        $resultat = 0;
        $resultat = Employe::detail_employe(request('choix'),request('idemploye'),request('mois'),request('annee'));
        // if(request('choix') == 4)
        // {
        //     $resultat = Employe::get_salaire_mensuel(request('idemploye'),request('mois'),request('annee'));
        // }

        return view('voir_detail_emp',[
            'resultat' => $resultat,
        ]);
    }

    public function pointage()
    {
        $resultat = 0;
        $liste_employe = Conger::liste_employe();
        $liste = Employe::listeMouvement();
        return view('pointage',[
            'liste' => $liste,
            'liste_employe' => $liste_employe,
        ]);
    }

    public function ajout_pointage()
    {
        $idemploye = request('employe');
        $mois = request('mois');
        $semaine = 1;
        $jour = request('jour');
        $heure = request('heure');
        $annee = request('annee');
        $type_mouvement = request('mouvement');
        Employe::ajout_pointage($idemploye,$mois,$semaine,$jour,$heure,$annee,$type_mouvement);
    }
}
