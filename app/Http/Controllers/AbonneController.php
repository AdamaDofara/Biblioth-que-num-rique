<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Ouvrage;
use App\Models\Emprunt;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;
use Carbon\Carbon;
use Response;
class AbonneController extends Controller
{

    public function Accueil(){
        $categories = Categorie::get();
        $ouvrages = Ouvrage::paginate(4);
        // return view ('accueil', ['categories',$categories]);
        return view('accueil', ['categories'=>$categories, 'ouvrages'=>$ouvrages]);
}

public function inscription(Request $request){
    $roles = Role::all();
    return view('inscription_utilisateur', ['roles'=>$roles]);
}

public function creer_utilisateur(Request $req){
    $this->validate($req,[
        'email'=>['email', 'required', 'unique:users'],
        'nom'=>['required'],
        'prenom'=>['required'],
        'mot_de_passe'=>['required','min:4', 'unique:users'],
        'password_confirmation'=>['required','same:mot_de_passe'],
        'pseudo'=>['required']
    ]);
    $user = new User();
    $user->email = $req->email;
    $user->pseudo = $req->pseudo;
    $user->mot_de_passe  = bcrypt($req->mot_de_passe);
    $user->nom = $req->nom;
    $user->prenom = $req->prenom;
    $user->nationalite = "null";
    $user->numero_telephone = "null";
    $user->sexe =" null";
    $user->role_id = $req->role_id;

    $user->save();

    return redirect('authentification');

}

public function connexion(){
    return view('connexion_utilisateur');
}

public function authentification(Request $req){
    $this->validate($req,[
        'email'=>['email', 'required'],
        'mot_de_passe'=>['required','min:4']]);
        $user = User::where('email', $req->email)->first();
        if ($user) {
            if (Hash::check($req->mot_de_passe, $user->mot_de_passe)) {
             if ($user->statut==1) {
                Session::put('user', $user);
                return redirect('/');
             } else {
                return back()->with('status', "Votre compte a été bloqué, contacté l'administrateur");
             }
             
            } else {
             return back()->with('status', 'Mauvais mot de passe ou email.');
            }
            
         }
         else{
             return back()->with('status','Vous n'."'".'avez pas de compte.');
         }
}

public function Dashboard(){
    if(session::has('user')){
        $user = session::get('user');
        // if (session::get('user')->role->role == "ADMIN"){
        //     $user = session::get('user');
        //     return view('adminDashboard', ['user'=>$user]);
        // }
        // elseif(session::get('user')->role->role == "AUTEUR"){
        //     $user = session::get('user');
        //     return view('auteurDashboard',  ['user'=>$user]);
        // }
        // else{
        //     $user = session::get('user');
        //     return view('abonneDashboard', ['user'=>$user]);
        // }

        return view('adminDashboard', ['user'=>$user]);
    }
    else{
        return redirect('/authentification');
    }
} 


public function deconnexion(){
    Session::forget('user');
    return redirect('/');
    //return back();
}

public function detail_livre($id){
    $livre = Ouvrage::where('id',$id)->get();
    // dd($livre);
   // $auteur = User::find($livre->user);
    return view('details')->with('livre',$livre);
}

public function lecture_ouvrage($id){
    $livre = Ouvrage::find($id);
    return Response::make(file_get_contents('storage/pdf_files/'.$livre->livre_pdf), 200, ['content-type'=>'application/pdf']);
}

public function getEmprunt(){
    if (Session::get('user')->role->role=="ADMIN") {
        $emprunts = Emprunt::get();
        return view('abonne.emprunts', ['emprunts'=>$emprunts]);
    } else {
        $emprunts = User::find(Session::get('user')->id)->emprunts;
        return view('abonne.emprunts', ['emprunts'=>$emprunts]);
    }
    
    
}

public function sauver_emprunt(Request $req){
    $this->validate($req,[
        'date_retour'=>[ 'required']
    ]);
    $ouvrage = Ouvrage::find($req->ouvrage_id);
    $dateRetour = $req->date_retour;
    $dateRetour = Carbon::create($dateRetour);
    $today = Carbon::now()->format('ymd');
    if ($ouvrage->quantite != 0) {

        // return $dateRetour->diffInDays($today);

        if ($dateRetour->diffInDays($today) <= 7) {
            $emprunt = new Emprunt();
            $emprunt->date_retour = $req->date_retour;
            $user = Session::get('user');
            $emprunt->user_id = $user->id;
            $emprunt->ouvrage_id = $req->ouvrage_id;
            $ouvrage->quantite = $ouvrage->quantite-1;
            $ouvrage->update();
            $emprunt->save();
        } else {
            
            return back()->with('error', "L'ouvrage ne peut etre emprunter pour plus de 7 jours.");
        }

    } else {
        # code...
        return back()->with('error', "L'ouvrage n'existe plus en stock");
    }
    
    
    // modification de la quantite du livre emprunté
   
   
    return back()->with('status', "L'emprunt du livre éffectué avec succès Rendez-vous sur votre tableau de bord pour le coonsulter");
   
}

public function ramener_ouvrage($id){
    $emprunt = Emprunt::find($id);
    $emprunt->statut = "Terminé";
    $emprunt->update();
    $ouvrage = Ouvrage::find($emprunt->ouvrage_id);
    $ouvrage->quantite = $ouvrage->quantite + 1;
    $ouvrage->update();
    return back()->with('status', "L'ouvrage ". $ouvrage->titre." a été ramené à la bibliothèque");
}

public function getEmpruntEncours(){
    if (Session::get('user')->role->role=="ADMIN") {
        $emprunts = Emprunt::where('statut',"En cours")->get();
        return view('abonne.empruntsEncours', ['emprunts'=>$emprunts]);
    } else {

        $emprunts = Emprunt::where('statut',"En cours")->where('user_id',Session::get('user')->id)->get();
        return view('abonne.empruntsEncours', ['emprunts'=>$emprunts]);
    }
    
    
}

public function getEmpruntTermine(){
    if (Session::get('user')->role->role=="ADMIN") {
        $emprunts = Emprunt::where('statut', "Termine")->get();
        return view('abonne.empruntsTermine', ['emprunts'=>$emprunts]);
    } else {
        $emprunts = Emprunt::where('statut',"Termine")->where('user_id',Session::get('user')->id)->get();
        return view('abonne.empruntsEncours', ['emprunts'=>$emprunts]);
    }
    
    
}
}

