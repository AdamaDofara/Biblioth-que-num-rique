@extends('layouts.appadmin')
@section('title')
    Les Catégories
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
          <h4 class="card-title">Catégories</h4>
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
                    
                        @foreach ($categories as $categorie)
                        <tr>
                            <td>{{$categorie->id}}</td>
                            <td>{{$categorie->categorie}}</td>
                            {{-- <td>
                            <label class="badge badge-info">On hold</label>
                            </td> --}}
                            <td>
                            <a href="{{url('/supprimer_categorie/'.$categorie->id)}}" class="btn btn-outline-danger" id="supprimer">Supprimer</a>
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