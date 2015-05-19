<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\GradeScale;
use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Transformers\GradeScaleTransformer;
use Illuminate\Support\Facades\Response;
use Request;

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
     *
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
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        GradeScale::destroy($id);
    }

    /**
     * Mark for deletion this
     *
     * @param $id
     */
    public function delete($id)
    {
        $gradeScale = GradeScale::findOrFail($id);

        $gradeScale->delete();
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
