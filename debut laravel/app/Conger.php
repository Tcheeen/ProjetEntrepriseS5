<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ; //pour authentifier ma classe
use Illuminate\Auth\Authenticatable as Functable ;    //pour mettre les 6 fonctions abstraites
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class Conger extends Model
{

    public static function v_total_emp_dep_cong()
    {
        $liste = DB::select('select *from v_total_emp_dep_cong');
        return $liste;
    }
    public static function liste_employe()
    {
        $liste = DB::select('select * from v_candidat_employe');
        return $liste;
    }

    public static function liste_departement()
    {
        $liste = DB::select('select * from departement');
        return $liste;
    }

    public static function liste_employe_par_departement($iddepartement)
    {
        $count = collect(DB::select('select count(*) as is from departement_employe where iddepartement = ?',[$iddepartement]))->first();
        return $count->is;
    }

    public static function getiddepartement_employe($idemploye)
    {
        $iddepartement = collect(DB::select('select iddepartement from departement_employe where idemploye = ?',[$idemploye]))->first();
        return $iddepartement->iddepartement;
    }

    public static  function getjourmaxconger($idtype_conger,$date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$annee)
    {
        $jour_max = 0;
        if($idtype_conger == 3)
        {
               $jour_max = self::get_conger_date($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee);
        }
        else{
            $count = collect(DB::select('select jour_max from Type_conger where idType_conger = ?',[$idtype_conger]))->first();
            $jour_max = $count->jour_max;
        }
        return $jour_max;
    }

    public static function gettotaljourconger($idemploye,$days,$desicionnaire,$idtypeconger,$annee)
    {
         if($idtypeconger == 3)
         {
            $count = collect(DB::select('select sum(jour_conger) as total from Conger where idemploye = ? and desicionnaire = ?',[$idemploye,$desicionnaire]))->first();
            $return = $count->total;
            if($return == null)
            {
                $return = 0;
            }
            $return = $return + $days;
         }
         else {
            $count = collect(DB::select('select sum(jour_conger) as total from Conger where idemploye = ? and annee= ? and idtype_conger!=3',[$idemploye,$annee]))->first();
            $return = $count->total;
            if($return == null)
            {
                $return = 0;
            }
           $return = $return + $days;
         }
        return $return;
    }

    public static function liste_conger()
    {
             $liste_conger =  DB::select('select * from Type_Conger');
             return $liste_conger;
    }

    public static function liste_date_conger_dep($iddepartement)
    {
        $liste_conger =  DB::select('select * from v_date_departement where iddepartement = ?',[$iddepartement]);
        return $liste_conger;
    }

    public static function inserer_conger($idemploye,$libelle,$iddepartement,$jour_conger,$type_conger,$date_deb,$date_fin,$annee,$desicionnaire)
    {
    //  $valiny = self::check_moitier_employe_deprt($iddepartement,$date_deb);
      //  if($valiny==3 || $valiny==4)
        //{
           return  DB::insert('insert into Conger(idemploye,libelle,iddepartement,jour_conger,idType_conger,date_deb,date_fin,annee,desicionnaire) values (:idemploye,:libelle,:iddepartement,:jour_conger,:idType_conger,:date_deb,:date_fin,:annee,:desicionnaire)',[$idemploye,$libelle,$iddepartement,$jour_conger,$type_conger,$date_deb,$date_fin,$annee,$desicionnaire]);
          //   return "bien inserer";
       // }
       // else {
            //return "non inserer";
       // }
    }
    public static function planning_conger()
    {
        $planning_conger = DB::select('select *from v_conger');
        return $planning_conger;
    }

    public static function count_depart_employe($iddepartement)
    {
           $count =  collect(DB::select('select count(iddepartement) as is from v_employe_conger_dep where iddepartement = ? ',[$iddepartement]))->first();
           return $count->is;
    }

    public static function check_moitier_employe_deprt($iddepartement,$date_deb)
    {
           $count_employe_depart_conger = self::count_depart_employe($iddepartement);
           $total_employer_depart = self::liste_employe_par_departement($iddepartement);
            $return = self::check_date_taken($date_deb,$iddepartement);
           if($count_employe_depart_conger <= ($total_employer_depart/2) && $return == 1)
           {
                 return 3;
           }
           else if($count_employe_depart_conger <= ($total_employer_depart/2))
           {
                 return 4;
           }
           else {
              return 5;
           }
    }

    public static function check_date_taken($date_deb,$iddepartement)
    {
        $liste =  self::liste_date_conger_dep($iddepartement);
        foreach($liste as $rows)
        {
            if($date_deb == $rows->date_deb)
            {
                return 1;
            }
        }
    }
    public static function check_if_sup_conger_max($idtype_conger,$idemploye,$days,$date_debut_service,$date_annee_syst,$desicionnaire,$annee)
    {
        $jour_max = self::getjourmaxconger($idtype_conger,$date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$annee);
        $total = self::gettotaljourconger($idemploye,$days,$desicionnaire,$idtype_conger,$annee);
        $result = 0;
        $reste = $jour_max - $total;
        if($idtype_conger == 3)
        {
            $result = $jour_max;
        }
        else {
            $result = $jour_max - $total;
        }
        return $result;
    }
    public static function check_conger_admin_emp($desicionnaire,$idemploye)
    {
        $total =  collect(DB::select('select sum(jour_conger) as total from Conger where desicionnaire = ? and idemploye = ?',[$desicionnaire,$idemploye]))->first();
        $return = $total->total;
        if($return == null)
        {
            $return = 0;
        }
        return $return;
    }

    public static function check_moitier_typeconger($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtypeconger,$annee)
    {
         $result = 0;
         $moitier_conger = self::get_conger_date($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtypeconger,$annee)/2;
         if(is_float($moitier_conger))
         {
            $tab = explode(".",$moitier_conger);
            for($i=0;$i<count($tab);$i++)
            {
               $result = $tab[0];
            }
         }
         else {
            $result = $moitier_conger;
         }
         return $result;
    }

    public static function get_nbre_jour_restant($desicionnaire,$idtype_conger,$days,$idemploye,$date_debut_service,$date_annee_syst,$annee)
    {
        if($idtype_conger == 3)
        {
           //total_conger + jour demandé
           $total = self::check_conger_admin_emp($desicionnaire,$idemploye);
           $total_days = $total + $days;

           //moitié congé qu'il doit prendre
           $moitier_conger = self::get_conger_date1($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee);

             $result = $total_days - $moitier_conger;
             return $result;
        }
    }

  public static function get_nbre_jour_ajout($desicionnaire,$idtype_conger,$days,$idemploye,$date_debut_service,$date_annee_syst,$annee)
    {
        if($idtype_conger == 3)
        {
           //total_conger + jour demandé
           $total = self::check_conger_admin_emp($desicionnaire,$idemploye);
           $total_days = $total + $days;
           //moitié congé qu'il doit prendre
           $moitier_conger = self::get_conger_date1($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee);
           $result = $moitier_conger - $total;
           return $result;
        }
    }

    public static function moitier_moitier_conger($desicionnaire,$idtype_conger,$days,$idemploye,$date_debut_service,$date_annee_syst,$annee)
    {
    $result = 0;
         if($idtype_conger == 3)
         {
            $total = self::check_conger_admin_emp($desicionnaire,$idemploye);
            $total_days = $total + $days;

            $moitier_conger = self::get_conger_date1($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee);

            // $moitier  =  self::check_moitier_typeconger($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger);
                if($total_days<=$moitier_conger)
                {
                $result = 1;
                }
                else {
                $result = 2;
                }
        }
        else
        {
            $result = 1;
        }
        return $result;
    }

    public static function check_service($idemploye)
    {
        $date_debut_service =  collect(DB::select('select debut_service from employe where idemploye = ?',[$idemploye]))->first();
        return $date_debut_service->debut_service;
    }

    public static function calcul_jour_date($employe)
    {
        $date_now = Carbon::now();
        $date_service = self::check_service($employe);
        $date_now_1 = new \DateTime($date_service);
        $date_total_1 = $date_now_1->diff(new \DateTime($date_now));
        $jour_total = $date_total_1->days;
        if($jour_total<=365)
        {$return = 2;}
        else {$return = 1;}
        return $return;
    }

    public static function get_conger_date($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee)
    {
        $nombre_conger = 30;
        $date1 = new \DateTime($date_debut_service);
        $date2 = $date1->diff(new \DateTime($date_annee_syst));
        $nombre_annee = $date2->y;
        $nombre_jour = $date2->days;
        $nombre_jour_eto = 0;
        $date_anne_suivant = date("Y-m-d",strtotime(date("Y-m-d",strtotime($date_annee_syst)). '+'.$nombre_annee .'year'));
        $diff_annee_1 = new \DateTime($date_annee_syst);
        $diff_deux_annee = $diff_annee_1->diff(new \DateTime($date_anne_suivant));
        if($nombre_annee < 1)
        {
            $nombre_conger = $nombre_conger + 0;
        }
        else {
            for($i = 1 ; $i <= $nombre_annee;$i++)
            {
                $nombre_conger = $nombre_conger + 30;
            }
        }
        $total = self::gettotaljourconger($idemploye,$days,$desicionnaire,$idtype_conger,$annee);
        $nombre_conger = $nombre_conger - $total;
        return $nombre_conger;
    }


    public static function get_conger_date1($date_debut_service,$date_annee_syst,$idemploye,$days,$desicionnaire,$idtype_conger,$annee)
    {
        $result=0;
        $nombre_conger = 30;
        $date1 = new \DateTime($date_debut_service);
        $date2 = $date1->diff(new \DateTime($date_annee_syst));
        $nombre_annee = $date2->y;
        $nombre_jour = $date2->days;
        $nombre_jour_eto = 0;
        $date_anne_suivant = date("Y-m-d",strtotime(date("Y-m-d",strtotime($date_annee_syst)). '+'.$nombre_annee .'year'));
        $diff_annee_1 = new \DateTime($date_annee_syst);
        $diff_deux_annee = $diff_annee_1->diff(new \DateTime($date_anne_suivant));
        if($nombre_annee < 1)
        {
            $nombre_conger = $nombre_conger + 0;
        }
        else {
            for($i = 1 ; $i <= $nombre_annee;$i++)
            {
                $nombre_conger = $nombre_conger + 30;
            }
        }
        $total = self::gettotaljourconger($idemploye,$days,$desicionnaire,$idtype_conger,$annee);
        $nombre_conger = $nombre_conger/2;

        if(is_float($nombre_conger))
        {
           $tab = explode(".",$nombre_conger);
           for($i=0;$i<count($tab);$i++)
           {
              $result = $tab[0];
           }
        }
        else {
           $result = $nombre_conger;
        }
        return $result;
    }

    public static function inserer_absence($idemploye,$mois,$semaine,$jour,$heure,$annee,$type_mouvement)
    {
        return  DB::insert('insert into Mouvement(idemploye,Mois,semaine,Jour,heure,annee,type_mouvement) values(?,?,?,?,?,?,?)',[$idemploye,$mois,$semaine,$jour,$heure,$annee,$type_mouvement]);
    }
}

