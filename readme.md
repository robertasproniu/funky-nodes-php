#Sortable Collection of Items

An example package that allows to create, merge and sort collections of items.

Collections are sorted using custom algorithm wich can be found in ``SortableArray.php`` file

**To install use:**
````
composer require robertasproniu/php-sortable-collections dev-master
````

**To run the tests:**
````shell
./vendor/bin/phpunit
````
---

**Creating a collection**
````php
use SortableCollection\Collection\Collection;
$collection = new Collection($items); // where $items = []
````
or using a factory class
````php
use SortableCollection\CollectionFactory;
use SortableCollection\Collection\Collection;

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
**Get items from collection**
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