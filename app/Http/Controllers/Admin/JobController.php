<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Admin\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $job = Job::orderBy('job_order', 'asc')->get();
        return view('admin.job.index', compact('job'));
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $job = new Job();
     //   $data = $request->only($job->getFillable());
        // echo "<pre>";
        //  print_r($data);
         $data = $request->except('files','_token');
        //  echo "<pre>";
        //  print_r($data);
        //  die;
        $request->validate([
            'job_title' => 'required',
            'job_description_short' => 'required',
            'job_responsibility' => 'required',
            'job_deadline' => 'required',
            'job_vacancy' => 'required',
            'job_location' => 'required',
            'job_salary' => 'required'
        ]);

        //  return $request->all();

        if(empty($data['job_slug'])) {
            $data['job_slug'] = Str::slug($request->job_title);
        }

        $job->fill($data)->save();
        return redirect()->route('admin.job.index')->with('success', 'Job is added successfully!');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.edit', compact('job'));
    }



    public function update(Request $request, $id)
    {
        try {
            if(env('PROJECT_MODE') == 0) {
                return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
            }
            
            $job = Job::findOrFail($id);
            $data = $request->except('files', '_token');

            $request->validate([
                'job_title' => 'required',
                'job_description_short' => 'required',
                'job_responsibility' => 'required',
                'job_deadline' => 'required',
                'job_vacancy' => 'required',
                'job_location' => 'required',
                'job_salary' => 'required'
            ]);

            if(empty($data['job_slug'])) {
                $data['job_slug'] = Str::slug($request->job_title);
            }

            if(env('APP_DEBUG')) {
                \Log::info('Job Update Data:', [
                    'job_id' => $id,
                    'request_data' => $data,
                    'user' => auth()->user()
                ]);
            }

            $job->fill($data)->save();
            return redirect()->route('admin.job.index')->with('success', 'Job is updated successfully!');

        } catch (\Exception $e) {
            if(env('APP_DEBUG')) {
                \Log::error('Job Update Error:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return redirect()->back()->with('error', 'Error updating job: ' . $e->getMessage());
            }
            return redirect()->back()->with('error', 'An error occurred while updating the job.');
        }
    }







    
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $job = Job::findOrFail($id);
        $job->delete();

        // Deleting data from "job_applications" table
        $all_data = DB::table('job_applications')->where('job_id', $id)->get();
        foreach($all_data as $row)
        {
            unlink(public_path('uploads/'.$row->applicant_cv));
        }
        DB::table('job_applications')->where('job_id',$id)->delete();

        return Redirect()->back()->with('success', 'Job is deleted successfully!');
    }

    public function view_application()
    {
        $job_application = JobApplication::orderBy('id', 'asc')->get();
        return view('admin.job.view_application', compact('job_application'));
    }

    public function delete_application($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $job_application = JobApplication::findOrFail($id);
        unlink(public_path('uploads/'.$job_application->applicant_cv));
        $job_application->delete();
        return Redirect()->back()->with('success', 'Job Application is deleted successfully!');
    }
}
