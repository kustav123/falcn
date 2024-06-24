<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables as DataTables;


class Clients extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {


            // $data = Cache::rememberForever('client_main', function () {
            //     return Client::select([
            //         'id as userId',
            //         'name',
            //         'email',
            //         'mobile',
            //         'address',
            //         'status',
            //         'due_ammount',
            //         'gst',
            //         'job',
            //         'remarks',
            //         'created_by',
            //         'created_at'
            //     ])->where('status', 1)->get(); // Use get() to retrieve the collection
            // });
            $data = Client::select(['id as userId', 'name', 'email', 'mobile', 'address', 'status', 'due_ammount', 'gst', 'job', 'remarks', 'created_by', 'created_at']) ->where('status',1);
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
                'mobile' => 'required|numeric|digits:10|unique:client,mobile'
            ], [
                'mobile.unique' => 'The mobile number you entered is already added as client.'
            ]);


            Client::create([
                'id' => 'C_' . mt_rand(1111, 9999),
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'gst' => $request->gst,
                'remarks' => $request->remarks,
                'status' => '1',
                'created_by' => Auth::user()->id
            ]);

            $msg = "Successfully client created";
            Cache::forget('act_users');
            Cache::forget('total_client');
            Cache::forget('client_main');
        } else if ($purpose == 'update') {
            $request->validate([
                'id' => 'required',
                // 'email' => 'required|string|email',
            ]);
            Client::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'gst' => $request->gst,
                'remarks' => $request->remarks,
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
        $user  = Client::select(['id as userId', 'name', 'email', 'mobile', 'address','gst', 'job'])->where(['id' => $request->id])->first();

        return response()->json($user);
    }

    // public function destroy(Request $request)
    // {
    //     $user = Client::where('id', $request->id)->delete();

    //     return Response()->json($user);
    // }
    public function disable(Request $request)
    {
        $user = Client::where('id', $request->id)->update([
            'status' => '0'

        ]

        );
        Cache::forget('act_users');
        Cache::forget('total_client');
        return Response()->json($user);

    }
    public function getcl(Request $request)
    {

        $user  = Client::select(['id as clid', 'name', 'email', 'mobile', 'address','gst', 'due_ammount', 'remarks'])->where(['mobile' => $request->mobile])->first();

        if (!$user) {
            return response()->json(['message' => 'ClientNotFound'], 404);
        }
        return response()->json($user);
    }

}
