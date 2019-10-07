<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
class OrdersController extends Controller
{
    public function order_details(Request $request){
        $id= $request->order_id;
        $rules = [
            'order_id' => 'required'
        ];
        $validator = Validator::make( request()->all() , $rules);
        if($validator->fails()){
            result( false, $validator->messages(), null);
        }
        else{
            $data = DB::table('order_details')
            ->where('order_details.order_id',$id)
            ->get();
            for($i = 0; $i < count($data);$i++){
                $course_image = "public/courses_images/".$data[$i]->course_image;
                $data[$i] ->course_image =$course_image;
            }
            
            if(empty($data)){
                result( false, 'fail', null);
            }else{
                $OrderData = [
                    'order' => $data
                ];
                result( true, 'success', $OrderData);
            }
           
           
        }
    }
    
    
}


