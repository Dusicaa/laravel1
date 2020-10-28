@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj slike u galeriju</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updatePicture)? asset('/index.php/admin/slike/update/'.$updatePicture->id) : asset('/index.php/admin/slike/store') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Alt:</label>
            <input type="text" name="alt" class="form-control" value="{{ isset($updatePicture)? $updatePicture->alt : old('alt') }}"/>
        </div>
        <div class="form-group">
            <label>Id pripada:</label>
            <input type="text" name="id_pripada" class="form-control" value="{{ isset($updatePicture)? $updatePicture->id_pripada : old('id_pripada') }}"/>
        </div>

        <div class="form-group">
            <label>Slika:</label>
            <input type="file" name="slika" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="addPicture" value="{{ isset($updatePicture)? 'Promeni sliku' : 'Dodaj sliku' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Alt</th>
            <th>Id pripada</th>
            <th>Slika</th>     
            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($galleries as $slika) 
        <tr>
            <td>{{ $slika->id }}</td>
            <td>{{ $slika->alt }}</td>
            <td>{{ $slika->id_pripada }}</td>
            <td>{{ $slika->slika }}</td>
            <td><a href="{{ asset('/index.php/admin/slike/'.$slika->id) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/slike/destroy/'.$slika->id) }}">Obrisi</a></td>
        </tr>
        @endforeach 

    </table>
</div>
@endsection
