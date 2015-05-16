<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\User;
use Request;

class UsersController extends ApiController
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


        $users = User::all();
        return $this->respond([

            'data' => $users->toArray(),

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
        User::create(Request::all());

        return $this->respondCreated('User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

        $user = User::find($id);

        if (!$user) {
            return $this->respondNotFound('User does not exists.');
        }

        return $this->respond([

            'data' => ($user->toArray())

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
        $user = User::findOrFail($id);

        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->users_lastUpdateUserId = Request::input('lastUpdateUserId');

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    /**
     * mark for deletion this
     *
     * @param $id
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    /**
     * Get evaluations of all UFs from one user
     * @param $id
     * @return mixed
     */
    public function getUserEvaluations($id)
    {

        return User::findOrFail($id)->evaluations()->with('mark', 'user', 'studysubmodules', 'academicperiods')->get();
    }

}
