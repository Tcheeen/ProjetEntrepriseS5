<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;


class CandidatController extends Controller
{

    const TABLE_candidat = 'Candidat';

    //candidat embaucher
    public function getNoteFinal($idannonce)
    {
        $note = collect(\DB::select('select (t.note+e.note)/2 as moy , e.idcandidat as idcandidat from Test as t inner join Entretien as e on t.idcandidat = e.idcandidat where t.idannonce = ? order by moy desc limit 1',[$idannonce]))->first();
        return $note;
    }

    
    //liste candidat entretien
    public function listeCandidatEntretien($idannonce)
    {
        $liste = \DB::select('select * from Test where idannonce = ? order by note desc limit 10',[$idannonce]);
        return $liste;
    }

    public function if_entretien_empty($idannonce,$idcandidat)
    {
        $count = collect(\DB::select('select count(*) as isa from Entretien where idannonce = ? and idcandidat = ?',[$idannonce,$idcandidat]))->first();
        return $count;
    }

    public function index()
    {

        $date = Carbon::now();
        $totalDurreSyst = ($date->hour * 60) + $date->minute ;

            $note_exp = request('note_exp');
            $note_dip = request('note_dip');
            $note_age = request('note_age');
            $note_dtn=request('note_dtn');
            $note_genre = request('note_genre');
            $note_j = request('note_j');
            $note_loc = request('note_loc');
            $note_enfant = request('note_enfant');
            $note_sm = request('note_sm');


            // Total coefficient
            $total_coeff=request('coeff_exp')+request('coeff_dip')+request('coeff_age')+request('coeff_dtn')+request('coeff_genre')+request('coeff_j')+request('coeff_loc')+request('coeff_enfant')+request('coeff_sm');

            //Total note *coefficent
            $note_finale=$note_exp+$note_dip+$note_age+$note_dtn+$note_genre+$note_j+$note_loc+$note_enfant+$note_sm;


            //Moyenne
            $moyenne=$note_finale/$total_coeff;


            \DB::update('update Candidat set note = ?  where idcandidat = ? and idannonce = ?',[$moyenne,request('idcandidat'),request('idannonce')]);

            return app('\App\Http\Controllers\AdminController')->voirDossier();
    }


    // Recuperer la duree du test du candidat;
    public function get_duree_du_candidat($idcandidat,$idannonce)
    {
          $delai =  collect(\DB::select(" select to_seconds(heure_test +minute_test *interval '1 minute')-to_seconds(LOCALTIME)as horaire from test where idcandidat = ? and idannonce= ? ",[$idcandidat,$idannonce]))->first();
          return $delai;
    }

    public function log_candidat()
    {
        $delai= $this->get_duree_du_candidat(request('idcandidat'),request('idannonce'));

        if(($delai->horaire)>0){
            return view('Acc_Candidat',[
                'idcandidat' => request('idcandidat'),
                'idannonce' => request('idannonce'),
                'delai'=> $delai->horaire,
            ]);
        }
        elseif(($delai->horaire)<=0){
            return view('Acc_Candidat',[
                'idcandidat' => request('idcandidat'),
                'idannonce' => request('idannonce'),
                'delai_ecoule'=> 'delai_ecoule',
            ]);
        }
    }


    public function test_cand()
    {
        for($i = 1; $i <=20 ; $i++)
        {
           if(request('quest_'.$i) != null)
           {
             \DB::insert('insert into questionnaire(idannonce,question,idcandidat) values (:idannonce,:question1,:idcandidat)',[request('idannonce'),request('quest_'.$i),request('idcandidat')]);
           }

        }
        return view('Acc_Candidat',[
            'idcandidat' => request('idcandidat'),
            'idannonce' => request('idannonce'),
            'Reponse'=> 'Reponse envoye',
            'delai'=> request('delai'),

        ]);
    }

    public function eval_entretien()
    {
        $liste = $this->listeCandidatEntretien(request('idannonce'));
        $count = $this->if_entretien_empty(request('idannonce'),request('idcandidat'));
        if($count->isa == 0)
        {
            // foreach($liste as $rows)
            // {
                \DB::insert('insert into Entretien(idannonce,idcandidat,note) values (:idannonce,:idcandidat,:note)',[request('idannonce'),request('idcandidat'),request('note')]);
            // }
        }
        return view('eval_entretien',[
            'idcandidat' => request('idcandidat'),
            'idannonce' => request('idannonce'),
        ]);
    }

    public function eval_note_entretien()
    {
        \DB::update('update Entretien set idcandidat = ? , note = ? where idcandidat = ? and idannonce = ?',[request('idcandidat'),request('note'),request('idcandidat'),request('idannonce')]);
        return app('\App\Http\Controllers\AdminController')->voirDossier();

    }

