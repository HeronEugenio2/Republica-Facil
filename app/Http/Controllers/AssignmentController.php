<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignmentStoreRequest;
use App\Models\Assignment;
use App\Models\AssignmentUser;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $assignment = new Assignment();

            $assignments = $assignment->with('users')->where('republic_id', auth()->user()->republic_id)->get();

            return view('Painel.Assignments.Index', compact('assignments'));


        } catch (Exception $e) {
            Log::warning('Erro ao tentar buscar tarefas AssignmentController - index');
            report($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('republic_id', Auth::user()->republic_id)->get();

        return view('Painel.Assignments.Create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentStoreRequest $request)
    {
        try {
            $assignmentModel = new Assignment();
            $assignmentUserModel = new AssignmentUser();
            $userModel = new User();
            $carbon = new Carbon();


            $requestValidated = $request->validated();
            $user = $userModel->find(current(Hashids::decode($requestValidated['user'])));
            if (!empty($requestValidated['date_end']) || !$requestValidated['date_end']) {
                $requestValidated['date_end'] = null;
            } else {
                $requestValidated['date_end'] = $carbon->format('Y-m-d', $requestValidated['date_end']);
            }

            $assignmentCreated = $assignmentModel->create([
                'name' => $requestValidated['name'],
                'description' => $requestValidated['description'],
                'date_start' => $carbon->format('Y-m-d', $requestValidated['date_start']),
                'date_end' => $requestValidated['date_end'],
                'republic_id' => $user->republic_id,
                'status_flag' => 0
            ]);

            if ($assignmentCreated) {
                $userAssignmentCreated = $assignmentUserModel->create([
                    'user_id' => $user->id,
                    'assignment_id' => $assignmentCreated->id,
                ]);

                return redirect()->route('painel.assignment.index');
            }

            return redirect()->back();


        } catch (Exception $e) {
            Log::warning('Erro ao tentar salvar tarefa');
            report($e);
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
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return void
     * @throws Exception
     */
    public function destroy($id)
    {
        $assignmentModel = new Assignment();
        $assignmentUserModel = new AssignmentUser();
        $id = current(Hashids::decode($id));

        if (!empty($id)) {
            $assignment = $assignmentModel->with('assignmentUser')->find($id);
            if (!empty($assignment->assignmentUser)) {
                $assignment->assignmentUser->delete();
            }

            $assignment->delete();
            return redirect()->route('painel.assignment.index');
        }

        return redirect()->back();
    }
}
