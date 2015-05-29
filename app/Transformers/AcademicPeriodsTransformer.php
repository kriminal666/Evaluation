<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 18/05/15
 * Time: 19:01
 */

namespace Evaluation\Transformers;

/**
 * Class AcademicPeriodsTransformer
 * @package Evaluation\Transformers
 */
class AcademicPeriodsTransformer extends Transformer
{

    /**
     * Transform academic period
     *
     * @method
     * @param $academicPeriod
     * @return mixed
     *
     */
    public function transform($academicPeriod)
    {
        return [

            'academicPeriodId' => $academicPeriod['academic_periods_id'],

            'name' => $evaluation['academic_periods_name'],

            'altName' => $evaluation['academic_periods_alt_name'],

            'shortName' => $evaluation['academic_periods_shortname'],

            'current' => $evaluation['academic_periods_current'],

            'initialDate' => $academicPeriod['academic_periods_initial_date'],

            'finalDate' => $academicPeriod['academic_periods_final_date'],

            'creationDate' => $academicPeriod['academic_periods_entryDate'],

            'creationUserId' => $academicPeriod['academic_periods_creationUserId'],

            'updateDate' => $academicPeriod['academic_periods_last_update'],

            'lastUpdateUserId' => $evaluation['academic_periods_lastupdateUserId'],

            'softDelete' => $evaluation['academic_periods_markedForDeletionDate'],

            'softDeleteMark' => $academicPeriod['academic_periods_markedForDeletion']

        ];
    }
}