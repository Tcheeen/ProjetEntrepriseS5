<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Conger;

class CongerController extends Controller
{
    const TABLE_Conger = 'Conger';

    public function index()
    {
        $liste_emp_dep_cong  = Conger::v_total_emp_dep_cong();
        $liste_employe = Conger::liste_employe();
        $liste_departement = Conger::liste_departement();
        $liste_conger = Conger::liste_conger();
        $planning_conger = Conger::planning_conger();
        $date_systeme = Carbon::now();
        return view('Conger',[
            'liste_employe' => $liste_employe,
            'liste_emp_dep_cong' => $liste_emp_dep_cong,
            'liste_departement' => $liste_departement,
            'liste_conger' => $liste_conger,
            'planning_conger' => $planning_conger,
            'annee' => $date_systeme->year,
        ]
    );
    }

    public function trait_conger()
    {
        $employe = request('employe');
        $libelle = request('libelle');
        $iddepartement  = Conger::getiddepartement_employe($employe);
        $conger = request('conger');
        $date_deb = request('date_deb');
        $date_fin = request('date_fin');
        $desicionnaire = request('desicionnaire');

        //liste des employers
        $liste_employe = Conger::liste_employe();

        $liste_emp_dep_cong  = Conger::v_total_emp_dep_cong();

        //liste departements
        $liste_departement = Conger::liste_departement();

        //liste type conger
        $liste_conger = Conger::liste_conger();


        //date debut service employe
        $date_service_emp = Conger::check_service($employe);

      //date systeme
        $date_systeme = Carbon::now();
        $annee = 2022;

        //nombre jour de conger selon les deux dates
        $date1 = new \DateTime($date_deb);
        $date2 = $date1->diff(new \DateTime($date_fin));
        $nombre_jour_conger = $date2->days;

        //get mois et annee absc
        $date_abs = \DateTime::createFromFormat('Y-m-d', $date_deb);
        $mois_abs = $date_abs->format("m");
        $annee_abs = $date_abs->format("Y");


        //voir moitier employe dans un departement avec la date si deja prise
        $valiny  =  Conger::check_moitier_employe_deprt($iddepartement,$date_deb);

        //reste nombre congé en une année
        $reste =  Conger::check_if_sup_conger_max($conger,$employe,$nombre_jour_conger,$date_service_emp,$date_systeme,$desicionnaire,$annee);

        //moitier moitier conger selon le typeconger
        $moitier_moitier_conger = Conger::moitier_moitier_conger($desicionnaire,$conger,$nombre_jour_conger,$employe,$date_service_emp,$date_systeme,$annee);


        //nombre jour ajoutée au conger
        $nombre_jour_ajouter = Conger::get_nbre_jour_ajout($desicionnaire,$conger,$nombre_jour_conger,$employe,$date_service_emp,$date_systeme,$annee);


        //nombre jour restant @ absence
        $nombre_jour_restant = Conger::get_nbre_jour_restant($desicionnaire,$conger,$nombre_jour_conger,$employe,$date_service_emp,$date_systeme,$annee);



    //    $moitier_moitier_conger = Conger::gettotaljourconger($employe,$nombre_jour_conger,$desicionnaire,$conger);

        //ampy 1ans de service V
        $jour_total = Conger::calcul_jour_date($employe);
        $inserer = "";
        $moitier = "";
        $lany_conger = "";
        $depart = "";
        if($jour_total==1){
               $inserer = "1an de service acquis. ";
                 if($moitier_moitier_conger == 1)
                 {
                     $moitier = "Vous pouvez encore prendre congée !";
                     if ($nombre_jour_ajouter == 0)
                     {
                        $lany_conger = "Vous n'avez plus de jour de congée. Tous jours de congé sup sont deductible de vos jours d'absence. .$nombre_jour_conger";
                        Conger::inserer_absence($employe,$mois_abs,1,1,$nombre_jour_conger*24,2010,3);
                     }
                     else{
                                $lany_conger = "Vous pouvez encore prendre congée !";
                                if($valiny==3 || $valiny==4)
                                {
                                    $depart = " Vous pouvez prendre congé !";
                                    Conger::inserer_conger($employe,$libelle,$iddepartement,$nombre_jour_conger,$conger,$date_deb,$date_fin,2023,$desicionnaire);
                                }
                                else {
                                    $depart = "Il y a plusieurs départements où il y a cet employé !";
                                }
                       }
               }
              else {
                   if($nombre_jour_ajouter==0)
                   {
                    $lany_conger = "Vous n'avez plus de jour de congée. Tous jours de congé sup sont deductible de vos jours d'absence. .$nombre_jour_conger jours seront deductibles";
                    Conger::inserer_absence($employe,$mois_abs,1,1,$nombre_jour_conger*24,$annee_abs,3);
                   }
                   else
                   {
                    $moitier = "La durée de votre congé est supérieure au nombre de congé dont vous disposez ! il ne vous reste que .$nombre_jour_ajouter jours de conger";
                    // Conger::inserer_conger($employe,$libelle,$iddepartement,$nombre_jour_ajouter,$conger,$date_deb,$date_fin,2023,$desicionnaire);
                    // Conger::inserer_absence($employe,$mois_abs,2,$nombre_jour_restant*24,$annee_abs);
                   }
              }
        }
        else{
            $inserer ="1an de service requis ! deductible sur absence";

        }
         //liste conger
        $planning_conger = Conger::planning_conger();
      return view('Conger',[
            'liste_employe' => $liste_employe,
            'liste_emp_dep_cong' => $liste_emp_dep_cong,
            'liste_departement' => $liste_departement,
            'liste_conger' => $liste_conger,
            'planning_conger' => $planning_conger,
            'annee' => 2023,
            'inserer' => $inserer,
            'moitier' => $moitier,
            'lany_conger' => $lany_conger,
            'depart' => $moitier_moitier_conger,
            'iddepartement' => $iddepartement,
        ]
      );
    }
    public function ornigramme()
    {
        $liste_departement = Conger::liste_departement();
        return view('Organigramme',[
            'liste_departement' => $liste_departement,
        ]);
    }
    public function org_depart()
    {
        $liste_departement = Conger::liste_departement();
        $idepartement = request('id') ;
        return view('Organigramme',[
                'liste_departement' => $liste_departement,
                'affiche' => $idepartement,
        ]);
    }

    public function recherche()
    {

    }
}
