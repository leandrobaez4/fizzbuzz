<?php

namespace App\Controller;

class Multiples extends Main
{

	private $min;
	private $max;	

	public function output()
	{
		if (!isset($_SERVER["PATH_INFO"])) {
			header('HTTP/1.1 404 Not Found');
			exit;
		}

		$path_info = explode('/', $_SERVER["PATH_INFO"]);

		if ($path_info[1] != 'fizzbuzz') {
			header('HTTP/1.1 404 Not Found');
			exit;
		}

		//Here it validates if the min parameter is an integer and is not empty
		$valid_param_min = (isset($path_info[2]) && (!preg_match('/^-?[0-9]*$/', $path_info[2]) || $path_info[2] == ''));

		if (!isset($path_info[2]) || $valid_param_min) {
			header('HTTP/1.1 404 Not Found');
			exit;
		}

		//Here it validates if the max parameter is an integer and is not empty
		$valid_param_max = (isset($path_info[3]) && (!preg_match('/^-?[0-9]*$/', $path_info[3]) || $path_info[3] == ''));

		if (!isset($path_info[3]) || $valid_param_max) {
			header('HTTP/1.1 404 Not Found');
			exit;
		}

		//Here it validates if there are more parameters than allowed
		if (count($path_info) > 4 && !empty($path_info[4])) {
			header('HTTP/1.1 404 Not Found');
			exit;
		}

		$this->min = $path_info[2];
		$this->max = $path_info[3];

		header('Content-Type: application/json');
		$output = $this->loop($this->min, $this->max);
		echo json_encode($output);
	}

	public function loop($min, $max)
	{
		$output = [];
		$this->logger->info('----- Start loop ------');
		while ($min <= $max) {
			if ($this->isMultipleThree($min) && $this->isMultipleFive($min)) {
				$output[] = 'FizzBuzz';
				$this->logger->info('loop: '.$min.' - '.'FizzBuzz');
			} elseif ($this->isMultipleThree($min)) {
				$output[] = 'Fizz';
				$this->logger->info('loop: '.$min.' - '.'Fizz');
			} elseif ($this->isMultipleFive($min)) {
				$output[] = 'Buzz';
				$this->logger->info('loop: '.$min.' - '.'Buzz');
			} else {
				$output[] = (int)$min;
				$this->logger->info('loop: '.$min.' - '.'None');
			}
			$min++;
		}
		$this->logger->info('----- End loop ------');

		return $output;
	}

	private function isMultipleThree($value)
	{
		return ($value % 3 == 0);
	}

	private function isMultipleFive($value)
	{
		return ($value % 5 == 0);
	}
}
