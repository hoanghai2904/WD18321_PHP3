<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Edit Product Form</h1>
    <div class="container">
        <form action="{{ route('product.updateProducts',['idProduct' => $product->id]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameProduct" name="nameProduct" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="priceProduct" class="form-label">Price</label>
                <input type="text" class="form-control" id="priceProduct" name="priceProduct" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="viewProduct" class="form-label">View</label>
                <input type="text" class="form-control" id="viewProduct" name="viewProduct" value="{{ $product->view }}">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="text" class="form-control" id="category_id" name="nameCategory_id" value="{{ $product->category_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>