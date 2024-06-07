<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $reports = Report::all();
        return Inertia::render('Report/Index', ['reports' => $reports]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Report/Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'TypeOfAccident' => ['required'],
            'Description' => ['required'],
            'Date' => ['required'],
            'filename' => ['required'],
            'location' => ['required'],
        ])->validate();

        Report::create($request->all());

        return redirect()->route('reports.index');

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Report $report)
    {
        return Inertia::render('Report/Edit', [
            'report' => $report
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'TypeOfAccident' => ['required'],
            'Description' => ['required'],
            'Date' => ['required'],
            'filename' => ['required'],
            'location' => ['required'],

        ])->validate();

        Report::find($id)->update($request->all());
        return redirect()->route('reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Report::find($id)->delete();
        return redirect()->route('reports.index');
    }
    public function reportlist(){
        Validator::make($request->all(), [
            'TypeOfAccident' => ['required'],
            'Description' => ['required'],
            'Date' => ['required'],
            'filename' => ['required'],
            'location' => ['required'],
        ])->validate();

        Report::create($request->all());

        return redirect()->route('reports.reportlist');
    }
    
}
