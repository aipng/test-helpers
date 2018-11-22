<?php

declare(strict_types = 1);

namespace AipNg\TestHelpersTests\Traits;

use AipNg\TestHelpers\Traits\PrivatePropertyTrait;
use PHPUnit\Framework\TestCase;

final class PrivatePropertyTraitTest extends TestCase
{

	use PrivatePropertyTrait;


	public function testSetPrivateProperties(): void
	{
		$object = new MyObject;

		$this->setPrivateProperties($object, [
			'privateVar' => 'privateFoo',
			'inheritableVar' => 'inheritableFoo',
		]);

		$this->assertSame('privateFoo', $object->getPrivateVar());
		$this->assertSame('inheritableFoo', $object->getInheritableVar());
	}


	public function testThrowExceptionOnMissingPrivateProperty(): void
	{
		$object = new MyObject;

		$this->expectException(\InvalidArgumentException::class);

		$this->setPrivateProperties($object, [
			'no-variable' => 'foo',
		]);
	}


	public function testThrowExceptionOnMissingProperties(): void
	{
		$object = new MyObject;

		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Undefined variables a, b!');

		$this->setPrivateProperties($object, [
			'a' => 'a',
			'b' => 'b',
		]);
	}

}
