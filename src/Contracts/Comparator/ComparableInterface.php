<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 21:08
 */

namespace SortableNodes\Contracts\Comparator;


interface ComparableInterface
{
    /**
     * Compare algorithm between 2 items
     *
     * @param ComparableInterface $comparable
     * @return bool
     */
    public function compareWith(ComparableInterface $comparable) : bool;
}