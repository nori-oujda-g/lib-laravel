<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// class Customer extends Model
class Customer extends Authenticatable
{
    use HasFactory; // Utilisation du trait
    protected $table = 'customers';
    protected $fillable = [
        'name',
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
