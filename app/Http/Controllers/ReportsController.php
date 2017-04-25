<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CompileReports;

class ReportsController extends Controller
{
    public function index(Request $request) {
    	
    	//$job = new CompileReports($request->input('reportId')); // can pass 1 for example
    	// ?reportId=9
    	//$this->dispatch($job);

    	// http://127.0.0.1:8000/reports?reportId=9&type=annual
    	$this->dispatch(new CompileReports($request->input('reportId'), $request->input('type')));
    	
    	// get_class() expects parameter 1 to be object, string given
    	//$this->dispatch('App\Jobs\CompileReports', $request);

    	// deprecated
    	// $this->dispatchFrom('App\Jobs\CompileReports', $request)

    	// inspect CompileReports
    	// look into request object to see if their is a reportId field there.
    	// pass it through
    	// using reflection to figure out what must be passed through

    	//$this->dispatchFrom('App\Jobs\CompileReports', $request);

    	return 'Done';

    	// may need to pass a lot of data

    }
}
