<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Items::select(['id as userId', 'name']);
            // ->where('status', '>', '1'); //Grater Than
            // ->where('status', '1'); //Equal to

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.items.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.items.index');
    }

    public function store(Request $request)
    {
        $msg = "";
        $purpose = $request->purpose;
        if ($purpose == 'insert') {
            $request->validate([
                'name' => 'required',
            ]);

            Items::create([
                'name' => $request->name,  
            ]);

            $msg = "Successfully item created";
        } else if ($purpose == 'update') {
            $request->validate([
                'name' => 'required',                
            ]);      
            Items::where('id', $request->id)->update([
                'name' => $request->name,
            ]);
            $msg = "Successfully updated item";
        }

        return response()->json([
            "status" => true,
            "message" => $msg,
        ]);
    }

    public function edit(Request $request)
    {
        $user  = Items::select(['id as userId', 'name'])->where(['id' => $request->id])->first();

        return response()->json($user);
    }

    public function destroy(Request $request)
    {
        $user = Items::where('id', $request->id)->delete();

        return Response()->json($user);
    }
}
