<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    // function showUser(){
    //     // $user = [
    //     //     [
    //     //         'id' => '1',
    //     //         'name' => 'hai'

    //     //     ],
    //     //     [
    //     //         'id' => '2',
    //     //         'name' => 'hai2'

    //     //     ],
    //     //     ];
    // //    return view('list')->with(['usezrs' => $user]);
    //     return view('list');
    // }

    function showUser()
    {
        // 1. lấy ra danh sách user
        // $listUsers = DB::table('users')->get();
        // dd($listUsers); 
        // hiển thị ra danh sách user

        // 2. Lấy thông tin user có id = 4 
        // sql : select * from users where id = 4
        // $result = DB::table('users')->where('id','=','4')->first();
        // $result = DB::table('users')-> find('4');
        // // hiển thị ra user 4
        // dd($result); 

        // 3. Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id','=','16')->value('name');
        //  dd($result); 

        //  4. Lấy danh sách id user của phòng ban 'Ban giám hiệu'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');
        // dd($result);

        // 5. Tìm user có độ tuổi lớn nhất trong công ty
        // $result = DB::table('users')-> where('tuoi', DB::table('users')->max('tuoi'))->get();
        // dd($result);

        // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')-> where('tuoi', DB::table('users')->min('tuoi'))->get();
        // dd($result);

        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
        // count : đếm
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->count();
        // dd($result);

        // 8. Lấy danh sách tuổi các user 
        // $result = DB::table('users')->distinct()->pluck('tuoi');
        // dd($result);

        //9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')->where('name','like','%Khải')->orWhere('name','like','%Thanh')->get();
        // dd($result);

        // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // get lấy toàn bộ ban đào tạo 
        // trước get thì select cột mà chúng ta cần 
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->select('id','name','email')->get();
        // dd($result);

        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // asc tăng dần , desc giảm dần
        // $result = DB::table('users')->where('tuoi', '>=' , '30')->select('id','name','tuoi')->orderBy('tuoi','asc')->get();
        // dd($result);

        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // offset dùng để bỏ qua bản ghi 
        // limit lấy gioi han 10
        // $result = DB::table('users')->select('id','name','tuoi')->orderBy('tuoi','desc')->offset(5)->limit(10)->get();
        // dd($result);

        // 13. Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Vũ Hoàng Hải',
        //     'email' => 'vuhoanghai@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '0',
        //     'tuoi' => '19',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];
        // DB::table('users')->insert($data);

        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->select('id', 'name', 'email')->get();
        // foreach ($result as $key) {
        //     DB::table('users')->where('id', $key->id)->update(['name'=>$key->name . 'PDT']);
        // }
        // dd($result);

        // 15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('songaynghi', '>','15')->delete();
    }

    // function getUser($id, $name = '')
    // {
    //     echo $id;
    //     echo "<br>";
    //     echo $name;
    // }

    // function updateUser(Request $request)
    // {
    //     echo $request->id;
    // }

    public function listUsers(){
        $listUsers = DB::table('users')
        ->join('phongban','phongban.id', '=' ,'users.phongban_id')
        ->select('users.id','users.name','users.tuoi','users.phongban_id','users.email','phongban.ten_donvi')
        ->get();
        return view('users.listuser')->with(['listUsers' => $listUsers]);
        //return ra file view users chỏ đến list
    }
    public function addUsers(){
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users.adduser')->with(['phongban'=>$phongban]);
    }

    public function addPostUsers(Request $request){
        $data = [
            'name' => $request->nameUser,
            'email' =>$request->emailUser,
            'phongban_id' => $request->phongbanUser,
            'tuoi' =>  $request->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);   
        return redirect()->route('users.listUsers');
    }

    public function deleteUsers($idUser){
        DB::table('users')-> where('id', $idUser)->delete();
        return redirect()->route('users.listUsers');
    }

    public function editUser($idUser){
        $user = DB::table('users')->where('id', $idUser)->first();
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users.edituser')->with(['user' => $user, 'phongban' => $phongban]);
    }
    
    public function updateUsers(Request $request, $idUser){
        $data = [
            'name' => $request->nameUser,
            'email' => $request->emailUser,
            'phongban_id' => $request->phongbanUser,
            'tuoi' => $request->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->where('id', $idUser)->update($data);  
        return redirect()->route('users.listUsers');
    }
}
