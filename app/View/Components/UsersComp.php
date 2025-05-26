<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;
class UsersComp extends Component
{
    public $nom;
    public $users;
    public function __construct()
    {
        $this->nom = 'ahmed';
        $this->users = [
            ['id' => 1, 'name' => 'amine', 'email' => 'amin@gmail.com', 'job' => 'builder'],
            ['id' => 2, 'name' => 'yassin', 'email' => 'yassin@yahoo.com', 'job' => 'developper'],
            ['id' => 3, 'name' => 'ali', 'email' => 'ali@gmail.com', 'job' => 'engenner'],
        ];

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.users-comp');
    }
}
