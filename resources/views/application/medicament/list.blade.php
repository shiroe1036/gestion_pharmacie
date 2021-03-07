@extends('base')

@section('content-body')
<section class="panel">
    <a href="{{ route('medicament.create') }}" class="mb-3 mt-3 btn btn-primary">Ajouter Médicament</a>
    <form action="{{ route('medicament.search') }}" method="get" class="form-inline">

        <div class="form-group mb-3">
            <input required type="text" placeholder="recherche médicament" name="findMedoc" class="form-control " autofocus>
        </div>
        <div class="form-group ml-3 mb-3">
            <button type="submit" class=" btn btn-primary"><i class="ti-search"></i></button>
            <a href="{{ route('medicament.index') }}" class="ml-3 btn btn-secondary">refresh</a>
        </div>
    </form>
    @if(Session::has('success'))
    <div class="alert alert-success mb-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('success') }}</p>
    </div>
    @endif
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Médicament</th>
                    <th>famille</th>
                    <th>prix vente</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($medocs) > 0)
                @foreach($medocs as $res)
                <tr class="text-center">
                    <td>{{ $res->id }}</td>
                    <td>{{ $res->nomMedoc }}</td>
                    <td>{{ $res->famille }}}</td>
                    <td>{{ $res->prixVente }}</td>
                    <td>
                        <form action="{{ route('medicament.destroy', $res->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <button class="btn btn-danger mb-1"><i class="ti-trash"></i></button>
                                <a href="{{ route('medicament.edit', $res->id) }}" class="btn btn-warning"><i class="ti-pencil"></i></a>
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
        <div class="d-flex justify-content-center">
            {{ $medocs->links() }}
        </div>
    </div>
</section>
@endsection