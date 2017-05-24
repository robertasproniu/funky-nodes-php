<?php

/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 24/05/2017
 * Time: 00:54
 */

use PHPUnit\Framework\TestCase;
use SortableCollection\Models\Node;
use SortableCollection\NodeCollection;

class SortableNodesTest extends TestCase
{
    private $collection1;
    private $collection2;

    public function setUp()
    {
        $this->collection1 = NodeCollection::create('a/1, a/2, a/3, a/4, a/128, a/129, b/65, b/66, c/1, c/10, c/42');

        $this->collection2 = NodeCollection::create('a/1, a/2, a/3, a/4 a/5, a/126, a/127, b/100, c/2, c/3, d/1');
    }

    public function testResponse()
    {
        $response = $this->collection1
            ->merge($this->collection2)
            ->unique()
            ->sort(function (Node $item1, Node $item2) {
                return $item1->compareWith($item2);
            });

        fwrite(STDOUT, $response . "\n");

        $this->assertEquals(
            "a 1, a 2, a 3, a 4, a 5, a 126, a 127, a 128, a 129, b 65, b 66, b 100, c 1, c 2, c 3, c 10, c 42, d 1",
            $response
        );
    }

}