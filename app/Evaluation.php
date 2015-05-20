<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
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
    protected $table = 'evaluation';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'evaluation_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['evaluation_academic_period_id', 'evaluation_mark_id',
        'evaluation_student_id', 'evaluation_study_subModule_id', 'evaluation_lastUpdateUserId'];

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

    /**
     * This belong to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('Evaluation\User', 'evaluation_student_id');
    }

    /**
     * This belongs to one mark
     *
     * @return mixed
     */
    public function mark()
    {

        return $this->belongsTo('Evaluation\Mark', 'evaluation_mark_id')->select(array('mark_id', 'mark_value'));

    }

    /**
     * This belongs to one study_submodules
     *
     * @return mixed
     */
    public function studySubModules()
    {

        return $this->belongsto('Evaluation\StudySubmodules', 'evaluation_study_subModule_id')
            ->select(array('study_submodules_id', 'study_submodules_shortname', 'study_submodules_name', 'study_submodules_study_module_id'));
    }

    /**
     * this belongs to one academic period
     *
     * @return mixed
     */
    public function academicPeriods()
    {

        return $this->belongsTo('Evaluation\AcademicPeriods', 'evaluation_academic_period_id')
            ->select(array('academic_periods_id', 'academic_periods_name'));
    }


}
