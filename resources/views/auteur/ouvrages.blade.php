@extends('layouts.appadmin')
@section('title')
    Les Ouvrages
@endsection

@section('contenu')
{{-- {{$increment=1}} --}}
{!! Form::hidden('', $increment=1) !!}
      <div class="card">
        @if (Session::has('status'))
          <div class ="alert alert-success">
            {{Session::get('status')}}
            {{Session::put('status', null)}}
          </div>
        @endif
        @if (Session::has('message'))
          <div class ="alert alert-success">
            {{Session::get('message')}}
            {{Session::put('message', null)}}
          </div>
        @endif
        <div class="card-body">
          <h4 class="card-title">Ouvrages</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Nom de l'ouvrage</th>
                        <th>Quantite</th>
                        <th>Categorie</th>
                        <th>Specialite</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($ouvrages as $ouvrage)
                   <tr>
                    <td>{{$increment}}</td>
                     <td><img src="storage/image_files/{{$ouvrage->photo}}" alt="{{$ouvrage->product_image}}"></td> 
                    <td>{{$ouvrage->titre}}</td>
                    <td>{{$ouvrage->quantite}}</td>
                    @if ($ouvrage->categorie_id == "")
                      <td>null</td>
                    @else
                      <td>{{$ouvrage->categorie->categorie}}</td>
                    @endif
                    @if ($ouvrage->specialite_id == "") 
                      <td>null</td>
                    @else
                      <td>{{$ouvrage->specialite->specialite}}</td>
                    @endif
                    <td>
                      {!! Form::hidden('', $increment=$increment+1) !!}
                      @if ($ouvrage->statut==1)
                      <label class="badge badge-success">Activé</label>
                      @else
                        <label class="badge badge-danger">Désactivé</label>  
                      @endif
                    </td>
                    <td>
                      <a href="#" class="btn btn-outline-danger" id="supprimer">Supprimer</a>
                      @if ($ouvrage->statut==1)
                        <button class="btn btn-outline-warning" onclick="{{--window.location='{{url('/desactiver_ouvrage/'.$ouvrage->id)}}'--}}">Désactiver</button>
                      @else
                        <button class="btn btn-outline-success" onclick="{{--window.location='{{url('/activer_ouvrage/'.$ouvrage->id)}}'--}}">Activer</button> 
                      @endif
                    </td>
                </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script src="backend/js/data-table.js"></script>
@endsection