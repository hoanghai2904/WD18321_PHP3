<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f7f6;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    thead {
        background-color: #009879;
        color: #ffffff;
    }

    tbody tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Danh Sách Sản Phẩm</h1>
        </div>
        <form action="{{ route('product.searchProduct') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search products..." name="query">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <a href="{{ route('product.addProduct') }}"><button type="button" class="btn btn-primary">Thêm</button></a>
        <br>
      <br>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>view</th>
                    <th>create_at</th>
                    <th>update_at</th>
                    <th>Thao tac</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->view }}</td>
                        <td>{{ $product->create_at }}</td>
                        <td>{{ $product->update_at }}</td>
                        <td>
                            <a href="{{ route('product.deleteProduct', $product->id) }}" class="btn btn-warning"
                                onclick="return confirm('Are you sure you want to delete this item?')">Xoá</a> |
                            <a href="{{ route('product.editProduct', $product->id) }}" class="btn btn-success">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
