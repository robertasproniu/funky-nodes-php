<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 21:19
 */

namespace SortableCollection\Collection\Sortable;

use Closure;
use SortableCollection\Contracts\Sortable\SortableInterface;

class SortableArray implements SortableInterface
{
    private $comparator = null;

    /**
     * Sort array by given comparator
     *
     * @param array $items
     * @param Closure $comparator
     * @return array
     */
    public function sort(array $items, Closure $comparator): array
    {
        $this->comparator = $comparator;

        $this->applySort($items);

        return $items;
    }

    /**
     * Sort array algorithm
     *
     * @param array $items
     */
    private function applySort(array &$items)
    {
        if (count($items) < 2)
        {
            return;
        }

        $nextItems = array_splice($items, ceil(count($items) / 2) );

        $this->applySort($items);

        $this->applySort($nextItems);

        $orderedItems = [];

        while (!empty($items) || !empty($nextItems)) {

            if (empty($items) || empty($nextItems))
            {
                $orderedItems[] = empty($items) ? array_shift($nextItems) : array_shift($items);

                continue;
            }

            $orderedItems[] = call_user_func($this->comparator, $items[0], $nextItems[0]) ? array_shift($nextItems) : array_shift($items);
        }

        $items = $orderedItems;
    }
}