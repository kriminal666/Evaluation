<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    use SoftDeletes;
    /**
     * Soft delete field
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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

    /**
     * Relation this with evaluation table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany('Evaluation\Evaluation', 'evaluation_mark_id');
    }

    /**
     * Define that this belongs to one gradeScale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gradeScale()
    {
        return $this->belongsTo('Evaluation\GradeScale', 'grade_scale_mark_gradeScaleID');
    }

    /**
     * Define that we have many of this in grade_scale_mark
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gradeScaleMark()
    {
        return $this->hasMany('Evaluation\GradeScaleMark', 'grade_scale_mark_markID')->select(array('grade_scale_mark_markID'
        , 'grade_scale_mark_gradeScaleID'));
    }


}
