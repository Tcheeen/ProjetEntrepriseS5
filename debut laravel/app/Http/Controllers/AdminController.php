<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Admin; 
class AdminController extends Controller
{

    const TABLE_Admin = 'Admin';


    public function index()
    {
        return view('Admin_index');
    }

    public function getListEntretien($idannonce)
    {
        $liste = \DB::select('select c.idcandidat,c.nom as nom,c.prenom as prenom,t.note as note,(select count(*) from entretien where idcandidat=c.idcandidat) as entretien from test t join candidat c using(idcandidat) where t.idannonce =? order by t.note desc limit 14',[$idannonce]);
        return $liste;
    }

    public function getListAnnonce()
    {
          $liste = \DB::select('select * from Annonce');
          return $liste;
    }

    public function getListCandidatEntretien($idannonce)
    {
        $liste = \DB::select('select * from Test where idannonce = ? order by note desc limit 2',[$idannonce]);
        return $liste;
    }

    public function if_is_empty($idannonce,$idcandidat)
    {
        $count = collect(\DB::select('select count(*) as isa from Test where idannonce = ? and idcandidat= ? ',[$idannonce,$idcandidat]))->first();
        return $count;
    }

    public function getListCandidat($idannonce)
    {
        $liste = \DB::select("select c.idcandidat,c.nom,c.prenom,c.note,(select count(*) from test t where t.idcandidat=c.idcandidat)as email_envoye from candidat c where c.idannonce=? and note!=0  order by note desc limit 50",[$idannonce]);
        return $liste;
    }

    public function getListeembauche($idannonce)
    {
        $liste = \DB::select('select c.idcandidat,c.nom,c.prenom,e.note from candidat c join entretien e using(idcandidat) where c.idannonce=? order by note desc limit 10',[$idannonce]);
        return $liste;
    }

    public function heure_passage($idannonce)
    {
        $liste = \DB::select('select c.idcandidat,c.nom,c.prenom,t.heure_test,t.* from candidat c join test t using(idcandidat)  where c.idannonce= ? ',[$idannonce]);
        return $liste;
    }

    public function log_admin(Request $request)
    {
        $login = collect(\DB::select('select count(*) as isa from Admin where email = ? and mdp = ? ', [request('mail'),request('mdp')]))->first();
        $idsociete = collect(\DB::select('select idsociete from Admin where email = ? and mdp = ? ', [request('mail'),request('mdp')]))->first();
        

        $request->session()->put('idsociete',$idsociete->idsociete);


        if($login->isa == 0)
        {
            return view('Admin_index',[
                'erreur' => 'Email ou mot de passe errone',
                    ]);
        }
        else 
        {
            return view('Acc_admin',[
                 'liste' => $this->getListAnnonce(),
                 'idsociete' => $request,
                     ]);
        }
    }

    public function ajouter_candidat()
    {
        $fin = request('fin');
        $pub = request('pub');
        \DB::insert('insert into Annonce(pub,datefin) values (:pub,:datefin)',[$pub,$fin]);

      return view('Acc_admin',[
        'liste' => $this->getListAnnonce(),
            ]);
    }


    public function getTotalDurree($idannonce)
    {
        
    $totale = collect(\DB::select('select datefin as difference from annonce where idannonce= ?', [$idannonce]))->first();
    return $totale->difference;
    }

    public function if_post($idannonce)
    {
        $date = Carbon::now();
        if($this->getTotalDurree($idannonce)>$date)
        {
            return True;
        }
        else{
            return false;
        }
    }


    public function voirDossier()
    {
        $if_post = $this->if_post(request('idannonce'));
        if($if_post == true)
        {
            $non_fini = 1;
        }
        else {
            $non_fini = 0;
        }
        $listeCandidatGeneral = Admin::listeCandidat();
        $liste_candidat = $this->getListCandidat(request('idannonce'));
        $liste_entretien = $this->getListEntretien(request('idannonce'));
        $descri_annonce = $this->date_debut_fin(request('idannonce'));
        $heure_passage=$this->heure_passage(request('idannonce'));
        $liste_embauche=$this->getListeembauche(request('idannonce'));
        $moyenne=$this->moyenne(request('idannonce'));

        return view('candidat_view' , [
            'ida' => request('idannonce'),
            'listeCandidatGeneral' => $listeCandidatGeneral,
            'if_posted' => $non_fini,
            'liste_candidat' => $liste_candidat,
            'liste_entretien' => $liste_entretien,
            'descri_annonce'=>$descri_annonce,
            'heure_passage'=>$heure_passage,
            'liste_embauche'=>$liste_embauche,
            'moyenne'=>$moyenne,
            'diff' =>  $this->getTotalDurree(request('idannonce')),
            'date' => now(),
            'idannonce' => request('idannonce'),
        ] );
    }

