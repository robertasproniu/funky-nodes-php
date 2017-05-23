<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 21:12
 */

namespace SortableNodes\Collection;


use Closure;
use SortableNodes\Collection\Sortable\SortableArray;
use SortableNodes\Contracts\Collection\CollectionInterface;
use SortableNodes\Contracts\PrintableInterface;

class Collection implements CollectionInterface, PrintableInterface
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Get all items of colletions
     *
     * @return array
     */
    public function get(): array
    {
        return $this->items;
    }

    /**
     * Merge collections
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function merge(CollectionInterface $collection): CollectionInterface
    {
        $this->items = array_merge($this->items, $collection->get());

        return $this;
    }

    /**
     * Make collection items to be unique
     *
     * @return CollectionInterface
     */
    public function unique(): CollectionInterface
    {
        $this->items = array_unique($this->items);

        return $this;
    }

    /**
     * Sort collection items
     *
     * @param Closure $comparator
     * @return CollectionInterface
     */
    public function sort(Closure $comparator): CollectionInterface
    {
        $this->items = (new SortableArray())->sort($this->items, $comparator);

        return $this;
    }


    /**
     * Print object as string
     *
     * @return string
     */
    public function __toString(): string
    {
        return implode(", ", $this->items);
    }
}