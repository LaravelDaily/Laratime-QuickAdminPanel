<?php

namespace App\Http\Controllers;

use App\TimeEntry;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTimeEntriesRequest;
use App\Http\Requests\UpdateTimeEntriesRequest;

class TimeEntriesController extends Controller
{

    /**
     * Display a listing of TimeEntry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_entries = TimeEntry::all();

        return view('time_entries.index', compact('time_entries'));
    }

    /**
     * Show the form for creating new TimeEntry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\WorkType::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('time_entries.create', $relations);
    }

    /**
     * Store a newly created TimeEntry in storage.
     *
     * @param  \App\Http\Requests\StoreTimeEntriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeEntriesRequest $request)
    {
        TimeEntry::create($request->all());

        return redirect()->route('time_entries.index');
    }

    /**
     * Show the form for editing TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\WorkType::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $time_entry = TimeEntry::findOrFail($id);

        return view('time_entries.edit', compact('time_entry') + $relations);
    }

    /**
     * Update TimeEntry in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeEntriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeEntriesRequest $request, $id)
    {
        $time_entry = TimeEntry::findOrFail($id);
        $time_entry->update($request->all());

        return redirect()->route('time_entries.index');
    }

    /**
     * Display TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\WorkType::get()->pluck('name', 'id')->prepend('Please select', ''),

        ];

        $time_entry = TimeEntry::findOrFail($id);
        return view('time_entries.show', compact('time_entry') + $relations);
    }

    /**
     * Remove TimeEntry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time_entry = TimeEntry::findOrFail($id);
        $time_entry->delete();

        return redirect()->route('time_entries.index');
    }

    /**
     * Delete all selected TimeEntry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = TimeEntry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
