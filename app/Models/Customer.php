<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
// class Customer extends Model
class Customer extends Authenticatable
{
    use HasFactory; // Utilisation du trait
    use SoftDeletes; // pour archiver et faire une suppression vertuelle aulien d'une suppression physique
    // lors de la suppression d'un ligne la colonne : deleted_at sera remplie par la date de suppression , 
    // cette ligne sera inaxessible sans qu'elle soi supprimé de la database.
    protected $table = 'customers';
    // on met ici les attributs de type date .
    protected $dates = ['created_at'];
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'bio',
        'image',
        'password',
    ];
    // laravel est très securisé il vas enpêcher de faire un ajout par post et $fillable vas faire une exception pour ces valeur ajoutés .


    // public function getRouteKeyname(): string
    // {
    //     // pour spécifier le param url , par defaut c'est : id
    //     return 'email';
    // }
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
