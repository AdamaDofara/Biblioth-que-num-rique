<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Ouvrage;
use App\Models\Role;
use App\Models\User;
use App\Models\Emprunt;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class AdminController extends Controller
{
    public function utilisateur_form(){
        $specialites = Specialite::All()->pluck('specialite', 'id');
        $categories = Categorie::All()->pluck('categorie', 'id');
        $roles = Role::All()->pluck('role', 'id');
        return view('admin.ajouterutilisateur',[
            'categories'=>$categories,
            'specialites'=>$specialites,
            'roles'=>$roles
        ]);
    }

    public function specialite_form(){
        return view('admin.ajouterspecialite');
    }
    public function sauver_specialite(Request $request){
        $this->validate($request,[
            'specialite'=>[ 'required', 'unique:specialites'],
        ]);
        $specialite = new Specialite();
        $specialite->specialite = $request->specialite;
        $specialite->save();
        return redirect('ajouter_specialite')->with('status', "La specialite ".$specialite->specialite.' a été inséré avec succès');
    }

    public function getSpecialites(){
        $specialites = Specialite::get();
        return view('admin.specialites', ['specialites'=>$specialites]);
    }
    public function categorie_form(){
        return view('admin.ajoutercategorie');
    }

    public function sauver_categorie(Request $request){
        $this->validate($request,[
            'categorie'=>[ 'required', 'unique:categories'],
        ]);
        $categorie = new Categorie();
        $categorie->categorie = $request->categorie;
        $categorie->save();
        return redirect('ajouter_categorie')->with('status', "La categorie ".$categorie->categorie.' a été inséré avec succès');
    }

    public function getCategories(){
        $categories = Categorie::get();
        return view('admin.categories', ['categories'=>$categories]);
    }
    public function ouvrage_form(){
        $specialites = Specialite::All()->pluck('specialite', 'id');
        $categories = Categorie::All()->pluck('categorie', 'id');
        $auteurs = User::All()->pluck('nom', 'id');
        return view('admin.ajouterouvrage',[
            'categories'=>$categories,
            'specialites'=>$specialites,
            'auteurs'=>$auteurs
        ]);
    }

    public function sauver_ouvrage(Request $request){

        $this->validate($request,[
            'titre'=>[ 'required', 'unique:ouvrages'],
            'description'=>['required'],
            'photo'=>['required','image','max:1999'],
            'livre_pdf'=>['required','mimes:pdf'],
            'quantite'=>['required', 'numeric',]
        ]);
            if (Session::has('user')){
            // Le nom du fichier avec extension
            $fileNameExtension = $request->file('photo')->getClientOriginalName();
            //L'extension du fichier uniquement
            $extension =  $request->photo->getClientOriginalExtension();
            //Le nom du fichier uniquement
            $fileName = explode('.'.$extension, $fileNameExtension);
            // le fichier à enregistrer 
            $fileEnregistrer = $fileName[0].'_'.time().'.'.$extension;
 
            $pathImage = $request->photo->storeAs('public/image_files', $fileEnregistrer);

            $nomCompletFichierPdf = $request->file('livre_pdf')->getClientOriginalName();
            //L'extension du fichier uniquement
            $extensionPdf =  $request->livre_pdf->getClientOriginalExtension();
            //Le nom du fichier uniquement
            $pdfFile = explode('.'.$extensionPdf, $nomCompletFichierPdf);
            // le fichier à enregistrer 
            $pdfEnregistrer = $pdfFile[0].'_'.time().'.'.$extensionPdf;

            $pathPDf = $request->livre_pdf->storeAs('public/pdf_files', $pdfEnregistrer);

            //Resize image here
	        // $thumbnailpath = public_path('storage/image_files/'.$fileEnregistrer);
	        // $img = Image::make($thumbnailpath)->fit(253, 150);
	        // $img->save($thumbnailpath);
            
            $ouvrage = new Ouvrage();
            $ouvrage->titre = $request->titre;
            $ouvrage->description = $request->description;
            $ouvrage->photo = $fileEnregistrer;
            $ouvrage->livre_pdf = $pdfEnregistrer;
            $ouvrage->quantite = $request->quantite;
            $ouvrage->categorie_id = $request->categorie;
            $ouvrage->specialite_id = $request->specialite;
            $ouvrage->statut = 1;
            if (Session::get('user') == "ADMIN") {
                $ouvrage->user_id = $request->auteur;
            } else {
                $ouvrage->user_id = Session::get('user')->id;
            }
            
            
            $ouvrage->save();

            return redirect('ajouter_ouvrage')->with('status', "L'ouvrage ".$ouvrage->titre.' a été inséré avec succès');
            //print $request->titre.' '.$request->description.' '.$fileEnregistrer.' '.$pdfEnregistrer.' '.$request->quantite.' '.$request->categorie.' '.$request->specialite;
            }
 
    }

    public function sauver_utilisateur(Request $req){
        $this->validate($req,[
            'email'=>['email', 'required', 'unique:users'],
            'mot_de_passe'=>['required','min:4', 'unique:users'],
            'password_confirmation'=>['required','same:mot_de_passe'],
            'pseudo'=>['required'],
            'nom'=>['required'],
            'prenom'=>['required'],
            'numero_telephone'=>['required'],
            'pseudo'=>['required', 'unique:users'],
            'numero_telephone'=>['required'],
            'sexe'=>['required'],
            'nationalite'=>['required'],
        ]);
        $user = new User();
        $user->email = $req->email;
        $user->pseudo = $req->pseudo;
        $user->mot_de_passe  = $req->mot_de_passe;
        $user->nom = $req->nom;
        $user->prenom = $req->prenom;
        $user->nationalite = $req->nationalite;
        $user->numero_telephone = $req->numero_telephone;
        $user->sexe = $req->sexe;
        $user->role_id = $req->role;
    
        $user->save();

        return redirect('ajouter_utilisateur')->with('status', "L'utilisateur ".$user->nom.' a été inséré avec succès');
    }

    public function getOuvrages(){
        $ouvrages = Ouvrage::all();
        return view('admin.ouvrages', ['ouvrages'=>$ouvrages]);
    }

    public function getAbonne(){
        $abonnes = User::get();
        return view('admin.abonnes', ['abonnes'=>$abonnes]);
    }

    public function getAuteur(){
        $auteurs = User::get();
        return view('admin.auteurs', ['auteurs'=>$auteurs]);
    }

   


    public function selectionner_par_catégorie($id){
        $categories = Categorie::get();
        $cat =Categorie::find($id);
        // $categories = Categorie::get();
        $ouvrages = Categorie::find($cat->id);
        //dd($ouvrages);
        // $produits_par_categorie = Produit::where('product_category', $name)->where('status', 1)->get();
        return View('accueil')->with(['ouvrages'=>$ouvrages->ouvrages()->paginate(4), 'categories'=>$categories]);
    }


    public function Bloquer_abonne($id){
        $emprunt = Emprunt::find($id);
        $emprunt->statut = "Terminé";
        $emprunt->update();
        $ouvrage = Ouvrage::find($emprunt->ouvrage_id);
        $ouvrage->quantite = $ouvrage->quantite + 1;
        $ouvrage->update();
        $user = User::find($emprunt->user_id);
        $user->statut = 0;
        $user->update();
        return back()->with('status', "Abonne"." ".$user->last_name.' '.$user->first_name." avec succès");
    }

    public function Activer_compte($id){
        $user =  User::find($id);
        $user->statut = 1;
        $user->update();
        return back()->with('status','Compte de '.$user->nom.' '.$user->prenom.' activé avec succès');
    }

    public function Bloquer_compte($id){
        $user =  User::find($id);
        $user->statut = 0;
        $user->update();
        return back()->with('status','Compte de '.$user->nom.' '.$user->prenom.' bloqué avec succès');
    }

    public function Supprimer_compte($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('status','Compte de '.$user->nom.' '.$user->prenom.' supprimeé avec succès');
    }
}
