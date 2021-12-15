<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FunctionController extends Controller{
    static function MainRequest()
    {   

        $DataBase=DB::table('Orders')->get();
        $RequiredBase=[];
        $page='';

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
            for ($i=0; $i < 4; $i++) { 
                $page.='<div class="entry__orders font-reg"><div>' . $RequiredBase[$i]['time'] . '</div><div>' . $RequiredBase[$i]['name'] . '</div><div>' . $RequiredBase[$i]['category'] . '</div></div>';
            }
        }else {
            for ($i=0; $i < count($RequiredBase); $i++) { 
                $page.='<div class="entry__orders font-reg"><div>' . $RequiredBase[$i]['time'] . '</div><div>' . $RequiredBase[$i]['name'] . '</div><div>' . $RequiredBase[$i]['category'] . '</div></div>';
            }
        }
        

        echo $page;
    }
    }
    

?>