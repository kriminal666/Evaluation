<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

use Illuminate\database\Eloquent\SoftDeletes;

/**
 * Class AcademicPeriods
 * @package Evaluation
 */
class AcademicPeriods extends Model
{

    //Use softDeletes
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academic_periods';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'academic_periods_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['academic_periods_shortname', 'academic_periods_name',
        'academic_periods_alt_name', 'academic_periods_initial_date', 'academic_periods_final_date'];

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'academic_periods_entryDate';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'academic_periods_last_update';

    /**
     * The name of the "markedForDeletionDate" column.
     *
     * @var string
     */
    const DELETED_AT = 'academic_periods_markedForDeletionDate';

    /**
     * this has many evaluations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluation()
    {

        return $this->hasMany('Evaluation\Evaluation', 'evaluation_academic_period_id');
    }

}
