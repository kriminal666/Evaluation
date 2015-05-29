<?php namespace Evaluation\Transformers;
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/05/15
 * Time: 20:05
 */

/**
 * Class Transformer
 * @package Evaluation\Transformers
 */
abstract class Transformer
{

    /**
     * Transform collection
     *
     * @method
     * @param $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * Transform
     *
     * @method
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}