    public function eval_embauche()
    {
        $liste = $this->listeCandidatEntretien('idannonce');
        $noteFinal = $this->getNoteFinal(request('idannonce'));
        $idcandidat = $noteFinal->idcandidat;
        $note = $noteFinal->moy;

        return view('eval_embauche',[
           'idcandidat' => $idcandidat,
           'note' => $note,
           'idannonce' => request('idannonce'),
        ]);

    }

    public function liste_cand()
    {
        $liste = \DB::select('select * from Candidat where  note=0 and idannonce = ?',[request('idannonce')]);
        return view('liste_cand',[
            'liste' => $liste,
            'idannonce' => request('idannonce'),
        ]);
    }


    // Ajout de candidat
    public function ajoutc()
    {

        \DB::insert('insert into Candidat(idannonce,nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values(:idannonce,:nom,:prenom,:age,:email,:mdp,:adresse,:sexe,:dtn,:juridique,:pere,:profpere,:mere,:profmere,:affiliation,:enfant,:matrimoniale,:experience,:diplome)',[request('idannonce'),request('nom'),request('prenom'),request('age'),request('email'),request('mdp'),request('adresse'),request('sexe'),request('dtn'),request('juridique'),request('pere'),request('profpere'),request('mere'),request('profmere'),request('affiliation'),request('enfant'),request('matrimoniale'),request('experience'),request('diplome')]);

         return app('\App\Http\Controllers\AdminController')->voirDossier();

    }

    // Description candidat inscrit
    public function desc_candidat($idcandidat,$idannonce)
    {
        $note =\DB::select(' select* from candidat where idcandidat= ? and idannonce= ? ',[$idcandidat,$idannonce]);
        return $note;
        ;
    }

    //  ajout de note du candidat pendant le test
    public function ajout_note()
    {
        $descri_candidat = $this->desc_candidat(request('idcandidat'),request('idannonce'));

        return view('ajout_note',[
            'descri_candidat'=> $descri_candidat,
            'idcandidat' =>request('idcandidat'),
            'idannonce'=> request('idannonce')
        ]);
    }

      // Prends le nombre d'entretien sur l'annonce
      public function count_entretien($idannonce){
        $count =collect(\DB::select('select count(*) as count from entretien where  idannonce= ? ',[$idannonce]))->first();
        return $count;

    }
    // Prends le nombre d'entretien sur l'annonce
    public function max_moyenne_entretien($idannonce){
        $max =\DB::select('select m.idcandidat,m.idannonce,m.moyenne as moyenne from max_moyenne m where m.moyenne=(select max(moyenne) from max_moyenne) and m.idannonce= ? ',[$idannonce]);
        return $max;

    }


    
    // Liste des embauches
    public function liste_embauche(){
       
        $count_entretien=$this->count_entretien(request('idannonce'));
        $max=$this->max_moyenne_entretien(request('idannonce'));
        if($count_entretien->count==0){}
        elseif($count_entretien->count>=5)
        {
            
            foreach($max as $rows)
            {
                $idannonce=$rows->idannonce;
                $idcandidat=$rows->idcandidat;
                \DB::insert('INSERT INTO EMBAUCHE(idannonce,idcandidat) values(:idannonce,:idcandidat)',[$idannonce,$idcandidat]);
                
            }
        }
        $liste =\DB::select('select c.nom,c.prenom,e.* from embauche e join candidat c using(idcandidat) where e.idannonce= ?',[request('idannonce')]);
        return view('liste_embauche',[
            'liste_embauche' => $liste,
            'idannonce' => request('idannonce'),
            'max'=>$max,
        ]);

    } 
    //retour liste embauche 
    public function retour_listeembauche()
    {
        return app('\App\Http\Controllers\CandidatController')->liste_embauche();
    }
 
    // Attribuer poste
    public function a_poste(){
        $liste =$this->desc_candidat(request('idcandidat'),request('idannonce'));
        $liste_poste =$this->liste_poste();
        $liste_categorie =$this->liste_categorie();
        $liste_departement =$this->liste_departement();
        $liste_personnel=$this->liste_personnel();
        $descri_employe=$this->descri_employe(request('idcandidat'));
        $descri_employe_cnaps = $this->descri_employe_cnaps(request('idcandidat'));


        return view('insert_employe',[
            'descri_candidat' => $liste,
            'liste_poste'=>$liste_poste,
            'liste_categorie'=>$liste_categorie,
            'liste_departement'=>$liste_departement,
            'liste_personnel'=>$liste_personnel,
            'liste_subordonnee'=>$liste_personnel,
            'descri_employe'=>$descri_employe,
            'descri_employe_cnaps'=>$descri_employe_cnaps,
            'idannonce' => request('idannonce'),
        ]);

    }
    
    // liste_poste
    public function liste_poste(){
        $liste =\DB::select('select * from poste');
        return $liste;
    }
    // liste_categorie
    public function liste_categorie(){
        $liste =\DB::select('select * from categorie');
        return $liste;
    }

    // liste_departement
    public function liste_departement(){
        $liste =\DB::select('select * from departement');
        return $liste;
    }

