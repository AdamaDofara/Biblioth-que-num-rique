@extends('layouts.appadmin')
@section('title')
    Ajouter Ouvrage
@endsection
@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter ouvrage</h4>
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
                      {!! Form::open(['action'=>'App\Http\Controllers\AdminController@sauver_ouvrage', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                      {{ csrf_field() }}
                       <div class="form-group">
                        {!! Form::label('', 'Titre', ['for'=>'cname']) !!}
                        {!! Form::text('titre', '', ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                      <div class="form-group"> 
                        {!! Form::label('', 'Description', ['for'=>'cname']) !!}
                        {!! Form::text('description', '', ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                        <div class="row"> 
                          <div class="col">
                            {!! Form::label('', 'Photo de couverture 1200*1200', ['for'=>'cname']) !!}
                            {!! Form::file('photo',  ['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                           <div class="col"> 
                              {!! Form::label('', "Version pdf de l'ouvrage", ['for'=>'cname']) !!}
                              {!! Form::file('livre_pdf', ['class'=>'form-control','id'=>'cname']) !!}
                           </div>
                        </div>
                        <div class="form-group"> 
                            {!! Form::label('', "Quantite", ['for'=>'cname']) !!}
                            {!! Form::number('quantite', null,['class'=>'form-control','id'=>'cname']) !!}
                          </div>
                        <div class="row">
                        @if (Session::get('user')->role->role == "ADMIN")
                              <div class="col">
                                {!! Form::label('', "Auteur de l'ouvrage", ['for'=>'cname']) !!}
                                {!! Form::select('auteur', $auteurs,null, ['placeholder'=>'selectionner auteur', 'class'=>'form-control']) !!}
                              </div>
                          @endif
                          <div class="col">
                            {!! Form::label('', 'Categorie ouvrage', ['for'=>'cname']) !!}
                            {!! Form::select('categorie', $categories,null, ['placeholder'=>'selectionner catégorie', 'class'=>'form-control']) !!}
                          </div>
                          <div class="col">
                             {!! Form::label('', 'Specialité ouvrage', ['for'=>'cname']) !!}
                             {!! Form::select('specialite', $specialites, null, ['placeholder'=>'selectionner spécialité', 'class'=>'form-control']) !!}
                          </div>
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