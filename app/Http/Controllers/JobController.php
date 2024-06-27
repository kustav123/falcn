<?php

namespace App\Http\Controllers;

use App\Models\Jobcomments;
use App\Models\Jobs;
use App\Models\Jobsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    public function index(Request $request)
    {
        // Log::info('in controler');

        if ($request->ajax()) {
            // Log::info('Received an AJAX request.');

             // ->where('status', '>', '1'); //Grater Than
            // ->where('status', '1'); //Equal to
            $data = DB::table('job')
            ->join('client', 'job.clid', '=', 'client.id')
            ->join('job_item', 'job.id', '=', 'job_item.jobid')
            ->leftJoin('appuser', function ($join) {
                $join->on('job.assigned', '=', 'appuser.id')
                    ->whereNotNull('job.assigned'); // Conditionally join only when assigned is not null
            })
            ->select('job.id as Job', 'client.name', 'job.status', 'job.echarge', DB::raw('IFNULL(appuser.name, "") as uname'), 'job_item.item')
            ->get();

            // Log::info('Fetched data: ', ['data' => $data]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('jobs.action', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('jobs.jobmanage');

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
        // Log::info( $request->complain);
        $accessary = implode(', ', $request->accessary);
        $complain = implode(', ', $request->complain);
    DB::transaction(function () use ($request, $newJobId,$accessary, $complain) {

        Jobs::create([
            'id' => $newJobId,
            'clid' => $request->clid,
            'status'=> "Open",
            'echarge'=> $request->rest,
            'remarks' => $request->job_remarks
            ]);



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
            Jobcomments::create([
                'jbid' => $newJobId,
                'usid' => Auth::user()->id,
                'type' => 'App',
                'message' => 'Job Created',

            ]) ;
             DB::table('secuence')
                 ->where('type', 'job')
                 ->increment('sno');
                });

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
                'Job Remarks' => $request ->job_remarks,
                'Estimation' => $request->rest,

            ]);


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
        ->where('status', 'Open')
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
    public function GetJobDetails(Request $request)
    {

        Log::info('Incoming request', ['job_id' => $request->jobid]);

        $jobdtl = DB::table('job_comment')
        ->join('appuser', 'job_comment.usid', '=', 'appuser.id')
        ->select(DB::raw("jbid,DATE_FORMAT(job_comment.created_at, '%Y-%m-%d %H:%i') as created_at"), 'appuser.name', 'job_comment.type', 'job_comment.message')
        ->where('jbid', $request->jobid)
        ->orderBy('created_at','asc')
        ->get();

        Log::info('Incoming request', ['job_id' => $request->jobid]);

        Log::info('jobdtl', ['jobdtl' => $jobdtl]);
        return response()->json($jobdtl);
    }

    public function UpdateComment(Request $request)
    {

        Jobcomments::create([
            'jbid' => $request -> jobid,
            'usid' => Auth::user()->id,
            'type' => 'User',
            'message' => $request-> comment

        ]) ;

    }

    public function UpdateJob(Request $request)
    {


         $request->validate([
            'jobid' => 'required',

            ]);

            if ($request->status === 'Assign' && $request->assigned_to) {
                // Update Jobs table

                DB::transaction(function () use ($request) {
                    Jobs::where('id', $request->jobid)->update([
                        'assigned' => $request->assigned_to,
                        'status' => 'Assigned'
                    ]);

                    // Create Jobcomments record
                    Jobcomments::create([
                        'jbid' => $request->jobid,
                        'usid' => Auth::user()->id,
                        'type' => 'User',
                        'message' => 'Job Assigned to ' . $request->assigned_to,
                    ]);
                });
                } else {
                    // Handle invalid or incomplete request
                    DB::transaction(function () use ($request) {
                        Jobs::where('id', $request->jobid)->update([
                            'status' => $request->status
                        ]);

                        // Create Jobcomments record
                        Jobcomments::create([
                            'jbid' => $request->jobid,
                            'usid' => Auth::user()->id,
                            'type' => 'User',
                            'message' => 'Changed Status to ' . $request->status,
                        ]);
                    });
                                    }

    }


}
