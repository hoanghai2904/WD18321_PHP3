@extends('admin.layout.index')

@push('styles')
    <style>
        .img-product{
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{route('admin.product.updateProducts',$products->product_id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Ten san pham</label>
                <input type="text" class="form-control" id="nameProduct" name="nameProduct" value="{{$products->name}}" placeholder="Ten San Pham">
            </div>
            <div class="mb-3">
                <label for="priceProduct" class="form-label">Gia san pham</label>
                <input type="text" class="form-control" id="priceProduct" name="priceProduct" value="{{$products->price}}" placeholder="Gia San Pham">
            </div>
            <div class="mb-3">
                <label for="descriptionProduct" class="form-label">Mo ta san pham</label>
                <input type="text" class="form-control" id="descriptionProduct" name="descriptionProduct" value="{{$products->description}}"  placeholder="Mo ta San Pham">
            </div>
            <div class="mb-3">
                <label for="imageProduct" class="form-label">Anh san pham</label>
                <br>
                <img src="{{asset($products->image)}}" alt="" class="img-product"> 
                <br>
                <br>
                <input type="file" id="imageProduct" name="imageProduct" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Chinh Sua</button>
        </form>
    </div>
@endsection

@push('script')
@endpush
