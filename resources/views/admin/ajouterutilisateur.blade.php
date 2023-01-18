@extends('layouts.appadmin')
@section('title')
    Ajouter utilisateur
@endsection
@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter utilisateur</h4>
                  @if (Session::has('status'))
                    <div class ="alert alert-success">
                      {{Session::get('status')}}
                      {{Session::put('status', null)}}
                    </div>
                  @endif
                  @if (count($errors)>0)
                    <ul class="alert alert-danger">
                     @foreach ($errors->all() as $error)
                         <li>{{$error}}</li>
                     @endforeach
                    </ul>
                  @endif
                      {!! Form::open(['action'=>'App\Http\Controllers\AdminController@sauver_utilisateur', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                      {{ csrf_field() }}
                       <div class="row">
                          <div class="col">
                            {!! Form::label('', 'Nom', ['for'=>'cname']) !!}
                            {!! Form::text('nom', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                          <div class="col"> 
                            {!! Form::label('', 'Prenom', ['for'=>'cname']) !!}
                            {!! Form::text('prenom', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col">
                            {!! Form::label('', 'Email', ['for'=>'cname']) !!}
                            {!! Form::email('email', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                          <div class="col"> 
                            {!! Form::label('', 'Numero telephone', ['for'=>'cname']) !!}
                            {!! Form::text('numero_telephone', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col">
                            {!! Form::label('', 'Pseudo', ['for'=>'cname']) !!}
                            {!! Form::text('pseudo', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                          <div class="col"> 
                            {!! Form::label('', 'Mot de passe', ['for'=>'cname']) !!}
                            {!! Form::password('mot_de_passe', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                          <div class="col"> 
                            {!! Form::label('', 'Confirmation mot de passe', ['for'=>'cname']) !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col">
                            {!! Form::label('', 'Genre', ['for'=>'cname']) !!}
                            {!! Form::text('sexe', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                          <div class="col"> 
                            {!! Form::label('', 'Nationnalite', ['for'=>'cname']) !!}
                            {!! Form::text('nationalite', '', ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                      </div>
                  
                       {{-- <div class="form-group"> 
                        {!! Form::label('', 'Photo de couverture 1200*1200', ['for'=>'cname']) !!}
                        {!! Form::file('photo',  ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                     <div class="form-group"> 
                        {!! Form::label('', "Version pdf de l'ouvrage", ['for'=>'cname']) !!}
                        {!! Form::file('livre_pdf', ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                       <div class="form-group">
                        {!! Form::label('', 'Categorie ouvrage', ['for'=>'cname']) !!}
                        {!! Form::select('categorie', $categories,null, ['placeholder'=>'selectionner catégorie', 'class'=>'form-control']) !!}
                      </div> --}}
                     <div class="form-group">
                        {!! Form::label('', 'Role', ['for'=>'cname']) !!}
                        {!! Form::select('role', $roles, null, ['placeholder'=>'selectionner un role', 'class'=>'form-control']) !!}
                      </div> 
                        {{-- <div class="form-group">
                        {!! Form::label('', 'Image du produit', ['for'=>'cname']) !!}
                        {!! Form::file('product_image', ['class'=>'form-control','id'=>'cname']) !!}
                      </div>  --}}
                      {!! Form::submit('ajouter', ['class'=>'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
    {{-- <script src="backend/js/form-validation.js"></script> --}}
    <script src="backend/js/bt-maxLength.js"></script>
    <!-- End custom js for this page-->
@endsection