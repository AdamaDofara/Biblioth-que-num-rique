
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="ti-home menu-icon"></i>
            <span class="menu-title">{{Session::get('user')->nom.' '.Session::get('user')->prenom}}</span>
          </a>
        </li>
        @if (Session::get('user')->role->role == "AUTEUR")
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="ti-clipboard menu-icon"></i>
            <span class="menu-title">Création</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouter_ouvrage')}}">Ajouter Ouvrage</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouterproduit')}}">Ajouter produit</a></li>
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouterslider')}}">Ajouter slider</a></li> --}}
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="ti-layout menu-icon"></i>
            <span class="menu-title">Affichages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/auteur_ouvrages')}}">Ouvrages</a></li>
              {{-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('/produits')}}">Produits</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/sliders')}}">Sliders</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/commandes')}}">Commandes </a></li> --}}
            </ul>
          </div>
        </li>
        @endif
        @if (Session::get('user')->role->role == "ADMIN")
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="ti-clipboard menu-icon"></i>
            <span class="menu-title">Création</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouter_ouvrage')}}">Ajouter ouvrage</a></li>
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouter_utilisateur')}}">Ajouter utilisateur</a></li>
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouter_categorie')}}">Ajouter categorie</a></li>
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouter_specialite')}}">Ajouter specialite</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouterslider')}}">Ajouter slider</a></li> --}}
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="ti-layout menu-icon"></i>
            <span class="menu-title">Affichages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/ouvrages')}}">Ouvrages</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/abonnes')}}">Abonnes</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/auteurs')}}">Auteurs</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts')}}">Emprunts </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts/Encours')}}">Emprunts en cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts/Termine')}}">Emprunts terminés</a></li> 
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/specialites')}}">Specialites </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categories')}}">Categories</a></li>
            </ul>
          </div>
        </li>
        @endif

        @if (Session::get('user')->role->role == "ABONNE")
        {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="ti-clipboard menu-icon"></i>
            <span class="menu-title">Création</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajoutercategorie')}}">Ajouter Catégorie</a></li>
            <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouterproduit')}}">Ajouter produit</a></li>
              <li class="nav-item"><a class="nav-link" href="{{URL::to('ajouterslider')}}">Ajouter slider</a></li>
            </ul>
          </div>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="ti-layout menu-icon"></i>
            <span class="menu-title">Affichages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts')}}">Emprunts</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts/Encours')}}">Emprunts en cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/emprunts/Termine')}}">Emprunts terminés</a></li> 
              {{-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('/commandes')}}">Commandes </a></li> --}}
            </ul>
          </div>
        </li>
        @endif
      </ul>
    </nav>
    <!-- partial -->

   