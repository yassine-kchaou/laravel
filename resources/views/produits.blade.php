@extends('template_admin_erit')

@section('content')
    <h1>Liste des produits</h1>
    <div class="container-fluid">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col" style="width: 10%;">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantite</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($liste_produit as $produit)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td><img src="/img/{{$produit->image}}" width="100" height="100"></td>
                            <td>{{$produit->id}}</td>
                            <td>{{$produit->nom}}</td>
                            <td>{{$produit->prix}}</td>
                            <td>{{$produit->quantite}}</td>
                            <td>
                                <form action="{{route('produits.destroy',($produit->id))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-primary">DELETE</button>
                                </form>
                                <br>
                                <form action="{{route('produits.edit',($produit->id))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">EDIT</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
