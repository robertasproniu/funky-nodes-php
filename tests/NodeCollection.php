<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 21:35
 */

namespace SortableNodes;


use Exception;
use SortableNodes\Collection\Collection;
use SortableNodes\Contracts\Collection\CollectionInterface;
use SortableNodes\Models\Node;

class NodeCollection extends CollectionFactory
{
    private $nodeInstance = null;

    public function __construct()
    {
       $this->nodeInstance = new Node();
    }

    public static function create($nodes) : CollectionInterface
    {
        try {
            $items = (new static())->parse($nodes);

            if (empty($items)) {
                throw new Exception('String with nodes can\'t be parsed');
            }

            return new Collection($items);

        } catch (Exception $exception) {

            printf($exception->getMessage()) ;

        }
    }

    /**
     * Parse given string
     *
     * @param string $nodes
     * @param string $delimiter
     * @return array
     * @throws Exception
     */
    private function parse(string $nodes, $delimiter = "/"): array
    {
        $parsedNodes = [];

        foreach ((array) preg_split('/[\s,]+/', $nodes) as $node)
        {
            list($string, $number) = explode($delimiter, $node);

            // throw exception if empty values
            if (!isset($string) || !isset($number))
            {
                throw new Exception("Invalid node '$node'");
            }

            // throw exception for bad type of values
            if (!settype($string, 'string') || !settype($number, 'int'))
            {
                throw new Exception("Invalid format '{$string}{$delimiter}{$number}' for node");
            }

            // add to node
            $parsedNodes[$node] = $this->node($string, $number);

        }

        return array_values($parsedNodes);
    }

    /**
     * Create Node with given params
     *
     * @param $string
     * @param $number
     * @return Node
     */
    private function node($string, $number) : Node
    {
        return (clone $this->nodeInstance)->set($string, $number);
    }
}