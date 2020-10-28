@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj ulogu</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updateRole)? asset('/index.php/admin/uloge/update/'.$updateRole->id) : asset('/index.php/admin/uloge/store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Naziv:</label>
            <input type="text" name="naziv" class="form-control" value="{{ isset($updateRole)? $updateRole->naziv : old('naziv') }}"/>
        </div>
        <div class="form-group">
            <input type="submit" name="addUloga" value="{{ isset($updateRole)? 'Promeni ulogu' : 'Dodaj ulogu' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->naziv }}</td>
            <td><a href="{{ asset('/index.php/admin/uloge/'.$role->id) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/uloge/destroy/'.$role->id) }}">Obrisi</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
