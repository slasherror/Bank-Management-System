<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Transactionmethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

// use DB;
// use App\Http\Requests;
// use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $user = User::all();
                return view('user.home',compact('user'));
            } 
            else if(Auth::user()->usertype == '1') {
                $employeedata= User::find(Auth::id());

                $transactionmethod=transactionmethod::find(1);

                $info=Transaction::orderBy('id','desc')->get();

                $customerdata = User::all();

                return view('employee.home',compact('employeedata','transactionmethod','info','customerdata'));
            }
            // else if(Auth::user()->usertype == '2') {
            //     $admindata= User::find(Auth::id());
            //     return view('admin.home',compact('admindata'));
            // }
            else{
                return redirect('home');
            }
            
        } 
        else {
            return view('user.home');
        }
    }

    public function index()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $user = User::all();
                return view('user.home',compact('user'));
            } 
            else if(Auth::user()->usertype == '1') {
                $employeedata= User::find(Auth::id());

                $transactionmethod=transactionmethod::find(1);

                $info=Transaction::orderBy('id','desc')->get();

                $customerdata = User::all();

                return view('employee.home',compact('employeedata','transactionmethod','info','customerdata'));
            }
            // else if(Auth::user()->usertype == '2') {
            //     $admindata= User::find(Auth::id());
            //     return view('admin.home',compact('admindata'));
            // }
            else{
                return redirect('home');
            }
            
        } 
        else {
            return view('user.home');
        }
        
    }

    public function account(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                // $userid=Auth::user()->id;
                $customerdata=user::find(Auth::id());
                return view('user.customer.account',compact('customerdata'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function accountstatement(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                 $userid=Auth::user()->id;
                 $customerdata=user::find(Auth::id());
                // return view('user.customer.accountstatement',compact('data'));
                $info=Transaction::orderBy('id','desc')->get();
                // $data=$data->reverse();
                return view('user.customer.accountstatement',compact('customerdata','info'));

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    }

    public function fundtransfer(Request $request)
    {
        $search = $request->input('search');
        $customerdata = auth()->user();

        $customers = [];

        if ($search) {
            $customers = User::where('id', $search - 100000)->get();
        }

        return view('user.customer.fundtransfer', compact('search', 'customerdata', 'customers'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'transfermoney' => 'required|numeric',
            'sender_id' => 'required|numeric',
            'receiver_id' => 'required|numeric',
        ]);

        $transferAmount = $request->input('transfermoney');
        $senderId = $request->input('sender_id');
        $receiverId = $request->input('receiver_id');

        $sender = User::find($senderId);
        $receiver = User::find($receiverId);

        if ($sender && $receiver) {
            if($transferAmount<0){
                Alert::error('Negative Balance', 'Please enter valid amount');
            }
            else if($transferAmount==0){
                Alert::error('Opps!', 'Please enter an amount');
            }
            else if ($transferAmount > $sender->balance) {
                Alert::error('Insufficient Balance', 'The transfer amount exceeds your account balance.');
            } 
            else {
                $sender->balance -= $transferAmount;
                $receiver->balance += $transferAmount;

                $sender->save();
                $receiver->save();

                $transaction=new transaction();
                $transaction->from= $sender->uid;
                $transaction->to= $receiver->uid;
                $transaction->date= Carbon::now()->format('Y-m-d');
                $transaction->time=Carbon::now()->format('H:i:s');
                $transaction->message="Transferred Tk $transferAmount from account $sender->uid to account $receiver->uid at $transaction->date, $transaction->time";
                $transaction->save();

                $transactionmethod=transactionmethod::find(1);
                $transactionmethod->transfer+=$transferAmount;
                $transactionmethod->total+=$transferAmount;
                $transactionmethod->save();

                Alert::success('Transfer Successful', 'Money has been transferred successfully.');
            }
        } else {
            Alert::error('Invalid Accounts', 'Receiver accounts are invalid.');
        }

        return redirect()->route('fundtransfer');
    }

    public function balance(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $user= User::find(Auth::id());
                if($user->balance==0){
                    Alert::success('Your current balance is 0',' Requested to deposit');
                }
                else{
                    Alert::success('Your current balance is Tk' ,$user->balance);
                }
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        return redirect()->back();
    }
    public function customerservice(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $search=$request['search'] ?? "";
                if($search!=""){
                    //where
                    // $customers=user::where('user_name','=',$search)->get();
                    $customers=user::where('uid','=',$search)->orWhere('name','LIKE',"%$search%")->get();
                }
                else{
                    $customers=user::all();
                }
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
        $data=compact('customers','search');
        return view('employee.customerservice')->with($data);
    }

    public function discovermore()
    {
        return view('user.home.about');
    }

   

    public function sendfeedback(Request $request)
    {
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $data = User::find($request->input('id'));

                $feedback = new Feedback();
                $feedback->from = Auth::user()->uid;
                $feedback->name = $request->input('name');
                $feedback->email = $request->input('email');
                $feedback->subject = $request->input('subject');
                $feedback->reason = $request->input('reason');
                $feedback->date = Carbon::now()->format('Y-m-d');
                $feedback->time = Carbon::now()->format('H:i:s');
                $feedback->save();

                Alert::success('Message Sent Successfully', 'Admin will reply you soon');
                
            }
            else{
                Alert::error('You are logged out', 'Login in first');
                return redirect()->back();
            }
        }
        else{
            Alert::error('You are logged out', 'Login in first');
            // return redirect()->back();
            return redirect('login');
        }
        Alert::error('Something went wrong', '!!!!');
        return redirect()->back();
    }

    public function notavailable(){
        if(Auth::id()){
            if(Auth::user()->usertype==1 || Auth::user()->usertype==1){
                Alert::info('Not available for now!','Update is coming soon');
            }
            else{
                Alert::error('Something went wrong!','Try again later');
            }
        }
        return redirect()->back();
    }

    public function login(){
        return view('auth.login');
    }

    public function loginSubmit(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function register(){

        return  view('auth.register');
    }
    public function post_register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
          //  'name'  => 'required',
              'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->uid = User::max('uid') + 1;
        
        $user->save();

        return redirect()->route('login');
        
    }
}
