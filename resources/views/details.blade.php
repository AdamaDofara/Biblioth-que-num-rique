@extends('layouts.app1')
@section('title')
    Details Bibliothèque
@endsection
@section('contenu')
<h1>Les details du livre</h1>
{{-- @foreach ($livre as $ouvrage)
<img src="{{asset('storage/image_files/'.$ouvrage->photo)}}" class="rounded float-left" alt="...">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">{{$ouvrage->titre}}</div>
        <div class="card-body text-primary">
            <h5 class="card-title">Auteur: {{$ouvrage->user->nom.' '.$ouvrage->user->prenom}}</h5>
            <p class="card-text">{{$ouvrage->description}}</p>
        </div>
    </div>
@endforeach --}}
@foreach($livre as $ouvrage)
<div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="{{asset('storage/image_files/'.$ouvrage->photo)}}"
                class="card-img-top"
                alt="Sunset over the Sea"
              />
            </div>
          </div>
          <div class="col">
             {{-- <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('storage/image_files/'.$ouvrage->photo)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$ouvrage->titre}}</h5>
                            <p class="card-text">{{$ouvrage->description}}</p>
                            <p class="card-text"><small class="text-muted">De ²{{$ouvrage->user->nom.' '.$ouvrage->user->prenom}}</small></p>
                        </div>
                    </div>
                </div>
            </div>  --}}
           <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{$ouvrage->titre}}
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>{{$ouvrage->description}}</p>
                        <footer class="blockquote-footer">{{$ouvrage->user->nom.' '.$ouvrage->user->prenom}} </footer>
                      </blockquote>
                    </div>
                  </div>
              </div>
            </div>
            <br>
            @if (Session::get('user')->role->role !="ADMIN" && Session::get('user')->role->role !="AUTEUR")
                 <div class="row">
                <div class="col">
                    {{-- <form class="form-group" action="App\Http\Controllers\AbonneController@sauver_emprunt" method="post">
                    {{ csrf_field() }}
                        <label for="exampleInputEmail1">Date de retour</label>
                        <input type="date" class="form-control" >
                        <input type="hidden" value="{{$ouvrage->id}}" name="ouvrage_id">
                        <small id="emailHelp" class="form-text text-muted"><p class="alert alert-danger">Ce livre doit etre ramene au plus tard une semaine après, sinon vous serez sanctionnez.</p></small>
                        <div class="text-center"><button type="submit" class="btn btn-primary">Emprunter</button></div>
                    </form> --}}
                    @if (Session::has('status'))
                    <div class ="alert alert-success">
                      {{Session::get('status')}}
                      {{Session::put('status', null)}}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class ="alert alert-danger">
                      {{Session::get('error')}}
                      {{Session::put('error', null)}}
                    </div>
                    @endif
                     @if (count($errors)>0)
                    <ul class="alert alert-danger">
                     @foreach ($errors->all() as $error)
                         <li>{{$error}}</li>
                     @endforeach
                    </ul>
                  @endif
                    {!! Form::open(['action'=>'App\Http\Controllers\AbonneController@sauver_emprunt', 'method'=>'POST', 'class'=>'form-group']) !!}
                      {{ csrf_field() }}
                        {!! Form::label('', 'Date de retour', ['for'=>'cname']) !!}
                        {!! Form::date('date_retour', '', ['class'=>'form-control','id'=>'cname']) !!}
                        {!! Form::hidden("ouvrage_id", $ouvrage->id, ['class'=>'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted"><p class="alert alert-danger">Ce livre doit etre ramene au plus tard une semaine après, sinon vous serez sanctionnez.</p></small>
                       <div class="text-center">{!! Form::submit('Emprunter', ['class'=>'btn btn-primary']) !!}</div>
                      {!! Form::close() !!}
                </div>
            </div>
            @endif
           </div>
        </div>
      </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col">
        <img src="{{asset('storage/image_files/'.$ouvrage->photo)}}" alt="" srcset="">
    </div>
    <div class="col">
        <div class="row">
            <div class="col">{{$ouvrage->titre}}</div>
            <div class="col">{{$ouvrage->user->nom.' '.$ouvrage->user->prenom}}</div>
        </div>
    </div>
</div> --}}
@endforeach
@endsection