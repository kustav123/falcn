<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Items;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Items::select(['id', 'name', 'accessary', 'complain', 'make', 'remarks', 'status', 'created_by', 'created_at']) ->where('status',1);
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
                'name' => 'required|unique:item,name',
            ], [
                'name.unique' => 'The Name you entered is already added as Product.'
            ]);

            Items::create([
                'name' => $request->name,
                'accessary' => $request -> accessary,
                'complain' => $request -> complain,
                'make' => $request -> make,
                'remarks' => $request -> remarks,
                'status' => '1',
                'created_by' => Auth::user()->id
            ]);
            $msg = "Successfully item created";
        } else if ($purpose == 'update') {
            $request->validate([
                'id' => 'required',
            ]);
            Items::where('id', $request->id)->update([
                'accessary' => $request -> accessary,
                'complain' => $request -> complain,
                'make' => $request -> make,
                'remarks' => $request -> remarks,
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

        $user  = Items::select(['id', 'name', 'accessary', 'complain', 'make', 'remarks'])->where(['id' => $request->id])->first();

        return response()->json($user);
    }
    public function disable(Request $request)
    {
        $user = Items::where('id', $request->id)->update([
            'status' => '0'
        ]
        );

        return Response()->json($user);
    }
}
