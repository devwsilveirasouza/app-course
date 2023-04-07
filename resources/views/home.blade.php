@extends('layouts.template')

@section('content')

    <h2>HOME SYSTEM</h2>

    <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="{{route('home')}}">HOME</a>
        <a class="list-group-item list-group-item-action" href="{{route('product.index')}}">PRODUCTS</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">USERS</a>
      </div>

@endsection
