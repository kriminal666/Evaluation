<?php namespace Evaluation\Transformers;
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/05/15
 * Time: 20:11
 */

/**
 * Class MarkTransformer
 * @package Evaluation\Transformers
 */
class MarkTransformer extends Transformer
{

    /**
     * Transform mark
     *
     * @method
     * @param $mark
     * @return array
     */
    public function transform($mark)
    {

        return [

            'markId' => $mark['mark_id'],

            'markValue' => $mark['mark_value'],

            'creationDate' => $mark['mark_created_at'],

            'creationUserId' => $mark['mark_creationUserId'],

            'updateDate' => $mark['mark_updated_at'],

            'lastUpdateUserId' => $mark['mark_lastUpdateUserId'],

            'softDelete' => $mark['deleted_at']

        ];
    }

}