<?php

namespace App\Http\Controllers;

use App\Estagio;
use Illuminate\Http\Request;
use App\Aluno;
use App\Empresa;
use App\Professor;

class EstagioController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estagios = Estagio::paginate(15);

        return view('estagios.index', compact('estagios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all();
        $empresas = Empresa::all();
        $professores = Professor::all();

        return view('estagios.create', compact('alunos', 'empresas', 'professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estagio = new Estagio($request->all());
        $estagio->save();

        return redirect(action('EstagioController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estagio  $estagio
     * @return \Illuminate\Http\Response
     */
    public function show(Estagio $estagio)
    {
        return view('estagios.show', compact('estagio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estagio  $estagio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estagio $estagio)
    {
        $alunos = Aluno::all();
        $empresas = Empresa::all();
        $professores = Professor::all();

        return view('estagios.edit', compact('estagio', 'alunos', 'empresas', 'professores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estagio  $estagio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estagio $estagio)
    {
        $estagio->fill($request->all());
        $estagio->save();

        return redirect(action('EstagioController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estagio  $estagio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estagio $estagio)
    {
        $estagio->delete();

        return redirect(action('EstagioController@index'));
    }
}
