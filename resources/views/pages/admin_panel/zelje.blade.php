@extends('pages.admin')
@section('administracija')


<div class="col-md-8">
            <h3>Lista zelja</h3>
            
            @isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset
            <table>
                <tr>                   
                    <th>Korisnik::Datum::</th>                   
                </tr>
                <tr>   
                    <td>proizvod</td>
                                        
                </tr>
            </table>
         
        </div>
@endsection

