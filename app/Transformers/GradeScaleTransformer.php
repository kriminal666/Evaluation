<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/05/15
 * Time: 21:32
 */

namespace Evaluation\Transformers;


class GradeScaleTransformer extends Transformer
{

    /**
     * Transform GradeScale
     *
     * @param $gradeScale
     * @return mixed
     */
    public function transform($gradeScale)
    {
        return [

            'gradeScaleId' => $gradeScale['grade_scale_id'],

            'description' => $gradeScale['grade_scale_description'],

            'creationDate' => $gradeScale['grade_scale_created_at'],

            'creationUserId' => $gradeScale['grade_scale_creationUserId'],

            'updateDate' => $gradeScale['grade_scale_updated_at'],

            'lastUpdateUserId' => $gradeScale['grade_scale_lastUpdateUserId'],

            'softDelete' => $gradeScale['deleted_at']

        ];
    }
}