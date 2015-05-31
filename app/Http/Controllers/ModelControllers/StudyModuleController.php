<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\StudyModule;
use Evaluation\Transformers\StudyModuleTransformer;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Class StudyModuleController
 * @package Evaluation\Http\Controllers\ModelControllers
 */
class StudyModuleController extends ApiController
{

    /**
     * @var StudyModuleTransformer
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
     * @api
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
     * @api
     * @return Response
     */
    public function store()
    {
        StudyModule::create(Request::all());

        return $this->respondCreated('Study module created');
    }

    /**
     * Display the specified resource.
     *
     * @api
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
     * @api
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $studyModule = StudyModule::findOrFail($id);

        $studyModule->study_module_description = Request::input('description');
        $studyModule->study_module_name = Request::Input('name');
        $studyModule->study_module_shortname = Request::input('shortName');
        $studyModule->study_module_type = Request::input('type');
        $studyModule->study_module_subtype = Request::input('subType');
        $studyModule->study_module_order = Request::input('order');
        $studyModule->study_module_hoursPerWeek = Request::input('hoursPerWeek');
        $studyModule->study_module_lastupdateUserId = Request::input('lastUpdateUserId');

        $studyModule->save();

        return $studyModule;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $studyModule = StudyModule::findOrFail($id);

        $studyModule->forceDelete();
    }

    /**
     * Mark for deletion this
     *
     * @api
     * @param $id
     */
    public function delete($id)
    {
        $studyModule = StudyModule::findOrFail($id);
        $studyModule->delete();
    }

    /**
     * Restore marked for deletion this
     *
     * @api
     * @param $id
     */
    public function restore($id)
    {

        StudyModule::withTrashed()->where('study_module_id', '=', $id)->first()->restore();

    }

    /**
     * Return all, included trashed
     *
     * @api
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function getAllWithTrashed()
    {

        return StudyModule::withTrashed();
    }

    /**
     * Return one trashed
     *
     * @api
     * @param $id
     * @return mixed
     */
    public function getOneTrashed($id)
    {
        $studyModule = StudyModule::withTrashed()->where('study_module_id', '=', $id)->first();

        if (!$studyModule) {

            return $this->respondNotFound('Study module does not exists.');
        }

        return $this->respond([

            'data' => $this->studyModuleTransformer->transform($studyModule)

        ]);

    }

    /**
     * Get the submodules of module
     *
     * @api
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
     * @api
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

        return $usersSubModulesEvaluations->load('evaluations.user', 'evaluations.mark');
    }

}
