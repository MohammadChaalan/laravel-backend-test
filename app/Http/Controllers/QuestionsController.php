<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Validator;



class QuestionsController extends Controller
{
    public function index()
        {
           
               $all = Messages::select('id','message')->get();
               return response()->json(['question' => $all], 200);
           
        }

        public function store(Request $request)
        {
            try {
                $rules = [
                    'content' => 'required|string',
                    
                ];
    
                $validator = Validator ::make($request->all(), $rules);
                if ($validator->fails()) {
                    $code = $this->returnCodeAccordingToInput($validator);
                    return $this->returnValidationError($code, $validator);
                }   

                
                        $new = new Messages();
                        $new->message = $request->message;
                        
                        $new->save();
                        return $this->returnSuccessMessage("Insert Done !");
                 

             } catch (\Exception $ex) {
                 return $this->returnError("E001", "Error occurent");
             }
        }

       

       

}
