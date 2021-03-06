<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\AcademicPeriods;
use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Transformers\AcademicPeriodsTransformer;
use Request;

/**
 * Class AcademicPeriodsController
 * @package Evaluation\Http\Controllers\ModelControllers
 */
class AcademicPeriodsController extends ApiController
{

    /**
     * @var AcademicPeriodsTransformer
     */
    protected $academicPeriodsTransformer;

    /**
     * Create a new controller instance.
     *
     * @param AcademicPeriodsTransformer $academicPeriodsTransformer
     */
    function __construct(AcademicPeriodsTransformer $academicPeriodsTransformer)
    {

        $this->middleware('auth');
        $this->academicPeriodsTransformer = $academicPeriodsTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @api
     * @return Response
     */
    public function index()
    {
        $academicPeriods = AcademicPeriods::all();

        return $this->respond([

            'data' => $this->academicPeriodsTransformer->transformCollection($academicPeriods->toArray())

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
        AcademicPeriods::create(Request::all());

        return $this->respondCreated('Academic period created');
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
        $academicPeriod = AcademicPeriods::find($id);

        if (!$academicPeriod) {

            return $this->respondNotFound('Academic period does not exists.');
        }

        return $this->respond([

            'data' => $this->academicPeriodsTransformer->transform($academicPeriod)

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
        $academicPeriod = AcademicPeriods::find($id);

        $academicPeriod->academic_periods_name = Request::input('name');
        $academicPeriod->academic_periods_alt_name = Request::input('altName');
        $academicPeriod->academic_periods_shortname = Request::input('shortName');
        $academicPeriod->academic_periods_current = Request::input('current');
        $academicPeriod->academic_periods_initial_date = Request::input('initialDate');
        $academicPeriod->academic_periods_final_date = Request::input('finalDate');
        $academicPeriod->academic_periods_lastupdateUserId = Request::input('lastUpdateUserId');
        $academicPeriod->academic_periods_entryDate = Request::input('creationDate');
        $academicPeriod->academic_periods_markedForDeletion = Request::input('softDelete');

        $academicPeriod->save();

        if ($academicPeriod->academic_periods_markedForDeletion == "y") {
            $this->delete($academicPeriod->academic_periods_id);
        }
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
        $academicPeriod = AcademicPeriods::findOrFail($id);
        $academicPeriod->forceDelete($id);
    }

    /**
     * This marked for deletion
     *
     * @api
     * @param $id
     */
    public function delete($id)
    {
        $academicPeriod = AcademicPeriods::findOrFail($id);

        $academicPeriod->delete();

    }

    /**
     * Restore marked for deletion this
     *
     * @api
     * @param $id
     */
    public function restore($id)
    {

        AcademicPeriods::withTrashed()->where('academic_periods_id', '=', $id)->first()->restore();

    }

    /**
     * Return all academic Periods included trashed
     *
     * @api
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function getAllWithTrashed()
    {

        return AcademicPeriods::withTrashed();
    }

    /**
     * Return one academic period trashed
     *
     * @api
     * @param $id
     * @return mixed
     */
    public function getOneTrashed($id)
    {
        $academicPeriod = AcademicPeriods::withTrashed()->where('academic_periods_id', '=', $id)->first();

        if (!$academicPeriod) {

            return $this->respondNotFound('Academic period does not exists.');
        }

        return $this->respond([

            'data' => $this->academicPeriodsTransformer->transform($academicPeriod)

        ]);


    }

}
