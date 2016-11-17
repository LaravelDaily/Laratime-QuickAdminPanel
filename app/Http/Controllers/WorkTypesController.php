<?php

namespace App\Http\Controllers;

use App\WorkType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWorkTypesRequest;
use App\Http\Requests\UpdateWorkTypesRequest;

class WorkTypesController extends Controller
{

    /**
     * Display a listing of WorkType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_types = WorkType::all();

        return view('work_types.index', compact('work_types'));
    }

    /**
     * Show the form for creating new WorkType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work_types.create', compact(''));
    }

    /**
     * Store a newly created WorkType in storage.
     *
     * @param  \App\Http\Requests\StoreWorkTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkTypesRequest $request)
    {
        WorkType::create($request->all());

        return redirect()->route('work_types.index');
    }

    /**
     * Show the form for editing WorkType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work_type = WorkType::findOrFail($id);

        return view('work_types.edit', compact('work_type'));
    }

    /**
     * Update WorkType in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkTypesRequest $request, $id)
    {
        $work_type = WorkType::findOrFail($id);
        $work_type->update($request->all());

        return redirect()->route('work_types.index');
    }

    /**
     * Display WorkType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work_type = WorkType::findOrFail($id);

        return view('work_types.show', compact('work_type'));
    }

    /**
     * Remove WorkType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worktype = WorkType::findOrFail($id);
        $worktype->delete();

        return redirect()->route('work_types.index');
    }

    /**
     * Delete all selected WorkType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = WorkType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
