<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory; // Utilisation du trait
    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
    ];
    // laravel est très securisé il vas enpêcher de faire un ajout par post et $fillable vas faire une exception pour ces valeur ajoutés .


    // public function getRouteKeyname(): string
    // {
    //     // pour spécifier le param url , par defaut c'est : id
    //     return 'email';
    // }
}
