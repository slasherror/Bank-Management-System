<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use App\Models\Replay;
use App\Models\User;
use App\Models\Notification;

class FeedbackController extends Controller
{
     public function storeReply(Request $request)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required',
            'feedback_id' => 'required|exists:feedback,id',
            'user_id' => 'required|exists:users,uid'
        ]);

        // Create a new replay record
        $replay = new Replay();
        $replay->message = $request->message;
        $replay->feedback_id = $request->feedback_id;
        $replay->user_id = $request->user_id;
        $replay->save();

        // Optionally, you can update the 'replied' column in the feedback table
        $feedback = Feedback::findOrFail($request->feedback_id);
        $feedback->replied = true;
        $feedback->save();

        return redirect()->back()->with('success', 'Reply stored successfully!');
    }

    public function adminFeedback(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $user = Auth::user();
                $customerdata = user::find(Auth::id());
                $feedbacks = Replay::where('user_id', $customerdata->uid)->get();
                return view('user.customer.feedback', compact('user', 'feedbacks'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function frontendNotification(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $user = Auth::user();
                $customerdata = user::find(Auth::id());
                $feedbacks = Notification::all();
                return view('user.customer.notofication', compact('user', 'feedbacks'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function adminNotification(){
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $employeedata= User::find(Auth::id());
                $notifications = Notification::all();
                
                return view('employee.notification',compact('notifications','employeedata'));
            } 
            else {
                return redirect()->back();
            }
        } 
        else {
            return redirect('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'notification' => 'required|string|max:255',
        ]);

        // Assuming you have a Notification model and notifications table
        Notification::create([
            'data' => $request->notification,
        ]);
        
        return redirect()->route('notification');
    }

    public function delete(Request $request, $id)
    {
        $Notification = Notification::find($id);

        if (!$Notification) {
            return redirect()->back()->with('error', 'notifications not found.');
        }

        $Notification->delete();

        return redirect()->back()->with('success', 'notifications deleted successfully!');
    }
}
