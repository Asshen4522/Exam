<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class FunctionController extends Controller
{

    public function panel()
    {
        //dd($_SERVER);
        $user=Auth::user();
        if (!$user){
            return redirect('/main');
        }
        else{
            if($user['role_id']==2){
                if ($_SERVER["PATH_INFO"]=="/admin") {
                    return view('admin');
                }else{
                    return redirect('/admin');
                }

            }
            elseif($user['role_id']==1){

                if ($_SERVER["PATH_INFO"]=="/cabinet") {
                    $categories = Category::all();
                    return view('cabinet', ['categories' => $categories]);
                }else{
                    return redirect('/cabinet');
                }

            }
            else{
                return redirect('/main');
            }
        };
    }
}
