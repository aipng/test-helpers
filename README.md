Test helpers
============

PrivatePropertyTrait
---------------------

Provides an easy way to set private property of an object using reflection.

Do not use in production, use only for testing purposes.

Example:
MyClass.php
```php
final class MyClass
{

	private $foo;

	// ...
}
```

MyClassTest.php
```php
final class MyClassTest extends TestCase
{

	use PrivatePropertyTrait;


	public function testSetPrivateProperties(): void
    {
    	$object = new MyClass;

        $this->setPrivateProperties($object, [
			'foo' => 'bar',
		]);
		
		// ...
	}

}
```
