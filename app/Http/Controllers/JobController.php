<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Jobsitem;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function index(Request $request)
    {


    }

    public function addnew(Request $request)
    {
        $msg = "";
        $purpose = $request->purpose;
        if ($purpose == 'insert') {
            // $request->validate([
            //     'name' => 'required',
            //     'unit' => 'required'
            //   ]);
        $sequence = DB::table('secuence')
        ->select('sno', 'head')
        ->where('type', 'job')
        ->lockForUpdate()
        ->first();


        // Calculate new job ID
        $head =  $sequence->head ;
        $newJobId = $sequence->sno + 1;
        $newJobId = str_pad($newJobId, 5, '0', STR_PAD_LEFT);
        $newJobId =  $head . '/' . $newJobId ;
        // Log::info('New Job ID: ' . $newJobId);
        Log::info( $request->complain);
        Jobs::create([
            'id' => $newJobId,
            'clid' => $request->clid,
            'status'=> "Open",
            'echarge'=> $request->rest
            ]);
            $accessary = implode(', ', $request->accessary);
            $complain = implode(', ', $request->complain);


            Jobsitem::create([
                'jobid' => $newJobId,
                'item'  => $request->item,
                'make'  => $request->make,
                'model'=> $request->model,
                'snno' => $request-> snno,
                'property' => $request -> property,
                'accessary' => $accessary,
                'complain' => $complain,
                // 'remarks' => $request -> property
            ]);


                  DB::table('secuence')
                 ->where('type', 'job')
                 ->increment('sno');

            // DB::table('secuence')->where('type', 'job')->update(['id' => $newJobId]);

            $msg = "Successfully Job created";
            return response()->json([
                // 'message' => $msg,
                'Jobid' => $newJobId,
                'Name' => $request->name,
                'Address' => $request->address,
                'GST No' => $request->gst_no,
                'Email' => $request->email,
                'Make' => $request->make,
                'Model' => $request->model,
                'Serial No.' => $request->snno,
                'Property' => $request->property,
                'Complain' => $complain,
                'Accessary' => $accessary,
                'Estimation' => $request->rest,

            ]);


        } else if ($purpose == 'update') {
            $request->validate([
                'id' => 'required',
                // 'email' => 'required|string|email',

            ]);
          //   Log::info('User data fetched:', ['user' => $request->id]);

            Jobs::where('id', $request->id)->update([

            ]);
            $msg = "Successfully  products updated";
        }

        return response()->json([
            "status" => true,
            "message" => $msg,
        ]);
    }
    public function addnewPage(Request $request)
    {
        $sequence = DB::table('secuence')
        ->select('sno', 'head')
        ->where('type', 'job')
        ->lockForUpdate()
        ->first();

        if (!$sequence) {
        return response()->json(['message' => 'Sequence for type job not found.'], 404);
        }

        // Calculate new job ID
        $newJobId = $sequence->sno + 1;
        $newJobId = str_pad($newJobId, 5, '0', STR_PAD_LEFT);


        $queue = DB::table('job')
        ->where('status', 'unasgn')
        ->count();
        $newqueue = $queue + 1;

        // Pad the sno value to ensure it's 5 digits long
        $sno = str_pad($sequence->sno, 5, '0', STR_PAD_LEFT);
                // Update the sequence in the database

       return view("jobs.addJob", [
        'newJobId' => $newJobId,
        'head' => $sequence->head,
        'newqueue' => $newqueue
    ]);
    }

}
