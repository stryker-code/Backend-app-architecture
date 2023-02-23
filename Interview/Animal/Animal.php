<?php 

class Animal
{
	protected string $name;

    /**
     * Animal constructor.
     *
     * @param $name
     */
	function __construct($name)
    {
        $this->name = $name;
	}


	function getName(): string
    {
		return $this->name;
	}
}