<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\GradeScale;
use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Transformers\GradeScaleTransformer;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Class GradeScaleController
 * @package Evaluation\Http\Controllers\ModelControllers
 */
class GradeScaleController extends ApiController
{
    /**
     * @var GradeScaleTransformer
     */
    protected $gradeScaleTransformer;

    /**
     * Create a new controller instance.
     *
     * @param GradeScaleTransformer $gradeScaleTransformer
     */
    public function __construct(GradeScaleTransformer $gradeScaleTransformer)
    {
        $this->middleware('auth');

        $this->gradeScaleTransformer = $gradeScaleTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @api
     * @return Response
     */
    public function index()
    {
        $gradeScales = GradeScale::all();

        return $this->respond([

            'data' => $this->gradeScaleTransformer->transformCollection($gradeScales->toArray())

        ]);
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
     * @api
     * @return Response
     */
    public function store()
    {
        GradeScale::create(Request::all());

        return $this->respondCreated('Grade Scale created');
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
        $gradeScale = GradeScale::find($id);

        if (!$gradeScale) {

            return $this->respondNotFound('Grade Scale does not exists.');
        }

        return $this->respond([

            'data' => $this->gradeScaleTransformer->transform($gradeScale)

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
        $gradeScale = GradeScale::find($id);

        $gradeScale->grade_scale_description = Request::input('description');
        $gradeScale->grade_scale_lastUpdateUserId = Request::input('lastUpdateUserId');

        $gradeScale->save();

        return $gradeScale;

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
        $gradeScale = GradeScale::findOrFail($id);
        $gradeScale->forceDelete($id);
    }

    /**
     * Mark for deletion this
     *
     * @api
     * @param $id
     */
    public function delete($id)
    {
        $gradeScale = GradeScale::findOrFail($id);

        $gradeScale->delete();
    }

    /**
     * Restore marked for deletion this
     *
     * @api
     * @param $id
     */
    public function restore($id)
    {

        GradeScale::withTrashed()->where('grade_scale_id', '=', $id)->first()->restore();

    }

    /**
     * Return all, included trashed
     *
     * @api
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function getAllWithTrashed()
    {

        return GradeScale::withTrashed();
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
        $gradeScale = GradeScale::withTrashed()->where('grade_scale_id', '=', $id)->first();

        if (!$gradeScale) {

            return $this->respondNotFound('Grade scale does not exists.');
        }

        return $this->respond([

            'data' => $this->gradeScaleTransformer->transform($gradeScale)

        ]);

    }

    /**
     * Get all marks from one grade_scale
     *
     * @api
     * @param $id
     * @return mixed
     */
    public function getMarks($id)
    {
        return GradeScale::find($id)->marks();
    }

}
