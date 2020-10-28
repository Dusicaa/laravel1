@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
    <h3>Dodaj anketu</h3>

    @isset($errors)
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger"> {{ $error }} </div>
    @endforeach
    @endif
    @endisset

    <form action="{{ isset($updatePoll)? asset('/index.php/admin/ankete/update/'.$updatePoll->id_ankete) : asset('/index.php/admin/ankete/store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Pitanje:</label>
            <input type="text" name="pitanje" class="form-control" value="{{ isset($updatePoll)? $updatePoll->pitanje : old('pitanje') }}"/>
        </div>
        <div class="form-group">
            <label>Aktivna (0-1)</label>
            <input type="text" name="aktivna" class="form-control" value="{{ isset($updatePoll)? $updatePoll->aktivna : old('aktivna') }}"/>
        </div>


        <div class="form-group">
            <input type="submit" name="addAnketu" value="{{ isset($updatePoll)? 'Promeni anketu' : 'Dodaj anketu' }}" class="btn btn-default" />
        </div> 
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Pitanje</th>
            <th>Aktivna</th>

            <th>Izmeni</th>
            <th>Obrisi</th>
        </tr>

        @foreach($ankete as $anketa)
        <tr>
            <td>{{ $anketa->id_ankete }}</td>
            <td>{{ $anketa->pitanje }}</td>
            <td>{{ $anketa->aktivna }}</td>

            <td><a href="{{ asset('/index.php/admin/ankete/'.$anketa->id_ankete) }}">Izmeni</a></td>
            <td><a href="{{ asset('/index.php/admin/ankete/destroy/'.$anketa->id_ankete) }}">Obrisi</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
