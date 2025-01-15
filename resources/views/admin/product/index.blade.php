@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>
                                <img src="{{asset($product->image)}}" height="50" alt="">
                            </td>
                            <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                                <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" onclick=" return confirm('Are you sure to delete this!')" ><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
