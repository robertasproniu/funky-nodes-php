<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 21:12
 */

namespace SortableCollection\Collection;


use Closure;
use SortableCollection\Collection\Sortable\SortableArray;
use SortableCollection\Contracts\Collection\CollectionInterface;
use SortableCollection\Contracts\PrintableInterface;

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
        $items = array_merge($this->items, $collection->get());

        return new static($items);
    }

    /**
     * Make collection items to be unique
     *
     * @return CollectionInterface
     */
    public function unique(): CollectionInterface
    {
        $items = array_unique($this->items);

        return new static($items);
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