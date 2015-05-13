<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/05/15
 * Time: 20:57
 */

namespace Evaluation\Transformers;


class EvaluationTransformer extends Transformer
{

    /**
     * Transform evaluation
     *
     * @param $evaluation
     * @return array
     */
    public function transform($evaluation)
    {

        return [

            'evaluationId' => $evaluation['evaluation_id'],

            'markId' => $evaluation['evaluation_mark_id'],

            'academicPeriodId' => $evaluation['evaluation_academic_period_id'],

            'subModuleId' => $evaluation['evaluation_study_subModule_id'],

            'studentId' => $evaluation['evaluation_student_id'],

            'creationDate' => $evaluation['evaluation_created_at'],

            'creationUserId' => $evaluation['evaluation_creationUserId'],

            'updateDate' => $evaluation['evaluation_updated_at'],

            'lastUpdateUserId' => $evaluation['evaluation_lastUpdateUserId'],

            'softDelete' => $evaluation['deleted_at']

        ];
    }

}