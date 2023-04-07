@extends('layouts.template')

@section('content')

    <h2>HOME SYSTEM</h2>

    <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="{{route('home')}}">HOME</a>
        <a class="list-group-item list-group-item-action" href="{{route('product.index')}}">PRODUTOS</a>
        <a class="list-group-item list-group-item-action" href="{{route('stock.index')}}">ESTOQUE</a>
      </div>

@endsection
