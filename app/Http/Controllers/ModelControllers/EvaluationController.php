<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Evaluation;
use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Transformers\EvaluationTransformer;
use Illuminate\Support\Facades\Response;
use Request;


class EvaluationController extends ApiController
{

    /**
     * @var EvaluationTransformer
     */
    protected $evaluationTransformer;

    /**
     * Create a new controller instance.
     *
     * @param EvaluationTransformer $evaluationTransformer
     */
    function __construct(EvaluationTransformer $evaluationTransformer)
    {
        $this->middleware('auth');

        $this->evaluationTransformer = $evaluationTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $evaluations = Evaluation::all();

        return $this->respond([

            'data' => $this->evaluationTransformer->transformCollection($evaluations->toArray())

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexWithTrashed()
    {
        //return Evaluation::withTrashed()->get();

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
        Evaluation::create(Request::all());

        return $this->respondCreated('Evaluation created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $evaluation = Evaluation::find($id);

        if (!$evaluation) {

            return $this->respondNotFound('Evaluation does not exists.');
        }

        return $this->respond([

            'data' => $this->evaluationTransformer->transform($evaluation->toArray())

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

        $evaluation = Evaluation::findOrFail($id);

        $evaluation->evaluation_academic_period_id = Request::input('academicPeriodId');
        $evaluation->evaluation_study_subModule_id = Request::input('subModuleId');
        $evaluation->evaluation_student_id = Request::input('studentId');
        $evaluation->evaluation_mark_id = Request::input('markId');
        $evaluation->evaluation_lastUpdateUserId = Request::input('lastUpdateUserId');
        $evaluation->save();

        return $evaluation;

    }

    /**
     * Remove evaluation resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $evaluation = Evaluation::findorfail($id);
        $evaluation->forceDelete($id);
    }

    /**
     * Mark for deletion the evaluation
     *
     * @param $id
     */
    public function delete($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $evaluation->delete();
    }


}
