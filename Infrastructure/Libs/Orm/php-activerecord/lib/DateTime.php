<?php

namespace ActiveRecord;

class DateTime extends \DateTime
{
	private $model;
	private $attribute_name;

	public function attribute_of($model, $attribute_name)
	{
		$this->model = $model;
		$this->attribute_name = $attribute_name;
	}

	private function flag_dirty()
	{
		if ($this->model)
			$this->model->flag_dirty($this->attribute_name);
	}

	public function setDate(int $year, int $month, int $day): \DateTime
	{
		$this->flag_dirty();
		return parent::setDate($year, $month, $day);
	}

	public function setISODate(int $year, int $week, int $day = 1): \DateTime
	{
		$this->flag_dirty();
		return parent::setISODate($year, $week, $day);
	}

	public function setTime(int $hour, int $minute, int $second = 0, int $microsecond = 0): \DateTime
	{
		$this->flag_dirty();
		return parent::setTime($hour, $minute, $second, $microsecond);
	}

	public function setTimestamp(int $unixtimestamp): \DateTime
	{
		$this->flag_dirty();
		return parent::setTimestamp($unixtimestamp);
	}
}
