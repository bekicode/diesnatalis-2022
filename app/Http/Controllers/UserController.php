<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans;
use Auth;
use DB;
use App\Models\Team;
use App\Models\Transaction;

class UserController extends Controller
{
    //
    public function __construct()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $transaction = DB::Table('transactions')->get();
        foreach($transaction as $t)
        {
            $status = \Midtrans\Transaction::status($t->order_id);
            $update = DB::Table('transactions')->where('order_id',$t->order_id)
            ->update(['transaction_status'=>$status->transaction_status]);
        }
    }
    public function index()
    {
        $team = DB::Table('teams')
        ->join('competitions','teams.id_competitions','competitions.id')
        ->whereid_users(Auth::user()->id)
        ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions')
        ->get();
        return view('user.competition.index', ['team'=>$team]);
    }
    public function create()
    {

        return view('user.competition.create');
    }
    public function post(Request $req)
    {
        $team = new Team;
        $team->id_users = Auth::user()->id;
        $team->id_competitions = 1;
        $team->name = $req->name;
        $team->level = $req->level;
        $team->origin = $req->origin;
        if($team->save())
        {
            return redirect()->route('competition.detail',$team->id)->with(['checkout'=>'checkout']);
        }
    }
    public function detail($id)
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => ' ',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction = DB::Table('transactions')
        ->where('id_relation',$id)
        ->orderBy('id','desc')
        ->first();
        // if(!empty($transaction))
        // {
        //     $this->updateTransaction($transaction->order_id);
        // }
        $team = DB::Table('teams')
        ->join('competitions','teams.id_competitions','competitions.id')
        ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions')
        ->where('teams.id',$id)
        ->where('teams.id_users',Auth::user()->id)
        ->first();

        // dd($team);
        if($team)
        {
            return view('user.competition.detail',['snapToken'=>$snapToken,'team'=>$team,'transaction'=>$transaction]);
        }
        return abort(404);
    }
    public function snap(Request $req)
    {
        $result = $req->input('result_data');
        $result = json_decode($result);
        if(empty($result->pdf_url))
        {
            $result->pdf_url = '';
        }
        // dd($result);
        $transaction = new Transaction;
        $transaction->id_relation = $req->id;
        $transaction->order_id = $result->order_id;
        $transaction->transaction_id = $result->transaction_id;
        $transaction->payment_type = $result->payment_type;
        $transaction->gross_amount = substr($result->gross_amount, 0, -3);
        $transaction->transaction_status = $result->transaction_status;
        $transaction->pdf_url = $result->pdf_url;
        $transaction->transaction_time = $result->transaction_time;
        $transaction->save();
        return back();
    }
    public function check($orderId)
    {
        $status = \Midtrans\Transaction::status($orderId);
        var_dump($status);
    }
    public function updateTransaction($orderId)
    {
        $status = \Midtrans\Transaction::status($orderId);
        $update = DB::Table('transactions')->where('order_id',$orderId)
        ->update(['transaction_status'=>$status->transaction_status]);
    }
}
