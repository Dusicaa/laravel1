@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj meni</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updateMenu)? asset('/index.php/admin/meni/update/'.$updateMenu->id) : asset('/index.php/admin/meni/store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Naziv:</label>
            <input type="text" name="naziv" class="form-control" value="{{ isset($updateMenu)? $updateMenu->naziv : old('naziv') }}"/>
        </div>
        <div class="form-group">
            <label>Ruta:</label>
            <input type="text" name="ruta" class="form-control" value="{{ isset($updateMenu)? $updateMenu->ruta : old('ruta') }}"/>
        </div>
        <div class="form-group">
            <label>Roditelj:</label>
            <input type="text" name="roditelj" class="form-control" value="{{ isset($updateMenu)? $updateMenu->roditelj : old('roditelj') }}"/>
        </div>
        <div class="form-group">
            <label>Tezina:</label>
            <input type="text" name="tezina" class="form-control" value="{{ isset($updateMenu)? $updateMenu->tezina : old('tezina') }}"/>
        </div>
        <div class="form-group">
            <input type="submit" name="addMeni" value="{{ isset($updateMenu)? 'Promeni meni' : 'Dodaj meni' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Ruta</th>
            <th>Roditelj</th>
            <th>Tezina</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($meni as $nav)
        <tr>
            <td>{{ $nav->id }}</td>
            <td>{{ $nav->naziv }}</td>
            <td>{{ $nav->ruta }}</td>
            <td>{{ $nav->roditelj }}</td>
            <td>{{ $nav->tezina }}</td>
            <td><a href="{{ asset('/index.php/admin/meni/'.$nav->id) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/meni/destroy/'.$nav->id) }}">Obrisi</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
