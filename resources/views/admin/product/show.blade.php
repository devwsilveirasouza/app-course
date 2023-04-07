@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Descrição do Produto</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('product.index')}}" class="btn btn-primary float-end">Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-1 col-sm-1 col-md-1">
        <div class="form-group">
            <strong>ID:</strong>
            {{$product->id}}
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <strong>Barcode:</strong>
            {{$product->bar_code}}
        </div>
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="form-group">
            <strong>Name:</strong>
            {{$product->name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{$product->detail}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <img src="/images/{{$product->image}}" width="500px" height="200px">
        </div>
    </div>

</div>

@endsection
