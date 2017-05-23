<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 20:48
 */

namespace SortableNodes\Contracts\Sortable;


use Closure;

interface SortableInterface
{
    /**
     * Sort array by given comparator
     *
     * @param array $items
     * @param Closure $comparator
     * @return array
     */
    public function sort(array $items, Closure $comparator) : array;
}