<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\StudyModule;
use Evaluation\Transformers\StudyModuleTransformer;
use Illuminate\Support\Facades\Response;
use Request;

class StudyModuleController extends ApiController
{

    /**
     * @var StudyModule
     */
    protected $studyModuleTransformer;

    /**
     * Constructor
     *
     * @param $studyModuleTransformer
     */
    function __construct(StudyModuleTransformer $studyModuleTransformer)
    {
        $this->middleware('auth');

        $this->studyModuleTransformer = $studyModuleTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $studyModule = StudyModule::all();

        return $this->respond([

            'data' => $this->studyModuleTransformer->transformCollection($studyModule->toArray())

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
        StudyModule::create(Request::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $studyModule = StudyModule::find($id);

        if (!$studyModule) {

            return $this->respondNotFound('Study module does not exists.');
        }

        return $this->respond([

            'data' => $this->studyModuleTransformer->transform($studyModule)

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

    /**
     * Get the submodules of module
     * @param $id
     * @return mixed
     */
    public function getSubModules($id)
    {
        $moduleSubModules = StudyModule::find($id)->studySubModules()->get();

        if (!$moduleSubModules) {
            return $this->respondNotFound('Study module does not exists.');
        }

        return $moduleSubModules;
    }

    /**
     * Get user submodules evaluation marks from this module
     *
     * @param $id
     * @return mixed
     */
    public function getUsersSubModulesEvaluations($id)
    {
        $usersSubModulesEvaluations = StudyModule::find($id)->studySubModules()->
        select(array('study_submodules_id', 'study_submodules_shortname', 'study_submodules_name'))->get();

        if (!$usersSubModulesEvaluations) {
            return $this->respondNotFound('Study Module does not exists');
        }

        return $usersSubModulesEvaluations->load('evaluation.user', 'evaluation.mark');
    }

}
