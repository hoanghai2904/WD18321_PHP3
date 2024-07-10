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
    <h1>Danh sách user</h1>
    <a href="{{ route('users.addUsers')}}"><button type="button" class="btn btn-primary">Thêm</button></a>
    {{-- <a href="" class="btn btn-primary">Thêm</a> --}}
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Tuoi</th>
                <th>phong ban</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->tuoi }}</td>
                    <td>{{ $item->ten_donvi }}</td>
                    <td>
                        <a href="{{route('users.deleteUsers', $item->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this item?')">Xoá</a> | 
                        <a href="{{route('users.editUser', $item->id) }}" class="btn btn-success">Sửa</a>
                    </td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
