@extends('admin.layout.index')

@push('styles')
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{route('admin.product.addPostProducts')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Ten san pham</label>
                <input type="text" class="form-control" id="nameProduct" name="nameProduct" placeholder="Ten San Pham">
                
            </div>
            <div class="mb-3">
                <label for="priceProduct" class="form-label">Gia san pham</label>
                <input type="text" class="form-control" id="priceProduct" name="priceProduct" placeholder="Gia San Pham">
            </div>
            <div class="mb-3">
                <label for="descriptionProduct" class="form-label">Mo ta san pham</label>
                <input type="text" class="form-control" id="descriptionProduct" name="descriptionProduct" placeholder="Mo ta San Pham">
            </div>
            <div class="mb-3">
                <label for="imageProduct" class="form-label">Anh san pham</label>
                <br>
                <input type="file" id="imageProduct" name="imageProduct" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('script')
@endpush
