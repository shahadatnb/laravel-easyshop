<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Wallet;
use App\CurrentWallet;
use App\EarnWallet;
use App\AdminWallet;
use App\Setting;
use App\UserPin;
use Session;
use Auth;

class AdminController extends Controller
{   use Wallet;

    public function index()
    {
       $setting = Setting::where('status',1)->get();
        return view('admin.dashboard')->withSettings($setting);
    }

    public function sendMoney()
    {
        $transaction = AdminWallet::where('admin_id',Auth::User()->id)->latest()->paginate(20);
        $users= $this->userArray();

        return view('admin.sendMoney',compact('transaction','users'));
    }

    public function withdrawWetting()
    {
        $tran = AdminWallet::where('payment','>',0)->latest()->paginate(20);
        return view('admin.withdraw')->withTransaction($tran);
    }

    public function withdrawConfirm($id)
    {
        $data = AdminWallet::find($id);
        $data->confirm =1;
        $data->confirm_by = Auth::User()->id;
        $data->save();
        return redirect()->route('withdrawWetting');
    }

    public function postSendMoney(Request $request)
    {
       	$data = new AdminWallet;
        $data->user_id = $request->user_id;
        $data->receipt = $request->receipt;
        $data->remark =  'Main W. Sent By: '.Auth::User()->name;
        $data->admin_id = Auth::User()->id;
        $data->save();
       	
        $data2 = new CurrentWallet;
        $data2->user_id = $request->user_id;
        $data2->receipt = $request->receipt;
        $data2->remark = 'Receipt Form Admin';
        $data2->save();

       	Session::flash('success','Money Sent');
        return redirect()->route('sendMoney');
    }

    public function sendToIncome(Request $request)
    {
        $data = new AdminWallet;
        $data->user_id = $request->user_id;
        $data->receipt = $request->receiptAmt;
        $data->remark =  'Incomw W. Sent By: '.Auth::User()->name;
        $data->admin_id = Auth::User()->id;
        $data->save();

        $data2 = new EarnWallet;
        $data2->user_id = $request->user_id;
        $data2->receipt = $request->receiptAmt;
        $data2->adminWid = Auth::User()->id;
        $data2->remark = 'Receipt Form Admin';
        $data2->save();

        Session::flash('success','Money Sent');
        return redirect()->route('sendMoney');
    }

    public function paymentMoney(Request $request)
    {
        $data = new AdminWallet;
        $data->user_id = $request->user_id;
        $data->payment = $request->payment;
        $data->remark =  'Balance Payment By: '.Auth::User()->name;
        $data->admin_id = Auth::User()->id;
        $data->save();

        $data2 = new CurrentWallet;
        $data2->user_id = $request->user_id;
        $data2->payment = $request->payment;
        $data2->remark = 'Payment';
        $data2->save();
        

        Session::flash('success','Withdraw Complite');
        return redirect()->back();
    }

    public function pin(){
        $UserPin = UserPin::where('created_by',Auth::User()->id)->latest()->paginate(20);
        return view('admin.pin-generator')->withPin($UserPin);
    }


   public function pingenarate(){
        //echo str_random(8);exit;
        if(Auth::User()->admin == 1){
            $i = 0;
            while( $i < 5){
                $pin = str_random(8);
                $d = UserPin::where('pin',$pin)->pluck('pin')->first();
                if($d==null){
                    $data = new UserPin;
                    $data->pin = $pin;
                    $data->created_by = Auth::User()->id;
                    $data->save();
                    $i++;
                }                
            }
                        
            Session::flash('success','Successfully Genarated');
        }
        return redirect()->back();
    }




    public function saveSetting(Request $request, $id)
    {
        $data = Setting::find($id);
        $data->value = $request->value;
        $data->save();

        Session::flash('success','Setting Seved');
        return redirect()->route('admin.panel');
    }
}
