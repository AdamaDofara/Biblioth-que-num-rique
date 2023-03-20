@extends('layouts.appadmin')
@section('title')
    Les Auteur
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
        <div class="card-body">
          <h4 class="card-title">Auteur</h4>
          @if (Session::has('status'))
              <div class ="alert alert-success">
                  {{Session::get('status')}}
                  {{Session::put('status', null)}}
              </div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        {{-- <th>Image</th> --}}
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($auteurs as $auteur)
                   @if ($auteur->role->role == "AUTEUR")
                       <tr>
                    <td>{{$increment}}</td>
                     {{-- <td><img src="storage/image_files/{{$auteur->photo}}" alt="{{$auteur->product_image}}"></td>  --}}
                    <td>{{$auteur->nom}}</td>
                    <td>{{$auteur->prenom}}</td>
                    <td>{{$auteur->email}}</td>
                    <td>{{$auteur->role->role}}</td>
                    <td>{{$auteur->statut}}</td>
                    <td>
                      {!! Form::hidden('', $increment=$increment+1) !!}
                      @if ($auteur->statut==1)
                      <label class="badge badge-success">Activé</label>
                      @else
                        <label class="badge badge-danger">Bloqué</label>  
                      @endif
                    </td>
                    <td>
                        <a href="{{url('/suprimer_compte/'.$auteur->id)}}'" class="btn btn-outline-danger" id="supprimer">Supprimer</a>
                      @if ($auteur->statut==0)
                        <a class="btn btn-outline-success" href="{{url('/activer_abonne/'.$auteur->id)}}">Activer</a>
                      @else
                        <a class="btn btn-outline-warning" href="{{url('/bloquer_compte/'.$auteur->id)}}">Bloquer</a> 
                      @endif
                    </td>
                   </tr>
                   @endif
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