<?php

declare(strict_types = 1);

namespace AipNg\TestHelpers\Traits;

trait PrivatePropertyTrait
{

	/**
	 * @param object $object
	 * @param string $propertyName
	 * @param mixed $value
	 */
	private function setPrivateProperty($object, string $propertyName, $value): void
	{
		try {
			$reflection = new \ReflectionClass($object);
		} catch (\ReflectionException $e) {
			throw new \RuntimeException(sprintf(
				'Unknown class \'%s\'',
				get_class($object)
			));
		}

		if (!$reflection->hasProperty($propertyName)) {
			throw new \InvalidArgumentException(sprintf(
				'Undefined variable \'%s\'!',
				$propertyName
			));
		}

		$property = $reflection->getProperty($propertyName);
		$property->setAccessible(true);
		$property->setValue($object, $value);
		$property->setAccessible(false);
	}


	/**
	 * @param object $object
	 * @param mixed[] $properties , format: string propertyName => mixed value
	 */
	private function setPrivateProperties($object, array $properties): void
	{
		$missingProperties = [];

		foreach ($properties as $propertyName => $value) {
			try {
				$this->setPrivateProperty($object, $propertyName, $value);
			} catch (\InvalidArgumentException $e) {
				$missingProperties[] = $propertyName;
			}
		}

		if (count($missingProperties) > 0) {
			throw new \InvalidArgumentException(sprintf(
				'Undefined variables %s!',
				implode(', ', $missingProperties)
			));
		}
	}

}
