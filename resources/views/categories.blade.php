@extends('template_admin_erit')

@section('content')
    <h1>Liste des catégories</h1>
    <div class="container-fluid">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Liste des catégories</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col" style="width: 10%;">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($liste_categorie as $categorie)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td><img src="/img/{{$categorie->image}}" width="100" height="100"></td>
                            <td>{{$categorie->id}}</td>
                            <td>{{$categorie->nom}}</td>
                            <td>
                                <form action="{{route('categories.destroy',($categorie->id))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-primary">DELETE</button>
                                </form>
                                <br>
                                <form action="{{route('categories.edit',($categorie->id))}}" method="POST" enctype="multipart/form-data">
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
