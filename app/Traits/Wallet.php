<?php 
namespace App\Traits;
use App\CurrentWallet;
use App\MyWallet;
use App\EarnWallet;
use App\PointValue;
use App\User;

trait Wallet
{
    public function earnBalance($id)
    {
        $receipt = EarnWallet::where('user_id',$id)->sum('receipt');
        $payment = EarnWallet::where('user_id',$id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function currentBalance($id)
    {
        $receipt = CurrentWallet::where('user_id',$id)->sum('receipt');
        $payment = CurrentWallet::where('user_id',$id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function myBalance($id)
    {
        $receipt = MyWallet::where('user_id',$id)->sum('receipt');
        $payment = MyWallet::where('user_id',$id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function myPv($id)
    {
        $receipt = PointValue::where('user_id',$id)->sum('receipt');
        $payment = PointValue::where('user_id',$id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function userArray()
    {
        $user = User::all();
        $users=array();
        foreach ($user as $data) {
            $users[$data->id]= $data->id.' '.$data->name;
        }
        return $users;
    }

    public function percentage($amt,$percentage){
        return ($percentage / 100) * $amt;
    }
}