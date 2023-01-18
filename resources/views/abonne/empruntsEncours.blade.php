@extends('layouts.appadmin')
@section('title')
    Les Emprunts
@endsection

@section('contenu')
{{-- {{$increment=1}} --}}
{!! Form::hidden('', $increment=1) !!}
      <div class="card">
        @if (Session::has('message'))
          <div class ="alert alert-success">
            {{Session::get('message')}}
            {{Session::put('message', null)}}
          </div>
        @endif
        @if (Session::has('status'))
                  <div class ="alert alert-success">
                      {{Session::get('status')}}
                      {{Session::put('status', null)}}
                  </div>
        @endif
        <div class="card-body">
          <h4 class="card-title">Emprunts</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <td>Photo ouvrage</td>
                        <th>Nom emprunteur</th>
                        <th>Nom de l'ouvrage</th>
                        <th>Date debut Emprunt</th>
                        <th>Date fin Emprunt</th>
                        <th> Statut</th>  
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($emprunts as $emprunts)
                   <tr>
                    <td>{{$increment}}</td>
                    <td><img src="{{asset('storage/image_files/'.$emprunts->ouvrage->photo)}}" alt="rien"></td>
                    <td>{{$emprunts->user->nom.' '.$emprunts->user->prenom}}</td>
                    <td>{{$emprunts->ouvrage->titre}}</td>
                    <td>{{$emprunts->created_at}}</td>
                    <td>{{$emprunts->date_retour}}</td>
                    <td>{{$emprunts->statut}}</td>
                    
                      {!! Form::hidden('', $increment=$increment+1) !!}
{{--                  
                      <label class="badge badge-success">Rendre</label>
                     
                      <label class="badge badge-danger">Désactivé</label>   --}}
                          <td> 
                            <a href="/lire_ouvrage/{{$emprunts->ouvrage_id}}" class="btn btn-outline-warning">Consulter</a>
                      {{-- <button class="btn btn-outline-warning" onclick="window.location='{{url('/desactiver_emprunts/'.$emprunts->id)}}'">Désactiver</button> --}}
                            <button class="btn btn-outline-success" onclick="window.location='{{url('/rendre/'.$emprunts->id)}}'">Rendre</button> 
                            @if (Session::get('user')->role->role == "ADMIN")
                                <a href="/bloquer_utilisateur/{{$emprunts->id}}" class="btn btn-outline-danger">Bloquer</a>
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