<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Requests;
use Evaluation\Http\Controllers\Controller;

use Evaluation\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{

    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Mark::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
       Mark::create(Request::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Mark::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the grade_scale of this
     *
     * @param  int $id
     * @return mixed
     */
    public function gradeScale($id)
    {

        return Mark::findOrFail($id)->gradeScaleMark()->with('gradeScale')->get();
    }

}
