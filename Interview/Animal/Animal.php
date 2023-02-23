<?php 

abstract class Animal
{
	protected string $name;

	function __construct(string $name)
    {
        $this->name = $name;
	}

	public function getName(): string
    {
		return $this->name;
	}
}