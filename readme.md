#Sortable Collection of Nodes

An example package that allows to create, merge and sort collections of nodes.

Collections are sorted using custom algorithm wich can be found in ``SortableArray.php`` file

**An example set of nodes**

````
a/1, a/2, b/10, c/20, a/100
````
---
**To install use:**
````
composer require robertasproniu/php-sortable-nodes
````

**To run the tests:**
````shell
./vendor/bin/phpunit
````
---

**Creating a collection**
````php
use SortableNodes\Collection\Collection;
$collection = new Collection($items); // where $items = []
````
or using a factory class
````php
use SortableNodes\CollectionFactory;
use SortableNodes\Collection\Collection;

class CustomCollectionFactory extends CollectionFactory
{
    public static function create($items) : CollectionInterface
    {
        // do whatever you need 
        
        return new Collection($items);
    }
}

$collection = CustomCollectionFactory::create($data); 
````
**Get items form collection**
````php
$collection->get(); // return array
````

**Remove duplicate values from a collection**
````php
$collection->unique();
````

**Sort collection values**
````php
$collection->sort(function($value1, $value2){
    //conditions
});
````