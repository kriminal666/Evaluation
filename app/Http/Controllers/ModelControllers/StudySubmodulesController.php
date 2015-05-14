<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\StudySubmodules;
use Request;

class StudySubmodulesController extends ApiController
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
       $studySubModules = StudySubmodules::all();
        return $this->respond([

            'data' => ($studySubModules->toArray())

        ]);
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
        StudySubmodules::create(Request::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $studySubModule=  StudySubmodules::find($id);

        if (!$studySubModule) {

            return $this->respondNotFound('SubModule does not exists.');

        }

        return $this->respond([

            'data' => $studySubModule

        ]);
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

}
