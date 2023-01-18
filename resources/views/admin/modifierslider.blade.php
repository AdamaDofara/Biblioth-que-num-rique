@extends('layouts.appadmin')
@section('title')
    Modifier Slider
@endsection
@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Slider</h4>
                      {!! Form::open(['action'=>'App\Http\Controllers\SliderController@modifier', 'method'=>'POST', 'class'=>'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {!! Form::label('', 'Première Description', ['for'=>'cname']) !!}
                        {!! Form::text('description1', $slider->description1, ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('', 'Deuxième Description', ['for'=>'cname']) !!}
                        {!! Form::text('description2', $slider->description2, ['class'=>'form-control','id'=>'cname']) !!}
                      </div>
                       <div class="form-group">
                        {!! Form::label('', 'Image du produit', ['for'=>'cname']) !!}
                        {!! Form::file('slider_image', ['class'=>'form-control','id'=>'cname']) !!}
                      </div> 
                      {!! Form::hidden('id',$slider->id ) !!}
                      {!! Form::submit('ajouter', ['class'=>'btn btn-primary']) !!}
                      {!! Form::close() !!}
                  </form>
                </div>
              </div>
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