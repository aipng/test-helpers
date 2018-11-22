<?php

declare(strict_types = 1);

namespace AipNg\TestHelpersTests\Traits;

final class MyObject extends AbstractObject
{

	/** @var string */
	private $privateVar;


	public function getPrivateVar(): string
	{
		return $this->privateVar;
	}

}
