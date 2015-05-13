<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Evaluation;
use Evaluation\Http\Controllers\Controller;
use Evaluation\Http\Requests;
use Evaluation\Transformers\EvaluationTransformer;
use Request;
use Illuminate\Support\Facades\Response;



class EvaluationController extends Controller
{

    /**
     * @var EvaluationTransformer
     */
    protected $gradeScaleTransformer;

    /**
     * Create a new controller instance.
     *
     * @param EvaluationTransformer $evaluationTransformer
     */
    public function __construct(EvaluationTransformer $evaluationTransformer)
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

        return Response::json([

            'data' => $this->evaluationTransformer->transformCollection($evaluations->toArray())

        ], 200);
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
            return Response::json([
                'error' => [
                    'message' => 'Evaluation does not exist'
                ]
            ], 404);
        }

        return Response::json([

            'data' => $this->evaluationTransformer->transform($evaluation)

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
        $evaluation = Evaluation::finfOrFail($id);

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


}
