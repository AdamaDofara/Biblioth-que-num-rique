@extends('layouts.appadmin')
@section('title')
    Ajouter Categorie
@endsection
@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter catégorie</h4>
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
                      {!! Form::open(['action'=>'App\Http\Controllers\AdminController@sauver_categorie', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm']) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {!! Form::label('', 'Nom de la categorie', ['for'=>'cname']) !!}
                        {!! Form::text('categorie', '', ['class'=>'form-control','id'=>'cname']) !!}
                        {{-- @if ($errors->has('category_name'))
                            <p class="text-danger">{{$errors->first('category_name')}}</p>
                        @endif --}}
                      </div>
                      {!! Form::submit('Ajouter catégorie', ['class'=>'btn btn-primary']) !!}
                      {!! Form::close() !!}
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