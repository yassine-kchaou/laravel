@extends('template_admin_erit')
@section('content')
    <html>
    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>Modifier une catégorie</title>
    </head>
    <body>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Modifier une catégorie</h6>
                </div>
                <div class="table-responsive">
                    <form method="POST" action="{{ route('categories.update', $categorie->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $categorie->id }}">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td height="31" width="272">
                                        <input type="text" name="nom" value="{{ $categorie->nom }}" size="25">
                                    </td>
                                    <td height="31" width="200"><input type="file" value="{{ $categorie->image }}" name="image" size="20"></td>

                                </tr>
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
