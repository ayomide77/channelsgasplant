<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\TicketResponse;
class AdminTicketController extends Controller
{
    
//     function __construct()
// {
//     $this->middleware('permission:list product|create product|edit product|delete product', ['only' => ['index','show']]);
//     $this->middleware('permission:create product', ['only' => ['create','store']]);
//     $this->middleware('permission:edit product', ['only' => ['edit','update']]);
//     $this->middleware('permission:delete product', ['only' => ['destroy']]);
// }

    // RETURN INDEX PAGE FOR TICKET VIEW
    public function index(){
        $tickets = Ticket::where('status',0)->get();
        return view('admin.ticket.index',compact('tickets'));
    }


    // RETURN INDEX PAGE FOR ATTENDED TICKET VIEW
    public function attended(){
        $tickets = Ticket::where('status',1)->get();
        return view('admin.ticket.attended',compact('tickets'));
    }

// SINGLE TICKET VIEW PAGE
    public function show($id){

    $ticket = Ticket::find($id);

    // dd($ticket);
    return view('admin.ticket.show',compact('ticket'));
    }


// REPLY USER  PAGE
    public function edit($id){

        $ticket = Ticket::find($id);

        return view('admin.ticket.edit',compact('ticket'));
    }


    // POST FUNCTION TO UPDATE USER RESPONSE
    public function update(Request $request,$id){


    //validate the field
    $request->validate([
        'response' => 'required',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $ticket = Ticket::find($id);
        $tickresponse = new TicketResponse();

        if($request->file != null){

        $fileName = time().'.'.$request->file->extension();  

        $request->file->move(public_path('/chnlsgasplant/images/ticket'), $fileName);

        $tickresponse->ticket_id = $ticket->id;
        $tickresponse->user_id = $ticket->user_id;
        $tickresponse->staff_id = \Auth::user()->id;
        $tickresponse->ticket_ref = $ticket->ticket_ref;
        $tickresponse->response = $request->response;
        $tickresponse->file = $fileName;
        
        }

        $tickresponse->ticket_id = $ticket->id;
        $tickresponse->user_id = $ticket->user_id;
        $tickresponse->staff_id = \Auth::user()->id;
        $tickresponse->response = $request->response;
      

        if($tickresponse->save()){

            $ticket->status = 1;
            $ticket->save();
            
        return  redirect()->back()->with('success','Ticket Response Created Successfully');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }
}
