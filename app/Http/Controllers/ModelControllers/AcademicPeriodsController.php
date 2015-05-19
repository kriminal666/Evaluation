<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\AcademicPeriods;
use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Transformers\AcademicPeriodsTransformer;
use Request;

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

            'data' => $this->academicPeriodTransformer->transform($academicPeriod)

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

        if ($academicPeriod->academic_periods_markedForDeletion == "y")
        {
            $this->delete($academicPeriod->academic_periods_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        AcademicPeriods::destroy($id);
    }

    /**
     * This marked for deletion
     * @param $id
     */
    public function delete($id)
    {
        $academicPeriod = AcademicPeriods::findOrFail($id);

        $academicPeriod->delete();

    }

}
