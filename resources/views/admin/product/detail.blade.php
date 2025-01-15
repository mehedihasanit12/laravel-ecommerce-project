@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Product Id</td>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <td>Product Code</td>
                            <td>{{$product->code}}</td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td>{{isset($product->category->name) ? $product->category->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Product Sub Category</td>
                            <td>{{isset($product->subCategory->name) ? $product->subCategory->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Product Brand</td>
                            <td>{{isset($product->brand->name) ? $product->brand->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Product Unit</td>
                            <td>{{isset($product->unit->name) ? $product->unit->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Product Regular Price</td>
                            <td>{{$product->regular_price}}</td>
                        </tr>
                        <tr>
                            <td>Product Selling Price</td>
                            <td>{{$product->selling_price}}</td>
                        </tr>
                        <tr>
                            <td>Product Stock Amount</td>
                            <td>{{$product->stock}}</td>
                        </tr>
                        <tr>
                            <td>Product Short Description</td>
                            <td>{{$product->short_description}}</td>
                        </tr>
                        <tr>
                            <td>Product Long Description</td>
                            <td>{!! $product->long_description !!}</td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                            <td>
                                <img src="{{asset($product->image)}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Product Other Image</td>
                            <td>
                                @foreach($product->otherImage as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="">
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Product Meta Title</td>
                            <td>{{$product->meta_title}}</td>
                        </tr>
                        <tr>
                            <td>Product Meta Description</td>
                            <td>{{$product->meta_description}}</td>
                        </tr>
                        <tr>
                            <td>Product Total View</td>
                            <td>{{$product->hit_count}}</td>
                        </tr>
                        <tr>
                            <td>Product Total Sale</td>
                            <td>{{$product->sales_count}}</td>
                        </tr>
                        <tr>
                            <td>Product Featured Status</td>
                            <td>{{$product->feature_status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
