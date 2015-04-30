<?php namespace Evaluation;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table ='evaluation';

    /**
     * Override primary key name
     *
     * @var string
     */
    protected $primaryKey = 'evaluation_id';

}
