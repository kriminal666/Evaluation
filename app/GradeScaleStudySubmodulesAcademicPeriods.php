<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GradeScaleStudySubmodulesAcademicPeriods
 * @package Evaluation
 */
class GradeScaleStudySubmodulesAcademicPeriods extends Model
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
    protected $table = 'gradeScale_studySubmodules_academicPeriods';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'gradeScale_studySubmodules_academicPeriods_id';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'gradeScale_studySubmodules_academicPeriods_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'gradeScale_studySubmodules_academicPeriods_updated_at';

}
