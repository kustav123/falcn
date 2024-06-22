<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Suppliers::select([
                'id as sid',
                'merchant_name',
                'mobile',
                'email',
                'address',
                'due_ammount',
                'gst',
                'remarks'
            ])->where('status', 1);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('admin.supplier.action', compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    return view('admin.supplier.index');
  }

  public function store(Request $request)
  {
      $msg = "";
      $purpose = $request->purpose;
      if ($purpose == 'insert') {
          $request->validate([
              'name' => 'required',
              'mobile' => 'required|numeric|digits:10|unique:supplier,mobile'
          ], [
              'mobile.unique' => 'The mobile number you entered is already added as supplier.'
          ]);


          Suppliers::create([
              'id' => 'S_' . mt_rand(1111, 9999),
              'merchant_name' => $request->name,
              'email' => $request->email,
              'mobile' => $request->mobile,
              'address' => $request->address,
              'gst' => $request->gst,
              'remarks' => $request->remarks,
              'status' => '1',
              'created_by' => Auth::user()->id
          ]);

          $msg = "Successfully supplier created";

      } else if ($purpose == 'update') {
          $request->validate([
              'id' => 'required',
              // 'email' => 'required|string|email',

          ]);
        //   Log::info('User data fetched:', ['user' => $request->id]);

          Suppliers::where('id', $request->id)->update([
              'merchant_name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'gst' => $request->gst,
              'remarks' => $request->remarks,
          ]);
          $msg = "Successfully updated supplier";
      }

      return response()->json([
          "status" => true,
          "message" => $msg,
      ]);
  }

  public function edit(Request $request)
  {


      $user  = Suppliers::select([

            'id as sid',
            'merchant_name',
            'mobile',
            'email',
            'address',
            'gst',
            'remarks'

        ])->where(['id' => $request->id]
      )->first();
    //   Log::info($user);


      return response()->json($user);
  }

  // public function destroy(Request $request)
  // {
  //     $user = Client::where('id', $request->id)->delete();

  //     return Response()->json($user);
  // }
  public function disable(Request $request)
  {
      $user = Suppliers::where('id', $request->id)->update([
          'status' => '0'

      ]

      );

      return Response()->json($user);

  }
}




