<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTables;

class Clients extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select(['id as userId', 'name', 'email', 'mobile']);
            // ->where('status', $this->ROLE_STAFF);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.client.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.client.index');
    }

    public function store(Request $request)
    {
        $msg = "";
        $purpose = $request->purpose;
        if ($purpose == 'insert') {
            $request->validate([
                'name' => 'required',
                'email' => 'string|email|unique:client',
                'mobile' => 'required|numeric|digits:10'
            ]);

            Client::create([
                'id' => 'C_' . mt_rand(1111, 9999),
                'name' => $request->name,
                'email' => $request->email,   
                'mobile' => $request->mobile
            ]);

            $msg = "Successfully client created";
        } else if ($purpose == 'update') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|string|email',
            ]);      
            Client::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            $msg = "Successfully updated client";
        }

        return response()->json([
            "status" => true,
            "message" => $msg,
        ]);
    }

    public function edit(Request $request)
    {
        $user  = Client::select(['id as userId', 'name', 'email', 'mobile'])->where(['id' => $request->id])->first();

        return response()->json($user);
    }

    public function destroy(Request $request)
    {
        $user = Client::where('id', $request->id)->delete();

        return Response()->json($user);
    }
}