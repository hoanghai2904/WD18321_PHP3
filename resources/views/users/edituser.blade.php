<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Edit User</title>
    
</head>
<script>
    function confirmEdit(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form
        var confirmation = confirm("Bạn có muốn sửa không?");
        if (confirmation) {
            event.target.submit(); // Gửi form nếu người dùng chọn OK
        }
    }
</script>
<body>
    <div class="container">
        <form action="{{ route('users.updateUsers', ['idUser' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="nameUser" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="emailUser" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="phongban" class="form-label">Phòng Ban</label>
                <select name="phongbanUser" id="phongban" class="form-control">
                    @foreach ($phongban as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $user->phongban_id ? 'selected' : '' }}>{{ $item->ten_donvi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tuoi" class="form-label">Tuổi</label>
                <input type="text" class="form-control" id="tuoi" name="tuoiUser" value="{{ $user->tuoi }}">
            </div>
            <button type="submit" class="btn btn-primary" >Update</button>
        </form>
    </div>
</body>
</html>