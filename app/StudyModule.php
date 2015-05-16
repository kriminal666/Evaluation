<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyModule extends Model
{

    //Use softdeletes
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'study_module';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'study_module_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'study_module_description',
        'study_module_hoursPerWeek',
        'study_module_name',
        'study_module_shortname',
        'study_module_subtype',
        'study_module_type',
        'study_module_order'
    ];

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'study_module_entryDate';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'study_module_last_update';

    /**
     * The name of the "markedForDeletionDate" column.
     *
     * @var string
     */
    const DELETED_AT = 'study_module_markedForDeletionDate';

    /**
     * This has many study_submodules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studySubModules()
    {
        return $this->hasMany('Evaluation\StudySubmodules', 'study_submodules_study_module_id');
    }


}
