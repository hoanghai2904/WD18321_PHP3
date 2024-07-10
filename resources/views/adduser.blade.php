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
    <div class="container">
        <form action="{{route('users.addPostUsers')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">name </label>
              <input type="" class="form-control" name="nameUser">
            </div>
            
            <div class="mb-3"> 
              <label for="exampleInputPassword1" class="form-label">email</label>
              <input type="email" class="form-control" name="emailUser">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phòng Ban </label>
               <select name="phongbanUser" id="">
                    @foreach ($phongban as $item)
                        <option value="{{$item->id}}">{{$item->ten_donvi}}</option>
                    @endforeach
               </select>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Tuổi</label>
                <input type="text" class="form-control" name="tuoiUser">
              </div>
       
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    
</body>
</html>