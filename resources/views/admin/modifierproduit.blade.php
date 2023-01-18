@extends('layouts.appadmin')
@section('title')
    Modifier Produit
@endsection
@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Produit</h4>
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
                      {!! Form::open(['action'=>'App\Http\Controllers\ProduitController@modifier', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                      {{ csrf_field() }}
                      {!! Form::hidden('id', $produit->id) !!}
                      <div class="form-group">
                        {!! Form::label('', 'Nom du produit', ['for'=>'cname']) !!}
                        {!! Form::text('product_name', $produit->product_name, ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('', 'Prix du produit', ['for'=>'cname']) !!}
                        {!! Form::number('product_price', $produit->product_price, ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('', 'Categorie du produit', ['for'=>'cname']) !!}
                        {!! Form::select('product_category', $categories, $produit->product_category, ['class'=>'form-control']) !!}
                      </div>
                       <div class="form-group">
                        {!! Form::label('', 'Image du produit', ['for'=>'cname']) !!}
                        {!! Form::file('product_image', ['class'=>'form-control','id'=>'cname']) !!}
                      </div> 
                      {!! Form::submit('modifier', ['class'=>'btn btn-primary']) !!}
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