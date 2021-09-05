<?php 
abstract class Country
{
	protected $__slogan;
	abstract protected function sayHello();
	public function setSlogan($slogan)
	{
		$this->$__slogan = $slogan;
		return $this;
	}
	public function getSlogan()
	{
		return $this->$__slogan;
	}
}

 ?>
