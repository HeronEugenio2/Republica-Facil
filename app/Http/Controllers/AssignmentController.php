<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

/**
 * Class AssignmentController
 * @package App\Http\Controllers
 */
class AssignmentController extends Controller
{
    /**
     * @var Assignment
     */
    private $assignmentModel;
    private $userModel;

    public function __construct(Assignment $assignment, User $user)
    {
        $this->assignmentModel = $assignment;
        $this->userModel = $user;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        try {

            $user = auth()->user();
            $republic = $user->republic;
            $republicAssignmets = $republic->assignmets;
            $users = $this->userModel->with('republic')->where('republic_id', Auth::user()->republic_id)->get();
            return view('Painel.Assignments.Assignment', compact('republic', 'republicAssignmets', 'users'));
        } catch (Exception $e) {
            Log::warning('Erro ao listar tarefas');
            report($e);

            return redirect()->back()->with('toast_error', 'Ocorreu um erro, tente novamente mais tarde!');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $users = $this->userModel->with('republic')->where('republic_id', Auth::user()->republic_id)->get();

        return view('Painel.Assignments.Create', compact('users'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $republic = $user->republic;
            $users = $this->userModel->with('republic')->where('republic_id', Auth::user()->republic_id)->get();

            $republicAssignmets = $republic->assignmets;
            $saved = $this->assignmentModel->create($request->all());

            if ($saved) {
                return redirect()->route('painel.assignment.index')->with(compact('republic', 'republicAssignmets', 'users'))->with('toast_success', 'Salvo com sucesso!');
            } else {
                return view('Painel.Assignments.Assignment', compact('republic', 'republicAssignmets', 'users'))->with('toast_error', 'Erro ao salvar!');
            }


        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente mais tardes');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {

            $assignment = $this->assignmentModel->find($id);
            $deleted = $assignment->delete();
            if ($deleted) {
                return redirect()->back()->with('toast_success', 'Removido com sucesso!');
            } else {
                return redirect()->back()->with('toast_error', 'Erro ao deletar tarefa, tente novamente mais tarde!');
            }
        } catch (Exception $e) {
            Log::warning('Erro ao deletar tarefa, tente novamente mais tarde!');
            report($e);

            return back()->with('toast_error', 'Erro ao deletar tarefa, tente novamente mais tarde!');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function conclude(Request $request)
    {
        try {
            $assignment = $this->assignmentModel->find($request->assignmet_id);
            $assignment->situation = $request->situationFlag;
            $assignment->save();

            return redirect()->back()->with('toast_success', 'Atualizado com sucesso');
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('toast_error', $e->getMessage());
        }
    }
}
