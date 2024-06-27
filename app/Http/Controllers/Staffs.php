<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables as DataTables;

class Staffs extends Controller
{
    private $ROLE_STAFF = 'ST';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'email'])->where('role', $this->ROLE_STAFF);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.staff.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.staff.index');
    }

    public function store(Request $request)
    {
        $msg = "";
        $purpose = $request->purpose;
        if ($purpose == 'insert') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|string|email|unique:appuser',
            ]);

            User::create([
                'id' => 'ST_' . mt_rand(1111, 9999),
                'name' => $request->name,
                'email' => $request->email,
                'role' => $this->ROLE_STAFF,
                'password' => bcrypt($request->password),
            ]);
        cache()->forget('userlist');
            $msg = "Successfully staff created";
        } else if ($purpose == 'update') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|string|email',
            ]);
            if ($request->changePassword == 'on') {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
                cache()->forget('userlist');

            } else {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
            }
            $msg = "Successfully updated staff";
        }

        return response()->json([
            "status" => true,
            "message" => $msg,
        ]);
    }

    public function edit(Request $request)
    {
        $user  = User::select(['id', 'name', 'email'])->where(['id' => $request->id, 'role' => $this->ROLE_STAFF])->first();

        return response()->json($user);


    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        cache()->forget('userlist');

        return Response()->json($user);
    }

    public function liststuff(Request $request)
    {
        $user =  Cache::rememberForever('userlist', function () {
            return User::select([
                'id', 'name'
                ])
                ->where('status',1)
                ->get();
            });
            return response()->json($user);

    }
}
