<?php
namespace App\Http\helpers;
use Illuminate\Http\Exceptions\HttpResponseException;
class Helper{
public static function SendErr($message,$error=[],$code=401)

{
    
$response=['success'=>false,'message'=>$message];
if(!empty($error)){
    $response['data']=$error;
    
}
throw new HttpResponseException(response()->json($response,$code));
}
}

?>