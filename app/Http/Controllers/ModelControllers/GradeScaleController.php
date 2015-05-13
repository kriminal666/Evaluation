<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\GradeScale;
use Evaluation\Http\Requests;
use Evaluation\Http\Controllers\Controller;
use Evaluation\Transformers\GradeScaleTransformer;
use Illuminate\Support\Facades\Response;
use Request;

class GradeScaleController extends Controller
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

        return Response::json([

            'data' => $this->gradeScaleTransformer->transformCollection($gradeScales->toArray())

        ], 200);
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
            return Response::json([
                'error' => [
                    'message' => 'Grade Scale does not exist'
                ]
            ], 404);
        }

        return Response::json([

            'data' => $this->gradeScaleTransformer->transform($gradeScale)

        ], 200);
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
        $gradeScale->grade_scale_description = Request::input('grade_scale_description');
        $gradeScale->save();
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
     * Get all marks from one grade_scale
     * @param $id
     * @return mixed
     */
    public function getMarks($id)
    {
        return GradeScale::find($id)->marks();
    }

}
