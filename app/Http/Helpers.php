<?php 
    if(!function_exists('success'))
    {
        function result($status = null , $message = null , $data = null)
        {
            
                $resJson['status'] = array(
                    'type' => $status,
                    'message' => $message
                );
                if($data== null){
                    print_r(json_encode($resJson));
                }
                else{
                    $resJson['data']=$data;
                    print_r(json_encode($resJson));
                }
                
            
        }
    }