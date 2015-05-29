<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 14/05/15
 * Time: 19:18
 */

namespace Evaluation\Transformers;

/**
 * Class StudySubmodulesTransformer
 * @package Evaluation\Transformers
 */
class StudySubmodulesTransformer extends Transformer
{

    /**
     * Transform study subModule
     *
     * @method
     * @param $studySubModule
     * @return mixed
     */
    public function transform($studySubModule)
    {
        return [

            'submoduleId' => $studySubModule['study_submodules_id'],

            'shortName' => $studySubModule['study_submodules_shortname'],

            'name' => $studySubModule['study_submodules_name'],

            'moduleId' => $studySubModule['study_submodules_study_module_id'],

            'courseId' => $studySubModule['study_submodules_courseid'],

            'order' => $studySubModule['study_submodules_order'],

            'description' => $studySubModule['study_submodules_description'],

            'creationDate' => $studySubModule['study_submodules_entryDate'],

            'creationUserId' => $studySubModule['study_submodules_creationUserId'],

            'updateDate' => $studySubModule['study_submodules_last_update'],

            'lastUpdateUserId' => $studySubModule['study_submodules_lastupdateUserId'],

            'softDelete' => $studySubModule['study_submodules_markedForDeletionDate'],

            'softDeleteMark' => $studySubModule['study_submodules_markedForDeletion']

        ];
    }
}