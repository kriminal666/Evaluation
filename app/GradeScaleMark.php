<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class GradeScaleMark extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grade_scale_mark';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'grade_scale_mark_id';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'grade_scale_mark_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'grade_scale_mark_updated_at';

    /**
     * Reverse relation with mark table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mark()
    {
        return $this->belongsTo('Evaluation\Mark', 'grade_scale_mark_markID');
    }

    /**
     * Reverse relation with grade_scale table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gradeScale()
    {
        return $this->belongsTo('Evaluation\GradeScale', 'grade_scale_mark_gradeScaleID');
    }

}
