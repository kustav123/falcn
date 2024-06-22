<?php

namespace App\Http\Controllers;

use App\Models\Rawproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class RawproductController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            Log::info('User data fetched:', ['d']); // Log SQL query

            $data = Rawproducts::select([
                'id as rid',
                'name',
                'unit',
                'current_stock',
                'remarks'
            ])->where('status', 1);
            Log::info('User data fetched:', ['data' => $data->toSql()]); // Log SQL query

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('inv.raw.action', compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    return view('inv.raw.index');
  }

  public function store(Request $request)
  {
      $msg = "";
      $purpose = $request->purpose;
      if ($purpose == 'insert') {
          $request->validate([
              'name' => 'required',
              'unit' => 'required'
            ]);

          Rawproducts::create([
              'id' => 'S_' . mt_rand(1111, 9999),
              'name' => $request->name,
              'unit' => $request->unit,
              'remarks' => $request -> remarks,
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

          Rawproducts::where('id', $request->id)->update([
              'remarks' => $request->remarks,
          ]);
          $msg = "Successfully updated products";
      }

      return response()->json([
          "status" => true,
          "message" => $msg,
      ]);
  }

  public function edit(Request $request)
  {


      $user  = Rawproducts::select([

        'id as rid',
        'name',
        'unit',
        'remarks'

        ])->where(['id' => $request->id]
      )->first();
    //   Log::info($user);


      return response()->json($user);
  }

  public function disable(Request $request)
  {
      $user = Rawproducts::where('id', $request->id)->update([
          'status' => '0'

      ]

      );

      return Response()->json($user);

  }
}
