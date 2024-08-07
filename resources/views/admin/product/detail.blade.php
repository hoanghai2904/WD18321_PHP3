@extends('admin.layout.index')
@push('styles')
<style>
    .img-product{
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <p>
            Tên Sản Phẩm
            <span class="font-weight-bold">{{$products->name}}</span>
        </p>
        <p>
            Giá Sản Phẩm
            <span class="font-weight-bold">{{$products->price}}</span>
        </p>
        <p>
            Ảnh Sản Phẩm
           <img src="{{asset($products->image)}}" alt="" class="img-product">
        </p>
        <a href="{{route('admin.product.listProducts')}}" class="btn btn-info mt-3">Quay lai</a>
    </div>
@endsection

@push('script')
@endpush
