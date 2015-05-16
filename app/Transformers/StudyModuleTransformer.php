<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 16/05/15
 * Time: 9:51
 */

namespace Evaluation\Transformers;


class StudyModuleTransformer extends Transformer
{

    /**
     * @param $studyModule
     * @return mixed
     */
    public function transform($studyModule)
    {
        return [

            'moduleId' => $studyModule['study_module_id'],

            'description' => $studyModule['study_module_description'],

            'name' => $studyModule['study_module_name'],

            'shortName' => $studyModule['study_module_shortname'],

            'type' => $studyModule['study_module_type'],

            'subType' => $studyModule['study_module_subtype'],

            'order' => $studyModule['study_module_order'],

            'hoursPerWeek' => $studyModule['study_module_hoursPerWeek'],

            'creationDate' => $studyModule['study_module_entryDate'],

            'creationUserId' => $studyModule['study_module_creationUserId'],

            'updateDate' => $studyModule['study_module_last_update'],

            'lastUpdateUserId' => $studyModule['study_module_lastupdateUserId'],

            'softDelete' => $studyModule['study_module_markedForDeletionDate'],

            'softDeleteMark' => $studyModule['study_module_markedForDeletion']

        ];
    }
}