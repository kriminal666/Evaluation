<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

/**
 * @property string grade_scale_description
 */
class GradeScale extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grade_scale';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'grade_scale_id';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'grade_scale_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'grade_scale_updated_at';

    /**
     * join tables
     *
     * @return Response
     */
    //TODO
   /* public function marks()
    {
        return $this->hasManyThrough('Evaluation\Mark', 'Evaluation\GradeScaleMark');
    }*/

}
