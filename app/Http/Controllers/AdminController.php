<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user-access:admin');
    }

    /**
     * menampilkan list competition
     * 
     * @return [type]
     */
    public function list_competition() 
    {
        $competition = Competition::select(['id', 'name', 'price', 'status'])
                    ->where('status', 0)
                    ->get();

        return view('admin.competition.list', compact('competition'));
    }

    /**
     * Menampilkan view admin/competition/tambah
     * 
     * @return view admin/competition/tambah
     */
    public function tambah_competition() 
    {
        return view('admin.competition.tambah');
    }

    /**
     * Menambah data competition
     * 
     * @return [type]
     */
    public function tambah_competition_act(Request $req) 
    {
        $req->validate([
            'name'=> 'required|max:255',
            'price'=> 'required|numeric',
        ]);

        DB::transaction(function () use ($req){
            $competition = new Competition();
            $competition->name = $req->name;
            $competition->price = $req->price;
            $competition->save();
        });

        return redirect()->route('admin.list_competition')->with('sukses', 'Berhasil menyimpan data competition.');
    }

    /**
     * Menampilkan view admin/competition/update
     * 
     * @return view admin/competition/update
     */
    public function update_competition($id)
    {
        $data = Competition::select(['id', 'name', 'price', 'status'])
                    ->where([
                        ['status', 0],
                        ['id', $id],
                    ])->firstOrFail();

        return view('admin.competition.update', compact('data'));
    }

    /**
     * Mengubah data competition
     * 
     * @return [type]
     */
    public function update_competition_act(Request $req, $id) 
    {
        $req->validate([
            'name'=> 'required|max:255',
            'price'=> 'required|numeric',
        ]);

        DB::transaction(function () use ($req, $id) {
            $competition = Competition::findOrFail($id);
            $competition->name = $req->name;
            $competition->price = $req->price;
            $competition->update();
        });

        return redirect()->route('admin.list_competition')->with('sukses', 'Berhasil mengubah data competition.');
    }

    /**
     * menampilkan list team yang mengikuti lomba UI/UX
     * 
     * @return view
     */
    public function list_team_ui_ux() 
    {
        $team = DB::table('teams')
                ->join('users', 'users.id', '=', 'teams.id_users')
                ->join('transactions', 'transactions.id_relation', '=', 'teams.id')
                ->select('teams.*', 'users.name', 'users.id as id_users', 'users.name as name_user', 'teams.name as name_team')
                ->where('teams.id_competitions', 1)
                ->get();

        $empty = count($team);

        return view('admin.team.list_uiux', compact('team', 'empty'));
    }

    /**
     * menampilkan list team yang mengikuti lomba Web development
     * 
     * @return view
     */
    public function list_team_web() 
    {
        $team = DB::table('teams')
                ->join('users', 'users.id', '=', 'teams.id_users')
                ->join('transactions', 'transactions.id_relation', '=', 'teams.id')
                ->select('teams.*', 'users.name', 'users.id as id_users', 'users.name as name_user', 'teams.name as name_team')
                ->where('teams.id_competitions', 2)
                ->get();

        $empty = count($team);

        return view('admin.team.list_web', compact('team', 'empty'));
    }
}
