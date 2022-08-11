<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Team;
use App\Models\Transaction;
use App\Models\Participant;

use Illuminate\Http\Request;
use Midtrans;
use Auth;
use DB;

class UserCompititionController extends Controller
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
    public static function slug($string) {
        $string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
    public function index()
    {
        $team = DB::Table('teams')
            ->join('competitions','teams.id_competitions','competitions.id')
            ->whereid_users(Auth::user()->id)
            ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions')
            ->get();

        return view('user.competition.index',  compact('team'));
    }
    public function create()
    {
        $competition = Competition::select(['id', 'name', 'status'])
                    ->where('status', 1)
                    ->get();

        return view('user.competition.create', compact('competition'));
    }
    public function post(Request $req)
    {
        $team = new Team;
        $team->id_users = Auth::user()->id;
        $team->id_competitions = $req->type;
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
            return view('user.competition.detail',  compact('snapToken', 'team', 'transaction'));
        }
        $teams = DB::Table('teams')
            ->where('teams.id',$id)
            ->where('teams.id_users',Auth::user()->id)
            ->first();
        // dd($teams);
        if($teams)
        {
            $team = DB::Table('teams')
                ->join('competitions','teams.id_competitions','competitions.id')
                ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions','competitions.price as price')
                ->where('teams.id',$id)
                ->where('teams.id_users',Auth::user()->id)
                ->first();
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $team->price,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'last_name' => '('.$team->name_competitions.')',
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
            $participant = DB::Table('participants')->where('id_teams',$id)->get();
            return view('user.competition.detail',  compact('id','snapToken', 'team', 'transaction','participant'));
        }
        return abort(404);
    }
    public function snap($id, Request $req)
    {
        $result = $req->input('result_data');
        $result = json_decode($result);
        if(empty($result->pdf_url))
        {
            $result->pdf_url = '';
        }
        // dd($result);
        $transaction = new Transaction;
        $transaction->id_relation = $id;
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
    public function add($id)
    {
        $participant = DB::Table('participants')
        ->join('teams','participants.id_teams','teams.id')
        ->select('participants.*','teams.*','teams.id as id_teams','teams.name as team_name')
        ->where('participants.id_teams',$id)
        ->where('teams.id_users',Auth::user()->id)
        ->get();
        if(count($participant)<3)
        {
            return view('user.competition.add',compact('participant','id'));
        }
        return redirect()->route('competition.detail',$id)->with('success','You already have 3 participants');
    }
    public function participantPost($id, Request $req)
    {
        $team = DB::Table('teams')
            ->join('competitions','teams.id_competitions','competitions.id')
            ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions')
            ->where('teams.id',$id)
            ->where('teams.id_users',Auth::user()->id)
            ->first();
        if($team)
        {
            $competition_name = $team->name_competitions;
            $path = $this->slug($competition_name).'/participant/';
            // dd($path);
            // $req->validate([
            //     'evidence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     'evidence[]' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            for($i=0;$i<count($req->nim);$i++)
            {
                $image_name[$i] = $team->name."_".$req->nim[$i]."_".$req->name[$i]."_".$team->level."_".$team->origin."_".time().".".$req->evidence[$i]->extension();
                if($req->evidence[$i]->move(public_path($path),$path.$image_name[$i]))
                {
                    $participant = new Participant;
                    $participant->id_teams = $id;
                    $participant->nim = $req->nim[$i];
                    $participant->name = $req->name[$i];
                    $participant->role = $req->role[$i];
                    $participant->evidence = $path.$image_name[$i];
                    $participant->save();
                }
                else
                {
                    return back()->with('error','something wrong..');
                }
            }
            return redirect()->route('competition.add',$id)->with('success','Added participant!');
        }
        return back();
    }
    public function participantEdit($id_teams,$id)
    {
        $participant = DB::Table('participants')
        ->join('teams','participants.id_teams','teams.id')
        ->select('participants.*','teams.*','teams.id as id_teams','teams.name as team_name','participants.name as name')
        ->where('participants.id',$id)
        ->where('participants.id_teams',$id_teams)
        ->where('teams.id_users',Auth::user()->id)
        ->first();
        if($participant)
        {
            return view('user.competition.edit',compact('participant'));
        }
        return abort(404);
    }
    public function participantEditPost($id_teams,$id,Request $req)
    {
        if(isset($_POST['delete']))
        {
            $delete = DB::Table('participants')
            ->join('teams','participants.id_teams','teams.id')
            ->select('participants.*','teams.*','teams.id as id_teams','teams.name as team_name')
            ->where('participants.id',$id)
            ->where('participants.id_teams',$id_teams)
            ->where('teams.id_users',Auth::user()->id)
            ->delete();
            if($delete)
            {
                return redirect()->route('competition.detail',$id_teams)->with('success','Deleted participant!');
            }
        }
        else
        {
            $participant = DB::Table('participants')
            ->join('teams','participants.id_teams','teams.id')
            ->select('participants.*','teams.*','teams.id as id_teams','teams.name as team_name')
            ->where('participants.id',$id)
            ->where('participants.id_teams',$id_teams)
            ->where('teams.id_users',Auth::user()->id)
            ->first();
            if($participant)
            {
                $team = DB::Table('teams')
                    ->join('competitions','teams.id_competitions','competitions.id')
                    ->select('teams.*','competitions.id as id_competitions','competitions.name as name_competitions')
                    ->where('teams.id',$id_teams)
                    ->where('teams.id_users',Auth::user()->id)
                    ->first();
                if($req->file('evidence'))
                {
                    $competition_name = $team->name_competitions;
                    $path = $this->slug($competition_name).'/participant/';
                    $image_name = $team->name."_".$req->nim."_".$req->name."_".$team->level."_".$team->origin."_".time().".".$req->evidence->extension();
                    if($req->evidence->move(public_path($path),$path.$image_name))
                    {
                        $update = Participant::where('id',$id)
                        ->update([
                            'nim' => $req->nim,
                            'name' => $req->name,
                            'evidence' => $path.$image_name,
                        ]);
                        if($update)
                        {
                            return redirect()->route('competition.detail',$id_teams)->with('success','Updated participant!');
                        }
                    }
                    else
                    {
                        return back()->with('error','something wrong..');
                    }
                }
                $update = Participant::where('id',$id)
                ->update([
                    'nim' => $req->nim,
                    'name' => $req->name,
                ]);
                if($update)
                {
                    return redirect()->route('competition.detail',$id_teams)->with('success','Updated participant!');
                }
            }
            return abort(404);
        }
    }
}
