<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Mark;
use Request;
use Evaluation\Transformers\MarkTransformer;
use Illuminate\Support\Facades\Response;


class MarkController extends ApiController
{

    /**
     * @var MarkTransformer
     */
    protected $markTransformer;

    /**
     * Create a new controller instance
     *
     * @param MarkTransformer $markTransformer
     */
    public function __construct(MarkTransformer $markTransformer)
    {
        $this->middleware('auth');

        $this->markTransformer = $markTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $marks = Mark::all();

        return $this->respond([

            'data' => $this->markTransformer->transformCollection($marks->toArray())

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
        Mark::create(Request::all());

        return $this->respondCreated('Mark created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);

        if (!$mark) {

            return $this->respondNotFound('Mark does not exists.');

        }

        return $this->respond([

            'data' => $this->markTransformer->transform($mark)

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
     * Get the grade_scale of this
     *
     * @param  int $id
     * @return mixed
     */
    public function gradeScale($id)
    {

        return Mark::findOrFail($id)->gradeScaleMark()->with('gradeScale')->get();
    }

}