    // Date debut et date fin
    public function date_debut_fin($idannonce){
        $liste = \DB::select('select * from annonce  where idannonce = ? ',[$idannonce]);
        return $liste;
    }

    //Mampiditra note sy heure de passage ho'any ny test
    public function eval_test()
    {
        $liste = \DB::select('select * from questionnaire where idannonce = ? and idcandidat = ?',[request('idannonce'),request('idcandidat')]);
        $liste_inscrit = $this->getListCandidat(request('idannonce'));
        $count =$this->if_is_empty(request('idannonce'),request('idcandidat'));
        $duree=15;
        if($count->isa == 0)
        {
                //foreach($liste_inscrit as $rows)
                //{
                    \DB::insert('INSERT INTO Test(idannonce,idcandidat,date_test,heure_test,jour_test,minute_test,note) values (?,?,passage_date_test(?,8,12),passage_test(?),passage_jour_test(?,8,12),12,0)',[request('idannonce'),request('idcandidat'),request('idannonce'),request('idannonce'),request('idannonce')]);
                // }
        }      
        return app('\App\Http\Controllers\AdminController')->voirDossier();
    }

    // Reponse test
    public function corriger_test()
    {
        $liste = \DB::select('select * from questionnaire where idannonce = ? and idcandidat = ?',[request('idannonce'),request('idcandidat')]);
      
        return view('eval_test',[
            'liste_quest' => $liste,
            'idcandidat'=> request('idcandidat'),
            'idannonce'=> request('idannonce'),
                ]);
    }



    // Condition si le candidat a deja recu un email
    public function si_email_recu(){
        $count = collect(\DB::select('select count(*) from test where idcandidat= ? and idannonce= ? ',[request('idcandidat'),request('idannonce')]))->first();
        return $count;
    }

    public function eval_note_test()
    {
        $valeur = request('reponse');
        $vrai  = request('vrai');
        $faux = request('faux');
        $valeur = 0;
        $tab_vrai = array();
        $tab_faux = array();
        $valeur_faux = 0;
        $note_candidat = 0;

        if(isset($vrai))
        {
            foreach($vrai as $indice => $vrai_total)
            {
                array_push($tab_vrai,$vrai_total);
            }
        }
        for($i = 0; $i < count($tab_vrai); $i++)
        {
            $valeur = $valeur + $tab_vrai[$i];
        }

        if(isset($faux))
        {
            foreach($faux as $indice => $faux_total)
            {
                  array_push($tab_faux,$faux_total);
            }
        }

        for($i = 0; $i < count($tab_faux); $i++)
        {
             $valeur_faux = $valeur_faux + $tab_faux[$i];
        }

        $note_candidat = $valeur + $valeur_faux;

        \DB::update('update Test set note = ?  where idcandidat = ? and idannonce = ?',[$note_candidat,request('idcandidat'),request('idannonce')]);
        
        return app('\App\Http\Controllers\AdminController')->voirDossier();


    }

    // Bouton retour
    public function retour(){
        return app('\App\Http\Controllers\AdminController')->voirDossier();
    }

    // Bouton retour
        public function retour_annonce(){
                return view('Acc_admin',[
                'liste' => $this->getListAnnonce(),
                    ]);
        }
    
    // Statistiques moyenne
    public function moyenne($idannonce) {
        $liste = \DB::select('select avg(age) as age, avg(note) as note, avg(experience) as experience from candidat where idannonce=?',[$idannonce]);
        return $liste;
    }

    
    public function postuler()
    {
          Admin::postulerCandidat(request('idannonce'),request('idcandidat'));
          return app('\App\Http\Controllers\AdminController')->voirDossier();
    }

}
