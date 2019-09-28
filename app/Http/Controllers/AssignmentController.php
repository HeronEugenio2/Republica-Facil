<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * @var Assignment
     */
    private $assignment;

    public function __construct(Assignment $assignment)
    {

        $this->assignment = $assignment;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $republic = $user->republic;
        $republicAssignmets = $republic->assignmets;
        $users = User::with('republic')->where('republic_id', Auth::user()->republic_id)->get();

        return view('Painel.Assignments.Assignment', compact('republic', 'republicAssignmets', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::with('republic')->where('republic_id', Auth::user()->republic_id)->get();

        return view('Painel.Assignments.Create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $republic = $user->republic;
            $republicAssignmets = $republic->assignmets;
            $saved = Assignment::create($request->all());
            if ($saved) {
                return view('Painel.Assignments.Assignment', compact('republic', 'republicAssignmets'));
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @param \App\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        dd(12);

    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = $this->assignment->find($id);
        $deleted = $assignment->delete();
        return redirect()->back();
    }

    public function conclude(Request $request)
    {
        try {
            $assignment = $this->assignment->where('id', $request->assignmet_id)->first();
            $assignment->situation = $request->situationFlag;
            $assignment->save();

            return redirect()->back();
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
