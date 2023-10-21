<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ; //pour authentifier ma classe
use Illuminate\Auth\Authenticatable as Functable ;    //pour mettre les 6 fonctions abstraites
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class Employe extends Model
{
    public static function listeEmploye()
    {
        $liste = DB::select(' select * from candidat full join employe using (idcandidat)');
        return $liste;
    }
    public static function aproposSalaire($ideemploye)
    {
        $liste = DB::select('select idposte,idemploye,horaire_travail,debut_service,detail_employe.nom as nomemp,prenom,sex,datenaissance,diplome,salmin,salmax,poste.nom as poste ,numerocnaps,salaire_brut_emp(?) as salairebrut,  extract(day from(now()-debut_service) ) as anciennete  from detail_employe full join poste_emp using(idemploye) full join poste using (idposte) where idemploye=? ',[$ideemploye,$ideemploye]);
        return $liste;
    }

    public static function detailsociete($idsociete)
    {
        $liste = DB::select('select * from societe where idsociete=?', [$idsociete]);
        return $liste;
    }
    public static function irsaEmploye($salaire)
    {
        $liste = DB::select('select check_IRSA1(?) as irsa1 ,check_IRSA2(?) as irsa2,check_IRSA3(?) as irsa3,check_IRSA4(?) as irsa4, sum ( check_IRSA1(?)  + check_IRSA2(?)  +check_IRSA3(?)+check_IRSA4(?)) as somme', [$salaire,$salaire,$salaire,$salaire,$salaire,$salaire,$salaire,$salaire]);
        return $liste;
    }

    public static function get_heure_supp($idemploye,$annee,$Mois)
    {
        $liste = DB::select('select idemploye , heuresupp8 , heuresupp50, total_heure  from v_get_heure where  idemploye=? and annee=? and Mois=?', [$idemploye,$annee,$Mois]);
        return $liste;
    }

    public static function get_heure_nuit($idemploye,$annee,$Mois)
    {
        $liste = DB::select('select idemploye , total_heure  from v_get_heure_nuit where  idemploye=? and annee=? and Mois=?', [$idemploye,$annee,$Mois]);
        return $liste;
    }

    public static function get_heure_abscence($idemploye,$annee,$Mois)
    {
        $liste = DB::select('select idemploye , total_heure  from v_get_heure_abscence where idemploye=? and annee=? and Mois=?', [$idemploye,$annee,$Mois]);
        return $liste;
    }

    public static function inserer_fiche_paie($idemploye,$nom,$prenom,$date_embauche,$fonction,$numero_cnaps,$salaire_de_base,$taux_journalier,$taux_horaire,$datepaie,$absc_deductible,$heure_supp_30,$heure_supp_40,$heure_supp_50,$heure_supp_100,$majore_nuit,$prime,$periode_ant,$droit_conger,$droit_preavis,$licencement,$salairebrut,$cnaps,$sanitaire,$irsa_inf_350,$irsa_350_400,$irsa_400_500,$irsa_500_600,$irsa_supp_600,$total_irsa,$total_retenue,$avance,$net_a_payer,$montant_imposable,$annee,$mois)
    {
        return  DB::insert('insert into fiche_paie(idemploye,nom,prenom,date_embauche,fonction,num_cnaps,salaire_base,taux_journalier,taux_horaire,datepaie,absc_deductible,heure_supp_30,heure_supp_40,heure_supp_50,heure_supp_100,m_nuit,prime,periode_ant,droit_conger,droit_preavis,licencement,salairebrut,cnaps,sanitaire,irsa_inf_350,irsa_350_400,irsa_400_500,irsa_500_600,irsa_supp_600,total_irsa,total_ret,avance,net_a_payer,montant_amp,annee,mois) values (:idemploye,:nom,:prenom,:date_embauche,:fonction,:num_cnaps,:salaire_base,:taux_journalier,:taux_horaire,:datepaie,:absc_deductible,:h_supp_30,:h_supp_40,:h_supp_50,:h_supp_100,:m_nuit,:prime,:periode_ant,:droit_conger,:droit_preavis,:licencement,:salairebrut,:cnaps,:sanitaire,:irsa_inf_350,:irsa_350_400,:irsa_400_500,:irsa_500_600,:irsa_supp_600,:total_irsa,:total_ret,:avance,:net_a_payer,:montant_imp,:annee,:mois)',[$idemploye,$nom,$prenom,$date_embauche,$fonction,$numero_cnaps,$salaire_de_base,$taux_journalier,$taux_horaire,$datepaie,$absc_deductible,$heure_supp_30,$heure_supp_40,$heure_supp_50,$heure_supp_100,$majore_nuit,$prime,$periode_ant,$droit_conger,$droit_preavis,$licencement,$salairebrut,$cnaps,$sanitaire,$irsa_inf_350,$irsa_350_400,$irsa_400_500,$irsa_500_600,$irsa_supp_600,$total_irsa,$total_retenue,$avance,$net_a_payer,$montant_imposable,$annee,$mois]);
    }

    public static function get_nom_emp($idemploye)
    {
        $liste = collect(DB::select('select * from candidat full join employe using (idcandidat) where idemploye=? ',[$idemploye]))->first();
        return $liste;
    }

    public static function if_salaire_existe($idemploye,$annee,$mois)
    {
        $liste = collect(DB::select('select count(*) as isa from fiche_paie where idemploye=? and annee=? and mois=?',[$idemploye,$annee,$mois]))->first();
        return $liste->isa;
    }


    public static function etat_de_paie()
    {
        $liste = DB::select('select * from fiche_paie');
        return $liste;
    }

    public static function recherchePaie($annee,$mois)
    {
        $liste = DB::select('select * from fiche_paie where annee=? and mois=?',[$annee,$mois]);
        return $liste;
    }

    public static function total()
    {
    $liste = collect(DB::select('select sum(salaire_base) as total_base , sum(total_ret) as total_ret , sum(heure_supp_30+heure_supp_40+heure_supp_50+heure_supp_100) as total_supp , sum(salairebrut) as total_salairebrut , sum(cnaps) as total_cnaps , sum(sanitaire) as total_sanitaire , sum(montant_amp) as total_montant_amp ,sum(net_a_payer) as total_net_a_payer, sum(avance) as total_avance from fiche_paie'))->first();
    return $liste;
    }

    public static function totalAn($annee, $mois)
    {

    $liste = collect(DB::select('select sum(salaire_base) as total_base , sum(total_ret) as total_ret , sum(heure_supp_30+heure_supp_40+heure_supp_50+heure_supp_100) as total_supp , sum(salairebrut) as total_salairebrut , sum(cnaps) as total_cnaps , sum(sanitaire) as total_sanitaire , sum(montant_amp) as total_montant_amp ,sum(net_a_payer) as total_net_a_payer, sum(avance) as total_avance from fiche_paie where annee=? and mois = ? ',[$annee,$mois]))->first();
    return $liste;
    }

    public static function get_categorie($idemploye)
    {
        $liste = collect(DB::select('select c.nomCategorie as nom from Categorie as c inner join employe as e on c.idcategorie=e.idcategorie where e.idemploye=?',[$idemploye]))->first();
        return $liste->nom;
    }

    public static function count_emp()
    {
        $liste = collect(DB::select('select count(*) as isa from employe'))->first();
        return $liste->isa;
    }

    public static function get_liste()
    {
        $liste = DB::select('select e.idemploye  as employe , c.nom as nom , c.prenom as prenom from candidat as c inner join employe as e on c.idcandidat = e.idcandidat ');
        return $liste;
    }

    public static function get_nbre_conger($idemploye,$mois,$annee)
    {
         $count = collect(DB::select('select sum(jour_conger) as total from Conger where idemploye=? and extract(month from date_deb)=? and extract(year from date_deb)=?',[$idemploye,$mois,$annee]))->first();
         return $count->total;
    }

    public static function get_nbre_heure_supp($idemploye,$mois,$annee)
    {
        $count = collect(DB::select('select sum(heure) as total from mouvement where idemploye=? and mois=? and annee=? and type_mouvement!=3',[$idemploye,$mois,$annee]))->first();
        return $count->total;
    }

    public static function get_nbre_absence($idemploye,$mois,$annee)
    {
        $count = collect(DB::select('select sum(heure) as total from mouvement where idemploye=? and mois=? and annee=? and type_mouvement=3',[$idemploye,$mois,$annee]))->first();
        return $count->total;
    }

    public static function get_salaire_mensuel($idemploye,$mois,$annee)
    {
        $count = collect(DB::select('select net_a_payer as total from fiche_paie where idemploye=? and mois=? and annee=? ',[$idemploye,$mois,$annee]))->first();
        return $count->total;
    }

    public static function detail_employe($option,$idemploye,$mois,$annee)
    {
        $resultat = 0;
        if($option == 1)
        {
            $resultat = self::get_nbre_conger($idemploye,$mois,$annee);
        }
        if($option == 2)
        {
            $resultat = self::get_nbre_heure_supp($idemploye,$mois,$annee);
        }
        if($option == 3)
        {
            $resultat = self::get_nbre_absence($idemploye,$mois,$annee);
        }
        if($option == 4)
        {
            $resultat = self::get_salaire_mensuel($idemploye,$mois,$annee);
        }
        return $resultat;
    }

    public static function listeMouvement()
    {
    $liste = DB::select('select*from mouvement');
    return $liste;
    }

    public static function ajout_pointage($idemploye,$mois,$semaine,$jour,$heure,$annee,$type_mouvement)
    {
        return  DB::insert('insert into mouvement(idemploye,mois,semaine,jour,heure,annee,type_mouvement) values (:idemploye,:mois,:semaine,:jour,:heure,:annee,:type_mouvement)',[$idemploye,$mois,$semaine,$jour,$heure,$annee,$type_mouvement]);
    }
}