    // liste personnel
    public function liste_personnel(){
        $liste =\DB::select('select * from personnel');
        return $liste;
    }

        // Compter employe
    public function count_employe($idcandidat){
        $count =collect(\DB::select('select count(*) as count from employe where  idcandidat= ? ',[$idcandidat]))->first();
            return $count;
    
    }

    // Inserer employe
    public function insert_employe(){
        $count=$this->count_employe(request('idcandidat'));

        if($count->count==0){
        \DB::insert('insert into Employe(idcandidat,horaire_travail,idposte,idcategorie,iddepartement,chef,sub,debut_service) values(:idcandidat,:horaire_travail,:idposte,:idcategorie,:iddepartement,:chef,:sub,:debut_service)',[request('idcandidat'),request('horaire_travail'),request('idposte'),request('idcategorie'),request('iddepartement'),request('idchef'),request('idsub'),request('service')]);
        return app('\App\Http\Controllers\CandidatController')->a_poste();
        }
        else{
            return app('\App\Http\Controllers\CandidatController')->a_poste();
        }

    }

    // Contrat de travail
    public function contrat_travail(){
        return view('contrat',[
            'idcandidat' => request('idcandidat'),
            'idannonce' => request('idannonce'),
            'idemploye' => request('idemploye'),
            'contrat'=>request('contrat'),
        ]);
    }

    // Description superieure/subordonnee

    public function descri_personel($id){
        $descri_personel =\DB::select('select * from personnel where idpers= ?',[$id]);
        return $descri_personel;
    }

    
    // Reotur liste_embauche
    public function retour_a_poste(){
        return app('\App\Http\Controllers\CandidatController')->a_poste();
    }

    // Liste employe
    public function descri_employe($idcandidat){
        $descri_employe =\DB::select(' select c.*,e.* from employe e  join candidat c using(idcandidat) where c.idcandidat = ? ',[$idcandidat]);
        return $descri_employe;
    }


    // Inserer contrat CDI
        public function insert_CDI(){
            $idemploye=request('idemploye');
            \DB::insert('INSERT INTO CDI(idemploye,datedebut,datelimite,datefin) VALUES(?,?,?,?)',[request('idemploye')]);
            return view('contrat');
        }

    // Inserer contrat CDD
    public function insert_CDD(){
        $idemploye=request('idemploye');
        \DB::insert('insert into CDD(idemploye,datedebut,datelimite,datefin) VALUES(?,?,?,?)',[$idemploye,request('datedeb'),request('datelimite'),request('datefin')]);
        return app('\App\Http\Controllers\CandidatController')->a_poste();

    }
    // Inserer contrat CE
    public function insert_CE(){
        $idemploye=request('idemploye');
        \DB::insert('insert into Contrat_essai(idemploye,datedebut,datelimite,datefin) VALUES(?,?,?,?)',[request('idemploye'),request('datedeb'),request('datelimite'),request('datefin')]);
        return app('\App\Http\Controllers\CandidatController')->a_poste();
    }
    
    // Count Contrat essai
    public function count_ce($idemploye){
        $count =collect(\DB::select('select count(*) as count from contrat_essai where  idemploye= ? ',[$idemploye]))->first();
            return $count;
    
    }
        // Count CDD
    public function count_cdd($idemploye){
        $count =collect(\DB::select('select count(*) as count from cdd where  idemploye= ? ',[$idemploye]))->first();
            return $count;
    
    }
        // Count CDI
    public function count_cdi($idemploye){
        $count =collect(\DB::select('select count(*) as count from cdi where  idemploye= ? ',[$idemploye]))->first();
            return $count;
    
    }
    // Count CNaPS
    public function count_cnaps($idemploye){
        $count =collect(\DB::select('select count(*) as count from cnaps where  idemploye= ? ',[$idemploye]))->first();
            return $count;
    
    }

    // Alefa CNaPS
    public function alefa_cnaps(){
        $idemploye=request('idemploye');
        \DB::insert(' insert into cnaps(idemploye,dateembauche) VALUES(?,?)',[request('idemploye'),request('dateembauche')]);
        return app('\App\Http\Controllers\CandidatController')->a_poste();

    }

    public function descri_employe_cnaps($idcandidat){
        $descri_employe =\DB::select(' select c.*,e.*,(select count(idemploye) from cnaps where idemploye=e.idemploye) as isa from employe e full join candidat c using(idcandidat) where c.idcandidat  in (select(idcandidat) from employe)');
        return $descri_employe;
    }

    public function org1()
    {
        return view('Organigramme');
    }

    public function org2()
    {
        return view('Organigramme1');
    }
    public function org3()
    {
        return  view('Organigramme2');
    }

        // Alefa CNaPS
    public function insert_SME(){
            $idemploye=request('idemploye');
            \DB::insert(' insert into salaire(idemploye,sme) VALUES(?,?)',[request('idemploye'),request('sme')]);
            return app('\App\Http\Controllers\CandidatController')->a_poste();
    
    }
}
