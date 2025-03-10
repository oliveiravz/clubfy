@extends('layouts.header')

@section('content')
    <div class="d-flex">
        @include('layouts.sidebar')
        
        @if(Session::has('user'))
            <p>Bem-vindo, {{ Session::get('user')['nome'] }}!</p>
        @endif
    </div>
@endsection