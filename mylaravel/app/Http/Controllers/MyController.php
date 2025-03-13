<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private function myprivate(){
        return 1;
    }
    function myfunction(Request $req , $var1=""){
        $data['myinput'] = $req->input('myinput', '');
        $data['myvalue'] = "";
        $data['multiplicationTable'] = [];

        // ตรวจสอบ $var1 หากไม่ว่าง
        if (!empty($var1) && preg_match('/^(\d+)\*(\d+)$/', $var1, $matches)) {
            $num1 = (int)$matches[1];
            $num2 = (int)$matches[2];
            $data['myvalue'] = $num1 * $num2;

            // สร้างตารางสูตรคูณ
            for ($i = 1; $i <= 12; $i++) {
                $data['multiplicationTable'][] = "$num1 x $i = " . ($num1 * $i);
            }
        } elseif (!empty($data['myinput']) && preg_match('/^(\d+)\*(\d+)$/', $data['myinput'], $matches)) {
            $num1 = (int)$matches[1];
            $num2 = (int)$matches[2];
            $data['myvalue'] = $num1 * $num2;

            // สร้างตารางสูตรคูณ
            for ($i = 1; $i <= 12; $i++) {
                $data['multiplicationTable'][] = "$num1 x $i = " . ($num1 * $i);
            }
        }

        return view('myview',$data);
    }
}
