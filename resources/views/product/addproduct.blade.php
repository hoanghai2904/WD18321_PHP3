<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
  <h1>Thêm</h1>
    <div class="container">
        <form action="{{route('product.addPostProduct')}}" method="POST">
            @csrf
            
            <div class="mb-3">
              <label for="" class="form-label">name</label>
              <input type="" class="form-control" name="nameProduct">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">price</label>
              <input type="" class="form-control" name="priceProduct">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">view</label>
              <input type="" class="form-control" name="viewProduct">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">categoy_id</label>
              <input type="" class="form-control" name="nameCategory_id">
            </div>
            {{-- <div class="mb-3">
              <label for="" class="form-label">categoy_id</label>
             <select name="nameCategory_id" id="">
                  @foreach ($category as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
             </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    
</body>
</html>