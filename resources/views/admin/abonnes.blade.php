@extends('layouts.appadmin')
@section('title')
    Les Abonnes
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
          <h4 class="card-title">Abonnes</h4>
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
                   @foreach ($abonnes as $abonne)
                   @if ($abonne->role->role == "ABONNE")
                       <tr>
                    <td>{{$increment}}</td>
                     {{-- <td><img src="storage/image_files/{{$abonne->photo}}" alt="{{$abonne->product_image}}"></td>  --}}
                    <td>{{$abonne->nom}}</td>
                    <td>{{$abonne->prenom}}</td>
                    <td>{{$abonne->email}}</td>
                    <td>{{$abonne->role->role}}</td>
                    <td>{{$abonne->statut}}</td>
                    <td>
                      {!! Form::hidden('', $increment=$increment+1) !!}
                      @if ($abonne->statut==1)
                      <label class="badge badge-success">Activé</label>
                      @else
                        <label class="badge badge-danger">Bloqué</label>  
                      @endif
                    </td>
                    <td>
                      <button class="btn btn-outline-primary" onclick="{{--window.location='{{url('/modifier_abonne/'.$abonne->id)}}'--}}">Modifier</button>
                        <a href="{{url('/suprimer_compte/'.$abonne->id)}}'" class="btn btn-outline-danger" id="supprimer">Supprimer</a>
                      @if ($abonne->statut==0)
                        <a class="btn btn-outline-success" href="{{url('/activer_abonne/'.$abonne->id)}}'">Activer</a>
                      @else
                        <a class="btn btn-outline-warning" href="{{url('/bloquer_compte/'.$abonne->id)}}'">Bloquer</a> 
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