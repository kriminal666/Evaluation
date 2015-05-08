<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\GradeScale;
use Evaluation\Http\Requests;
use Evaluation\Http\Controllers\Controller;

use Request;

class GradeScaleController extends Controller
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
     *
     * @return Response
     */
    public function index()
    {
        return GradeScale::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        GradeScale::create(Request::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return GradeScale::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $gradeScale = GradeScale::find($id);
        $gradeScale->grade_scale_description = Request::input('grade_scale_description');
        $todo->save();
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
     * Get all marks from one grade_scale
     * @param $id
     * @return mixed
     */
    public function getMarks($id)
    {
        return GradeScale::find($id)->marks();
    }

}
