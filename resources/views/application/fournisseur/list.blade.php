@extends('base')

@section('content-body')
<section class="panel">
    <a href="{{ route('fournisseur.create') }}" class="mb-3 mt-3 btn btn-primary">Ajouter fournisseur</a>
    <form action="{{ route('fournisseur.search') }}" class="form-inline" method="get">
        <div class="form-group mb-3">
            <input type="text" placeholder="recherche fournisseur" name="findFrns" class="form-control" required autofocus>
        </div>
        <button class="btn btn-primary ml-3">search</button>
        <a href="{{ route('fournisseur.index') }}" class="btn btn-default">refresh</a>
    </form>

    @if(Session::has('success'))
    <div class="alert alert-success mb-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('success') }}</p>
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-danger mb-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('error') }}</p>
    </div>
    @endif
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom Fournisseur</th>
                        <th>contact</th>
                        <th>email</th>
                        <th>adresse</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($frns) > 0)
                    @foreach($frns as $res)
                    <tr class="text-center">
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->nomFournisseur }}</td>
                        <td>{{ $res->contact }}</td>
                        <td>{{ $res->email }}</td>
                        <td>{{ $res->adresse }}</td>
                        <td>
                            <form action="{{ route('fournisseur.destroy', ['id' => $res->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <button class="btn btn-danger mb-1">Suppr</button>
                                    <a href="{{ route('fournisseur.edit', ['id' => $res->id]) }}" class="btn btn-warning">Edit</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="text-center">
                        <td colspan="6">Aucun élément</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $frns->links() }}
        </div>
    </div>
</section>
@endsection