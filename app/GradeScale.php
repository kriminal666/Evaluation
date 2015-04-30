<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class GradeScale extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table ='grade_scale';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'grade_scale_id';

}
