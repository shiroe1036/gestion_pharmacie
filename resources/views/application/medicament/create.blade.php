@extends('base')

@section('content-body')
<section class="panel mt-3">
    <input type="text" class="idtest">
    <input type="text" class="test" placeholder="autocomplete ici"/>
    @if(Session::has('error'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('error') }}</p>
    </div>
    @endif
    <form action="{{ route('medicament.store') }}" method="post">
        @csrf
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label for="nomMedoc" class="control-label">Nom médicament</label>
                        <input type="text" name="nomMedoc" value="{{ old('nomMedoc') }}" placeholder="Nom du médicament" class="form-control {{ $errors->has('nomMedoc') ? 'is-invalid' : '' }}" autofocus>

                        @if($errors->has('nomMedoc'))
                        <label for="nomMedoc" class="invalid-feedback"> {{ $errors->first('nomMedoc') }} </label>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label for="famille" class="control-label">Famille</label>
                        <input type="text" name="famille" placeholder="Famille du médicament" value="{{ old('famille') }}" class="form-control {{ $errors->has('famille') ? 'is-invalid' : '' }}" autofocus>
                        @if($errors->has('famille'))
                        <label for="contact" class="invalid-feedback">{{ $errors->first('famille') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label for="prixVente" class="control-label">Prix vente</label>
                        <input type="number" name="prixVente" placeholder="fixer prix vente" value="{{ old('prixVente') }}" class="form-control {{ $errors->has('prixVente') ? 'is-invalid' : '' }}">
                        @if($errors->has('prixVente'))
                        <label for="prixVente" class="invalid-feedback">{{ $errors->first('prixVente') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label for="" class="control-label">Action</label>
                        <button style="display: block;" type="button" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Valider</button>
                    <a href="{{ route('medicament.index') }}" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </div>
    </form>
</section>
<script src="{{ asset('js/application/medicament/medoc.js') }}" defer></script>
@endsection