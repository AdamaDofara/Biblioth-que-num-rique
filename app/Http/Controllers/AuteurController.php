<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Session; 

class AuteurController extends Controller
{
    public function getOuvrages(){
        // return User::find(Session::get('user')['id']);
        $ouvrages = User::find(Session::get('user')['id'])->ouvrages;
        return view('auteur.ouvrages', ['ouvrages'=>$ouvrages]);
    }
}
