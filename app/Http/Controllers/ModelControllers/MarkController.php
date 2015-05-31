<?php namespace Evaluation\Http\Controllers\ModelControllers;

use Evaluation\Http\Controllers\Api\ApiController;
use Evaluation\Http\Requests;
use Evaluation\Mark;
use Evaluation\Transformers\MarkTransformer;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Class MarkController
 * @package Evaluation\Http\Controllers\ModelControllers
 */
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
	 * @api
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
	 * @api
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
	 * @api
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
	 * @api
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$mark = Mark::findOrFail($id);

		$mark->mark_value = Request::input('markValue');
		$mark->mark_lastUpdateUserId = Request::input('lastUpdateUserId');

		$mark->save();

		return $mark;
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
		$mark = Mark::findOrFail($id);

		$mark->forceDelete($id);
	}

	/**
	 * Mark for deletion this
	 *
	 * @api
	 * @param $id
	 */
	public function delete($id)
	{
		$mark = Mark::finfOrFail($id);

		$mark->delete();
	}

	/**
	 * Restore marked for deletion this
	 *
	 * @api
	 * @param $id
	 */
	public function restore($id)
	{

		Mark::withTrashed()->where('mark_id', '=', $id)->first()->restore();

	}

	/**
	 * Return all, included trashed
	 *
	 * @api
	 * @return \Illuminate\Database\Eloquent\Builder|static
	 */
	public function getAllWithTrashed()
	{

		return Mark::withTrashed();
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
		$mark = Mark::withTrashed()->where('mark_id', '=', $id)->first();

		if (!$mark) {

			return $this->respondNotFound('Mark does not exists.');
		}

		return $this->respond([

			'data' => $this->markTransformer->transform($mark)

		]);

	}

	/**
	 * Get the grade_scale of this
	 *
	 * @api
	 * @param  int $id
	 * @return mixed
	 */
	public function gradeScale($id)
	{

		return Mark::findOrFail($id)->gradeScaleMark()->with('gradeScale')->get();
	}

}
