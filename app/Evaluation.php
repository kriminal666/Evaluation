<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table ='evaluation';

	/**
	 * Override primary key name
	 *
	 * @var string
	 */
	protected $primaryKey = 'evaluation_id';

	/**
	 * The name of the "created at" column.
	 *
	 * @var string
	 */
	const CREATED_AT = 'evaluation_created_at';

	/**
	 * The name of the "updated at" column.
	 *
	 * @var string
	 */
	const UPDATED_AT = 'evaluation_updated_at';

}
