<?php
abstract class FioDate {

	public static function getDefaultDateFrom() {
		return date('Y-m-d', strtotime('-1 month'));
	}

	public static function getDefaultDateTo() {
		return date('Y-m-d');
	}

	public static function addDay($date) {
		return date('Y-m-d', strtotime("$date +1 day"));
	}

	public static function isValidDateInterval($dateFrom, $dateTo) {
		return self::isValidDate($dateFrom) &&
				self::isValidDate($dateTo) &&
				$dateTo >= $dateFrom &&
				self::isInPast($dateTo);
	}

	private static function isValidDate($date) {
		$dateSegments = explode('-', $date);
		return count($dateSegments) === 3 &&
				checkdate($dateSegments[1], $dateSegments[2], $dateSegments[0]);
	}

	private static function isInPast($date) {
		return time() >= strtotime($date);
	}

}
