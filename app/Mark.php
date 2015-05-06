<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mark';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'mark_id';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'mark_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'mark_updated_at';

   /* public function gradeScale(){
        return $this->belongsTo('Evaluation\GradeScale','grade_scale_mark_markID',null,'Evaluation\GradeScaleMark');
    }*/


}
