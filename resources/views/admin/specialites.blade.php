@extends('layouts.appadmin')
@section('title')
    Les Specialites
@endsection

@section('contenu')
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
          <h4 class="card-title">Specialites</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom de la catégorie</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                        @foreach ($specialites as $specialite)
                        <tr>
                            <td>{{$specialite->id}}</td>
                            <td>{{$specialite->specialite}}</td>
                            {{-- <td>
                            <label class="badge badge-info">On hold</label>
                            </td> --}}
                            <td>
                            <a href="{{url('/supprimer_specialite/'.$specialite->id)}}" class="btn btn-outline-danger" id="supprimer">Supprimer</a>
                           <!-- {{-- <button class="btn btn-outline-primary" onclick="window.location = '{{URL::to('/modifier/'{$categorie->id})}}'">Modifier</button> --}}
                            {{-- <button class="btn btn-outline-danger">Supprimer</button>  --}} -->
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
<script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection