@extends('layouts.main')

@section('content')
    @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
<!-- banner section start -->
<h1>Статистика:</h1>
    @foreach($gamers as $gamer)
       <div> {{$gamer->nick}} , побед: {{$gamer->wins->count()}}</div>
    @endforeach
<h2>nick: {{$nick}}</h2>
<form action="/new-game" method="post">
    @if(!$nick)
        nick: <input name="nick"><br/><br/>
    @endif
    @csrf
        <button type="submit">Новая игра!</button>
</form>

@endsection
