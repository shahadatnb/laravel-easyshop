<?php 
namespace App\Traits;
use App\AdminWallet;
use App\Wallet;
use App\PointValue;
use App\User;

trait Wallets
{
    public $wallets =[
        'widthrawWallet'=>'Widthraw wallet',
        'shoppingWallet'=>'Shopping wallet',
        'registerWallet'=>'Register wallet',
        'refferWallet'=>'Refer & generation bonus wallet',
        'autoWoardWallet'=>'Auto board wallet',
        'rankWallet'=>'Rank wallet',
    ];

    public function balance($id,$wType)
    {
        $receipt = Wallet::where('user_id',$id)->where('wType',$wType)->sum('receipt');
        $payment = Wallet::where('user_id',$id)->where('wType',$wType)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function allBalance($id){

        $balances = [];
            foreach ($this->wallets as $key=>$value) {
                $balances[$value] = $this->balance($id,$key);
            }
        return $balances;
    }

    public function listBalance($id,$wType)
    {
        $transaction = Wallet::where('user_id',$id)->where('wType',$wType)->latest()->take(10)->get();
        return $transaction;
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