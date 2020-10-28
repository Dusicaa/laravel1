@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj korisnika</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updateUser)? asset('/index.php/admin/korisnici/update/'.$updateUser->id) : asset('/index.php/admin/korisnici/store') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Ime:</label>
            <input type="text" name="ime" class="form-control" value="{{ isset($updateUser)? $updateUser->ime : old('ime') }}"/>
        </div>
        <div class="form-group">
            <label>Prezime:</label>
            <input type="text" name="prezime" class="form-control" value="{{ isset($updateUser)? $updateUser->prezime : old('prezime') }}"/>
        </div>
        <div class="form-group">
            <label>Korisnicko ime:</label>
            <input type="text" name="korisnicko_ime" class="form-control" value="{{ isset($updateUser)? $updateUser->korisnicko_ime : old('korisnicko_ime') }}"/>
        </div>
        <div class="form-group">
            <label>Lozinka:</label>
            <input type="password" name="lozinka" class="form-control" value="{{ isset($updateUser)? $updateUser->lozinka : old('lozinka') }}"/>
        </div>
        <div class="form-group">
            <label>Mejl:</label>
            <input type="text" name="mejl" class="form-control" value="{{ isset($updateUser)? $updateUser->mejl : old('mejl') }}"/>
        </div>
        <div class="form-group">
            <label>Telefon:</label>
            <input type="text" name="telefon" class="form-control" value="{{ isset($updateUser)? $updateUser->telefon : old('telefon') }}"/>
        </div>
        <div class="form-group">
            <label>Id uloge (1-a,2-k):</label>
            <input type="text" name="ulogaId" class="form-control" value="{{ isset($updateUser)? $updateUser->uloga_id : old('ulogaId') }}"/>
        </div>
        <div class="form-group">
            <label>Slika:</label>
            <input type="file" name="slika" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="addUser" value="{{ isset($updateUser)? 'Promeni korisnika' : 'Dodaj korisnika' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Korisnicko_ime</th>
            <th>Lozinka</th>
            <th>Mejl</th>
            <th>Telefon</th>
            <th>Id uloge</th>
            <th>Slika</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($korisnici as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->ime }}</td>
            <td>{{ $user->prezime }}</td>
            <td>{{ $user->korisnicko_ime }}</td>
            <td>{{ $user->lozinka }}</td>
            <td>{{ $user->mejl }}</td>
            <td>{{ $user->telefon }}</td>
            <td>{{ $user->uloga_id }}</td>
            <td>{{ $user->slika }}</td>
            <td><a href="{{ asset('/index.php/admin/korisnici/'.$user->id) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/korisnici/destroy/'.$user->id) }}">Obrisi</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
