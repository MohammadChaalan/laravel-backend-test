<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index()
    {
        // get all comment with all data for user
       
        $all = Comment::with('user')->select('id', 'name', 'user_id')->get();
        return response()->json(['comment' => $all], 200);
       
    }

    public function store(Request $request)
    {
        try {
            // validate
            $rules = [
                'comment' => 'required|string',
                
            ];

            $validator = Validator ::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }   

            
            // create new comment 
                    $new = new Comment();
                    $new->name = $request->name;
                    $new->user_id = $request->user_id;

                    // save data
                    $new->save();
                    return $this->returnSuccessMessage("Insert Done !");
             

         } catch (\Exception $ex) {
             return $this->returnError("E001", "Error occurent");
         }
    }

    public function createCommentForm()
    {
        // get all user and comment data
        $user = Auth::user();
        $comment=Comment::get();
        $users=User::get();

        // return view comment with 3 variable 
        return view('users.comment', compact('user','comment','users'));
    }

    public function createComment(Request $request){

        
            //Store Data
          $new = new Comment();
          $new->name = $request->name;
          $new->user_id = $request->user_id;
          
            $new->save();


            //Return success
            return redirect()->back();
        
    }
    }


