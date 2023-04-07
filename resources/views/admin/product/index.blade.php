@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produtos Cadastrados</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a href="{{ route('product.create') }}" class="btn btn-success float-end mb-2 ">Add</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>

    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Produto</th>
            <th>Detalhes</th>
            <th>Código</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $product->image }}" width="100px" height="50px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->bar_code }}</td>
                <td>
                    <form action="" method="post">
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info">Show</a>

                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
@endsection

@section('script')

    <script>
        console.log('Hi!');
    </script>

@endsection
