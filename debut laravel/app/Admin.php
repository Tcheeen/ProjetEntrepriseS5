<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ; //pour authentifier ma classe
use Illuminate\Auth\Authenticatable as Functable ;    //pour mettre les 6 fonctions abstraites
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class Admin extends Model
{

    public static function listeCandidat()
    {
        $liste = DB::select('select *from Candidat where idannonce is null and idcandidat  not in (select idcandidat from employe)');
        return $liste;
    }

    public static function postulerCandidat($idannonce,$idcandidat)
    {
     return DB::update('update Candidat set idannonce = ?  where idcandidat = ?',[$idannonce,$idcandidat]);
    }

}
