<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 24/05/2017
 * Time: 01:37
 */

namespace SortableNodes;


use SortableNodes\Contracts\Collection\CollectionInterface;

abstract class CollectionFactory
{
    /**
     * Create collection
     *
     * @param $items array|string
     * @return CollectionInterface
     */
    abstract public static function create($items) : CollectionInterface;
}