<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\StudySubmodules;
use Evaluation\Transformers\StudySubmodulesTransformer;
use Request;

class StudySubmodulesController extends ApiController
{

    /**
     * @var StudySubmodulesTransformer
     */
    protected $subModuleTransformer;

    /**
     * Create a new controller instance.
     *
     * @param StudySubmodulesTransformer $subModuleTransformer
     */
    public function __construct(StudySubmodulesTransformer $subModuleTransformer)
    {
        $this->middleware('auth');

        $this->subModuleTransformer = $subModuleTransformer;
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

            'data' => $this->subModuleTransformer->transformCollection($studySubModules->toArray())

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

        return $this->respondCreated('Submodule created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $studySubModule = StudySubmodules::find($id);

        if (!$studySubModule) {

            return $this->respondNotFound('SubModule does not exists.');

        }

        return $this->respond([

            'data' => $this->subModuleTransformer->transform($studySubModule)

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
        $subModule = StudySubmodules::findOrFail($id);

        $subModule->study_submodules_name = Request::input('name');
        $subModule->study_submodules_shortname = Request::input('shortName');
        $subModule->study_submodules_study_module_id = Request::input('moduleId');
        $subModule->study_submodules_courseid = Request::input('courseId');
        $subModule->study_submodules_description = Request::input('description');
        $subModule->study_submodules_order = Request::input('order');
        $subModule->study_submodules_lastupdateUserId = Request::input('lastUpdateUserId');

        $subModule->save();

        return $subModule;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        StudySubmodules::destroy($id);
    }

    /**
     *Mark for deletion this
     *
     * @param $id
     */
    public function delete($id)
    {
        $subModule = StudySubmodules::findOrFail($id);
        $subModule->delete();
    }

    /**
     * Get evaluations of one subModule
     *
     * @param $id
     * @return mixed
     */
    public function getEvaluations($id)
    {

        $usersSubModulesEvaluations = StudySubmodules::find($id)->evaluations()->get();

        if (!$usersSubModulesEvaluations) {
            return $this->respondNotFound('Study SubModule does not exists');
        }

        return $usersSubModulesEvaluations->load('studySubModules', 'academicPeriods', 'user', 'mark');
    }


}
