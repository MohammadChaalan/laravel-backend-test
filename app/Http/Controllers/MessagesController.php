<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;

class MessagesController extends Controller
{
    public function index()
    {
       return Messages::select('id','name','email','message')->get();
       
    }

    public function showMessages(){

        $message = Messages :: get();
        return view('messages.main' , compact('message'));
    }
    public function showOneMessages($id){


        // Retrieve the Meesage by ID 
        $message = Messages::findOrFail($id);
        
    
    
        // Return the view with the retrieved messages
        return view('messages.viewone', compact('message'));
    
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        Messages::create($request->post());
        return response()->json([
            'message'=>'Item added successfully'
        ]);

      
    }

 
    public function show(Messages $messages)
    {
        return response()->json([
            'messages' => $messages
        ]);
    }
 
 
    public function update(Request $request, Messages $messages)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);

        $messages->fill($request->post())->update();


        


        return response()->json([
            'message' => 'Item updated successfully'
        ]);
    }

}
