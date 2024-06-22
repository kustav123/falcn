<?php

namespace App\Http\Controllers;

use App\Models\Finishproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
class FinishproductController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Finishproducts::select([
                'id as fid',
                'name',
                'unit',
                'current_stock',
                'remarks'
            ])->where('status', 1);

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('inv.finish.action', compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    return view('inv.finish.index');
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

          Finishproducts::create([
              'id' => 'F_' . mt_rand(1111, 9999),
              'name' => $request->name,
              'unit' => $request->unit,
              'remarks' => $request -> remarks,
              'status' => '1',
              'created_by' => Auth::user()->id

          ]);

          $msg = "Successfully Product created";

      } else if ($purpose == 'update') {
          $request->validate([
              'id' => 'required',
              // 'email' => 'required|string|email',

          ]);
        //   Log::info('User data fetched:', ['user' => $request->id]);

          Finishproducts::where('id', $request->id)->update([
              'remarks' => $request->remarks,
          ]);
          $msg = "Successfully  products updated";
      }

      return response()->json([
          "status" => true,
          "message" => $msg,
      ]);
  }
  public function edit(Request $request)
  {


      $user  = Finishproducts::select([

        'id as fid',
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
      $user = Finishproducts::where('id', $request->id)->update([
          'status' => '0'

      ]

      );

      return Response()->json($user);

  }
}

