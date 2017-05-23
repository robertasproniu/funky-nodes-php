<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 20:50
 */

namespace SortableNodes\Contracts\Collection;


use Closure;

interface CollectionInterface
{
    /**
     * Get all items of colletions
     *
     * @return array
     */
    public function get() : array;


    /**
     * Merge collections
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function merge(CollectionInterface $collection) : CollectionInterface;

    /**
     * Make collection items to be unique
     *
     * @return CollectionInterface
     */
    public function unique() : CollectionInterface;

    /**
     * Sort collection items
     *
     * @param Closure $comparator
     * @return CollectionInterface
     */
    public function sort(Closure $comparator) : CollectionInterface;

}