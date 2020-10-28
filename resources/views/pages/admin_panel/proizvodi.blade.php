@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj proizvod</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updateProduct)? asset('/index.php/admin/proizvodi/update/'.$updateProduct->id) : asset('/index.php/admin/proizvodi/store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Naziv:</label>
            <input type="text" name="naziv" class="form-control" value="{{ isset($updateProduct)? $updateProduct->naziv : old('naziv') }}"/>
        </div>
        <div class="form-group">
            <label>Opis:</label>
            <input type="text" name="opis" class="form-control" value="{{ isset($updateProduct)? $updateProduct->opis : old('opis') }}"/>
        </div>
        <div class="form-group">
            <label>Cena:</label>
            <input type="text" name="cena" class="form-control" value="{{ isset($updateProduct)? $updateProduct->cena : old('cena') }}"/>
        </div>
        <div class="form-group">
            <label>Galerija id:</label>
            <input type="text" name="galerija_id" class="form-control" value="{{ isset($updateProduct)? $updateProduct->galerija_id : old('galerija_id') }}"/>
        </div>
        <div class="form-group">
            <label>Id pripada:</label>
            <input type="text" name="id_pripada" class="form-control" value="{{ isset($updateProduct)? $updateProduct->id_pripada : old('id_pripada') }}"/>
        </div>
        <div class="form-group">
            <input type="submit" name="addProizvod" value="{{ isset($updateProduct)? 'Promeni proizvod' : 'Dodaj proizvod' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>Galerija_id</th>
            <th>Id_pripada</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($proizvodi as $proizvod)
        <tr>
            <td>{{ $proizvod->id }}</td>
            <td>{{ $proizvod->naziv }}</td>
            <td>{{ $proizvod->opis }}</td>
            <td>{{ $proizvod->cena }}</td>
            <td>{{ $proizvod->galerija_id }}</td>
            <td>{{ $proizvod->id_pripada }}</td>
            <td><a href="{{ asset('/index.php/admin/proizvodi/'.$proizvod->id) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/proizvodi/destroy/'.$proizvod->id) }}">Obrisi</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
@section('appendScripts')
@parent
<!-- Scripts -->
<script src="{{asset('/js/listazelja.js')}}"></script>


@endsection