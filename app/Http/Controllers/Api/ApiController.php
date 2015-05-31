<?php namespace Evaluation\Http\Controllers\Api;

use Evaluation\Http\Controllers\Controller;
use Evaluation\Http\Requests;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

/**
 * Class ApiController
 * @package Evaluation\Http\Controllers\Api
 */
class ApiController extends Controller
{


	/**
	 * @var int
	 */
	protected $statusCode = 200;

	/**
	 * @method
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 *@method
	 * @param mixed $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}


	/**
	 * @method
	 * @param string $message
	 * @return mixed
	 */
	public function respondNotFound($message = 'Not Found')
	{

		return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);

	}

	/**
	 * @method
	 * @param string $message
	 * @return mixed
	 */
	public function respondInternalError($message = 'Internal error')
	{

		return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);

	}

	/**
	 * @method
	 * @param $message
	 * @return mixed
	 */
	protected function respondCreated($message)
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
			'message' => $message
		]);
	}

	/**
	 * @method
	 * @param $data
	 * @param array $headers
	 * @return mixed
	 */
	public function respond($data, $headers = [ ])
	{

		return Response::json($data, $this->getStatusCode(), $headers);
	}

	/**
	 * @method
	 * @param $message
	 * @return mixed
	 */
	public function respondWithError($message)
	{

		return $this->respond([

			'error' => [

				'message' => $message,

				'status_code' => $this->getStatusCode()
			] ]);
	}
}
