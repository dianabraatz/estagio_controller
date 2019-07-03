<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Aluno;
use App\Estagio;
use Illuminate\Support\Facades\DB;
use App\Documento;

class ChecklistController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $curso = null;
        $aluno = null;
        $estagios = null;

        if (($inputCurso = $request->input('curso')) !== null) {
            $curso = Curso::find($inputCurso);
        }

        if (($inputAluno = $request->input('aluno')) !== null) {
            $aluno = Aluno::find($inputAluno);

            if (isset($aluno)) {
                $curso = $aluno->curso;
            }
        }

        if (isset($aluno)) {
            $estagios = $aluno->estagios;
        } else if (isset($curso)) {
            $estagios = $curso->alunos->flatMap(function($a) { return $a->estagios; });
        }

        $cursos = Curso::all();

        $alunos = (isset($curso) ? Aluno::where('curso_id', '=', $curso->id)->get() : Aluno::all());

        $url = $request->fullUrl();

        return view('checklist.index', compact('curso', 'aluno', 'estagios', 'cursos', 'alunos', 'url'));
    }

    public function store(Request $request)
    {
        $estagios = $request->input('estagios');
        $documentosEntregues = $request->input('entregue');

        foreach ($estagios as $estagio_id) {
            /** @var Estagio|null $estagio */
            $estagio = Estagio::find($estagio_id);

            if ($estagio) {
                $documentos = ($documentosEntregues[$estagio_id] ?? []);
                $documentos_ids = array_keys($documentos);

                $estagio->curso_documento()->sync($documentos_ids);
            }
        }

        return redirect($request->input('url') ?? action('ChecklistController@index'));
    }
}
