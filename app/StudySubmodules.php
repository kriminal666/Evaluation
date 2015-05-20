<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudySubmodules extends Model
{

    //Use softDeletes
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'study_submodules';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'study_submodules_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'study_submodules_shortname',
        'study_submodules_name',
        'study_submodules_study_module_id',
        'study_submodules_description'
    ];

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'study_submodules_entryDate';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'study_submodules_last_update';

    /**
     * The name of the "markedForDeletionDate" column.
     *
     * @var string
     */
    const DELETED_AT = 'study_submodules_markedForDeletionDate';

    /**
     * This have many Evaluation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {

        return $this->hasMany('Evaluation\Evaluation', 'evaluation_study_subModule_id');
    }

    /**
     * This belongs to one module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyModule()
    {
        return $this->belongsTo('Evaluation\StudyModule', 'study_submodules_study_module_id');
    }

    public function scopeFilterModule($moduleId)
    {
        return $this->studyModule()->where('study_submodules_study_module_id', $moduleId);
    }


}
