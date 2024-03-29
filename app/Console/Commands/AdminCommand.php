<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Categorie;
use App\Models\Ouvrage;
use App\Models\Emprunt;
use App\Models\User;
use App\Models\Role;
class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:bd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configuration de base du projet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   

        $role = new Role();
        $role->role = "ABONNE";
        $$role->save();
        $role1 = new Role();
        $role1->role = "AUTEUR";
        $$role1->save();
        $role2 = new Role();
        $role2->role = "ADMIN";
        $$role2->save();
        
        $user = new User();
        $user->email = "admin1@gmail.com";
        $user->pseudo = "admin1";
        $user->mot_de_passe  = bcrypt("admin");
        $user->nom = "admin";
        $user->prenom = "admin";
        $user->nationalite = "null";
        $user->numero_telephone = "null";
        $user->sexe =" null";
        $user->role_id = $role2->id;

        $user->save();
        echo"successfully executed";
    }
}

?>