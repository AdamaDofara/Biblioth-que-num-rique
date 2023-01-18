@extends('layouts.app1')
@section('title')
    Accueil Bibliothèque
@endsection
@section('contenu')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/LIVRE.jpg')}}');">
 <div class="container">
   <div class="row no-gutters slider-text align-items-center justify-content-center">
     <div class="col-md-9 ftco-animate text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Bibliothèque</span></p>
       <h1 class="mb-0 bread">Bibliotheque</h1>
     </div>
   </div>
 </div>
</div>

<section class="ftco-section">
   <div class="container">

       <div class="row justify-content-center">
           <div class="col-md-10 mb-5 text-center">
               <ul class="product-category">
                   <li><a href="{{URL::to('/')}}" class="{{(request()->is('/')?'active':'' )}}">All</a></li>
                   {{-- @foreach ($categories as $categorie)
                     <li><a href="/selectionner_par_categorie/{{$categorie->category_name}}" class="{{(request()->is('selectionner_par_categorie/'.$categorie->category_name)?'active':'' )}}">{{$categorie->category_name}}</a></li>
                   @endforeach --}}
                   @foreach ($categories as $categorie)
                   <li><a href="/selection_par_categorie/{{$categorie->id}}" class="{{(request()->is('selection_par_categorie/'.$categorie->id)?'active':'' )}}">{{$categorie->categorie}}</a></li>
                   {{-- <li><a href="selection_par_categorie/{{$categorie->categorie}}" class="{{(request()->is('selectionner_par_categorie/'.$categorie->categorie)?'active':'')}}">{{$categorie->categorie}}</a></li> --}}
                   @endforeach
               </ul>
           </div>
       </div>
       <div class="row">
        {{-- <div class="col-md-6 col-lg-3 ftco-animate"> --}}
        {{-- <div class="card" style="width: 18rem;">
          <div class="product">
          <img class="img-prod" height="150px"  src="data:image/png;base64,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" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <button type="button" class="btn btn-primary">View</button>
                  <button type="button" class="btn btn-primary">Edit</button>
          </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="card" style="width: 18rem;">
          <div class="product">
          <img class="img-prod" height="100px" src="data:image/png;base64,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" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <button type="button" class="btn btn-primary">View</button>
                  <button type="button" class="btn btn-primary">Edit</button>
          </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="card" style="width: 18rem;">
          <div class="product">
          <img class="img-prod" src="data:image/png;base64,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" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <button type="button" class="btn btn-primary">View</button>
                  <button type="button" class="btn btn-primary">Edit</button>
          </div>
        </div>
        </div> --}}

       @foreach ($ouvrages as $ouvrage)
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product" >
                <a href="#" class="img-prod" style=""><img class="img-fluid" src="{{asset('storage/image_files/'.$ouvrage->photo)}}" alt="Colorlib Template" style="width:100%; height: 300px">
                    {{-- <span class="status">30%</span> --}}
                    <div class="overlay" ></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  {{-- <div class="card">
                  <div class="card-body"> --}}
                    {{-- 1200*1200 --}}
                    <p style="" >{{substr($ouvrage->description,0, 30)}}...</p>
                  {{-- </div>
                  </div> --}}
                    {{-- <div class="d-flex">
                        <div class="pricing">
                            <p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">$10</span></p>
                        </div>
                    </div> --}}
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="/details/{{$ouvrage->id}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-eye"></i></span>
                            </a>
                            @if (Session::get('user'))
                                <a href="/lire_ouvrage/{{$ouvrage->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                <span><i class="ion-ios-book"></i></span>
                            </a>
                            @endif
                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                <span><i class="ion-ios-heart"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       @endforeach
       </div>
       <div class="row mt-5">
     <div class="col text-center">
       <div class="block-27">
         <ul>
           <li >{!! $ouvrages->links('pagination::bootstrap-4')!!}</li>
         </ul>
       </div>
     </div>
   </div>
   </div>
</section>
@endsection


 