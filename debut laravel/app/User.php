<?php

namespace app;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ; //pour authentifier ma classe

use Illuminate\Auth\Authenticatable as Functable ;    //pour mettre les 6 fonctions abstraites


class User extends Model 
{
  
    public function affiche_texte()
    {
        return 'hello world';
    }

}
  
