<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Jobsitem;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $request->validate([
                'name' => 'required',
                'unit' => 'required'
              ]);

            Jobs::create([


            ]);
            Jobsitem::create([


            ]);




            // DB::table('secuence')->where('type', 'job')->update(['id' => $newJobId]);

            $msg = "Successfully Product created";

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

        // // Update the sequence in the database
        // DB::table('secuence')
        // ->where('type', 'job')
        // ->update(['id' => $newJobId]);
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
