<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class FunctionController extends Controller
{
    static function MainRequest()
    {

        $DataBase = DB::table('Orders')->get();
        $RequiredBase = [];
        $page = '';

        foreach ($DataBase as $BaseObject) {
            if ($BaseObject->status_id === 3) {
                $RequiredBase[] = [
                    'time' => $BaseObject->created_at,
                    'name' => $BaseObject->name,
                    'category' => $BaseObject->category_id,
                ];
            }
        }
        if (count($RequiredBase) > 4) {
            for ($i = 0; $i < 4; $i++) {
                $page .= '<div class="entry__orders font-reg"><div>' . $RequiredBase[$i]['time'] . '</div><div>' . $RequiredBase[$i]['name'] . '</div><div>' . $RequiredBase[$i]['category'] . '</div></div>';
            }
        } else {
            for ($i = 0; $i < count($RequiredBase); $i++) {
                $page .= '<div class="entry__orders font-reg"><div>' . $RequiredBase[$i]['time'] . '</div><div>' . $RequiredBase[$i]['name'] . '</div><div>' . $RequiredBase[$i]['category'] . '</div></div>';
            }
        }
        return $page;
    } 

    public function panel()
    {
        $user=Auth::user();
        if (!$user){
            return redirect('/main');
        }
        else{
            if($user['role_id']==2){
                if ($_SERVER["REDIRECT_URL"]=="/public/master") {
                    return view('master');
                }else{
                    return redirect('/master');
                }
                
            }
            elseif($user['role_id']==1){
                
                if ($_SERVER["REDIRECT_URL"]=="/public/cabinet") {
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
