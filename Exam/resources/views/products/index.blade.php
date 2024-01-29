@extends('products.layout') {{--Thừa hưởng layout từ file products.layout--}}

@section('content') {{--định nghĩa phần nội dung chính của trang --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Exam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">Create New Contact</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success')) {{--Kiểm tra xem có thông báo thành công đc lưu trong session --}}
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->detail}}</td>
            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn tbn-primary" href="{{route('products.edit',$product->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!!$products->links() !!}
@endsection
