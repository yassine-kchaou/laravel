@extends('template_admin_erit')

@section('content')
<html>
    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>Modifier un produit</title>
    </head>
    <body>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Modifier un produit</h6>
                </div>
                <div class="table-responsive">
                    <form method="POST" action="{{ route('produits.update', $produit->id) }}" enctype="multipart/form-data">
                        @csrf
                         @method('PATCH')
                        <input type="hidden" name="id" value="{{ $produit->id }}">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td height="31" width="272"><input type="text" name="nom" value="{{$produit->nom}}"size="25" ></td>
								<td height="31" width="284"><input type="text" name="prix" value="{{$produit->prix}}" size="25"></td>
								<td height="31" width="269"><input type="text" name="quantite" value="{{$produit->quantite}}" size="25"></td>
								<td height="31" width="280"><input type="file" name="image"><img src="/img/{{$produit->image}}" width="250" height="100"/></td></tr>
                            </tbody>
                        </table>
                        <p>
                            <input type="submit" value="Editer" class="btn btn-sm btn-primary" name="B1">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
