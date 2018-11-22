<?php

declare(strict_types = 1);

namespace AipNg\TestHelpersTests\Traits;

abstract class AbstractObject
{

	/** @var string */
	protected $inheritableVar;


	public function getInheritableVar(): string
	{
		return $this->inheritableVar;
	}

}
