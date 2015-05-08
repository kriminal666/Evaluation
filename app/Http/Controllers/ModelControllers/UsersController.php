<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Requests;
use Evaluation\Http\Controllers\Controller;

use Evaluation\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        return User::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //Return one user
        return User::find($id);
    }

    /**
     * Display all resources.
     *
     *
     * @return Response
     */
    public function showAll()
    {
        //Return one user
        return User::all();
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
     * Get evaluations of all UFs from one user
     * @param $id
     * @return mixed
     */
    public function getUserEvaluations($id)
    {
        //NOT FINISHED
        return User::findOrFail($id)->evaluations()->get();
    }

}
