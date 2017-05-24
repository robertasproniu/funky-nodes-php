<?php
/**
 * Created by PhpStorm.
 * User: robert.aproniu
 * Date: 23/05/2017
 * Time: 20:58
 */

namespace SortableCollection\Contracts;


interface PrintableInterface
{
    /**
     * Print object as string
     *
     * @return string
     */
    public function __toString() : string ;
}