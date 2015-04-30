<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class GradeScaleMark extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table ='grade_scale_mark';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'grade_scale_mark_id';

}
