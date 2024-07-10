<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>THONG TIN SINH VIEN</h1>
    <table border="1"> 
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>ma sv</th>
                <th>dia chi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $key):?> 
             <tr>
                <td><?= $key['id'] ?></td>
           
                <td><?= $key['name'] ?></td>
                <td><?= $key['masv'] ?></td>
                <td><?= $key['diachi'] ?></td>

             </tr>
              <?php endforeach; ?>
           
        </tbody>
    </table>
</body>
</html>