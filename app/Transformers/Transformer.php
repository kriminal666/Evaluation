<?php namespace Evaluation\Transformers;
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/05/15
 * Time: 20:05
 */

abstract class Transformer
{


    /**
     * Transform collection
     *
     * @param $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}