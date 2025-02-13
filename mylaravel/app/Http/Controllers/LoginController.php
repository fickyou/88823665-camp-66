<?php
/*
 * @Author: Nattapong Kamma Icezazarun@gmail.com
 * @Date: 2025-01-15 17:39:12
 * @LastEditors: Nattapong Kamma Icezazarun@gmail.com
 * @LastEditTime: 2025-01-15 18:03:42
 * @FilePath: \mylaravel\app\Http\Controllers\LoginController.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    function index(){
    return view('login');
    }
    function login (Request $req) {
        //print_r ($req->input());
        $user = User:: where ('email', $req->email)->first();
        //print_r ($user);
        if ($user !=null && Hash::check($req->password ,$user ->password)) {
            $req->session()->put('user', $user);
            return \redirect('users');
        }else {
            $req->session() ->flash('error', 'กรุณาตรวจสอบข้อมูลอีกครั้ง');
            return redirect ('/login');
        }
    }

}

