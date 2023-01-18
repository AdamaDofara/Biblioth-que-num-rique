@extends('layouts.appadmin')
@section('title')
    Modifier Categorie
@endsection
@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              @if (Session::has('message'))
              <div class ="alert alert-success">
                {{Session::get('message')}}
                {{Session::put('message', null)}}
              </div>
              @endif
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier catégorie</h4>
                      {!! Form::open(['action'=>'App\Http\Controllers\CategorieController@modifier', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm']) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                          {!! Form::hidden('id',$categorieToModify->id) !!}
                        {!! Form::label('', 'Nom de la categorie', ['for'=>'cname']) !!}
                        {!! Form::text('category_name', $categorieToModify->category_name, ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                      {!! Form::submit('Modifier', ['class'=>'btn btn-primary']) !!}
                      {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
    {{-- <script src="backend/js/form-validation.js"></script> --}}
    <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
    <!-- End custom js for this page-->
@endsection