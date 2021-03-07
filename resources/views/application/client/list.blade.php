@extends('base')

@section('content-body')
<section class="panel">
    <a href="{{ route('client.create') }}" class="mb-3 mt-3 btn btn-primary">Ajouter client</a>
    <form action="{{ route('client.search') }}" method="get" class="form-inline">
        
        <div class="form-group mb-3">
            <input required type="text" placeholder="recherche nom client" name="findClient" class="form-control " autofocus>
        </div>
        <button type="submit" class="ml-3 btn btn-primary">search</button>
        <a href="{{ route('client.index') }}" class="ml-3 btn btn-secondary">refresh</a>
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
                    <th>nom Client</th>
                    <th>contact</th>
                    <th>email</th>
                    <th>adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($clients) > 0)
                    @foreach($clients as $res)
                    <tr class="text-center">
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->nomClient }}</td>
                        <td>{{ $res->contact }}}</td>
                        <td>{{ $res->email }}</td>
                        <td>{{ $res->adresse }}</td>
                        <td>
                            <form action="{{ route('client.destroy', $res->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <button class="btn btn-danger mb-1">Suppr</button>
                                    <a href="{{ route('client.edit', $res->id) }}" class="btn btn-warning">Edit</a>
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
            {{ $clients->links() }}
        </div>
    </div>
</section>
@endsection