<?php

namespace app;
use Illuminate\Database\Eloquent\Model;


class Message extends Model  
{
  
   protected $fillable = ['id_user' , 'texte']  ;
  
}
