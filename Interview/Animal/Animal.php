<?php 

class Animal
{
	protected $name;

	function __construct($name)
    {
        $this->name = $name;
	}

	function getName(): string
    {
		return $this->name;
	}
}