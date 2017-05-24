<?php

/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 24/05/2017
 * Time: 00:54
 */

use PHPUnit\Framework\TestCase;
use SortableCollection\Collection\Collection;


class SortableCollectionTest extends TestCase
{
    private $collection;

    /**
     *
     */
    public function setUp()
    {
        $this->collection = new Collection(['a2', 'a5', 'b5']);
    }

    public function testSort()
    {
        $response = $this->collection
            ->sort(function ( $item1,  $item2) {
                return $item2 < $item1;
            });

        fwrite(STDOUT, $response . "\n");

        $this->assertEquals(
            "a2, a5, b5",
            $response
        );
    }

}