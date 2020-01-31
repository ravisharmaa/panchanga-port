<?php

//CONSTANTS

const PI_2 = M_PI * 2;
const RADIANS = 180 / M_PI;
const EPSILON = PHP_FLOAT_EPSILON;

// preferred calculation system i.e SuryaSiddhanta / Panchasiddhanta.
$preferredCalculationSystem = 'SuryaSiddhanta';

// preferred longitude is set to Kathmandu, Nepal.
$preferredLongitude = 85.19;

// prepare Latitude is set to Kathmandu, Nepal.
$preferredLatitude = 27.42;

// Probably the maximum years to be calculated not well documented in the source, inferred by the variable name.
$maxYears = 3000;

// planets name, probably based on Hindu Solar-System.
$planetsName = [
    'star' => 'Star',
    'sun' => 'Sun',
    'moon' => 'Moon',
    'mercury' => 'Mercury',
    'venus' => 'Venus',
    'mars' => 'Mars',
    'jupiter' => 'Jupiter',
    'saturn' => 'Saturn',
    'candrocca' => 'Candrocca',
    'rahu' => 'Rahu',
];

// Variables Declaration, most probably this sets the environment for calculation.
// The starting days from a yuga.
$yugaCivilDays = 1;
$yugaSynodicMonths = 1;
$yugaAdhimasa = 1;
$yugaTithi = 1;
$yugaKsayadina = 1;
$lagna = 1;

// Most probably this also sets the environment, will write comment if I understand this.
$backClongAhar = -1;
$backNcLongAhar = -1;
$backClong = -1;
$backNcLong = -1;

// Preparing the environment for calculation of solar and lunar days. Hindu calendar has two
// types of days solar and lunar which need to be calculated differently.

$day = 1;
$ahar = 1;
$hours = 1;
$minutes = 1;
$julianDay = 1;
$yearKali = 1;
$yearSaka = 1;
$yearVikrama = 1;
$masaNumber = 1; //lunar month
$sauraMasaNumber = 1; //solar month
$tithiDay = 1;
$msLong = 1; // solar position
$tsLong = 1; // solar position
$mlLong = 1; // lunar position
$tlLong = 1; // lunar position
$cLong = 1;
$ncLong = 1;
$tithi = 1;
$fTithi = 1;
$timeEquation = 1;
$sriSeh = 1;
$sriSem = 1;
$weekDayName = 1;
$suklaKrishna = 1;
$adhimasa = 1;
$masa = 1;
$naksatra = 1;
$jovianYearNorth = 1;
$jovianYearSouth = 1;
$samkranti = 1;
$samkrantiYear = 1;
$samkrantiHour = 1;
$samkrantiMin = 1;
$ayanaDegree = 1;
$ayanaMin = 1;
$deshantara = 1;
$counter = 1;

//port of sub numeric_p.
/**
 * @param $input
 *
 * @return bool
 */
function numericPort($input)
{
    if (preg_match('/^-?\d*\.?\d*(e\d|e-\d)?\d*$/', $input)) {
        return true;
    }

    return false;
}

//port of int_p
/**
 * @param $input
 *
 * @return bool
 */
function intPort($input)
{
    if ((numericPort($input) && is_int($input))) {
        return true;
    }

    return false;
}

//port of trunc
/**
 * @param $input
 *
 * @return int
 */
function truncPort($input)
{
    return (int) $input;
}

//port of floor
/**
 * @param $input
 *
 * @return int
 */
function floorPort($input)
{
    $y = (int) $input;

    if ($input < $y) {
        return $y - 1;
    }

    return $y;
}

//port of frac
/**
 * @param $input
 *
 * @return int
 */
function fracPort($input)
{
    return $input - (int) $input;
}

//port of round
function roundPort($input)
{
    return floorPort($input + 0.5);
}

//port of squareRoot
/**
 * @param $input
 *
 * @return float|int
 */
function sqrtPort($input)
{
    return $input * $input;
}

//port of abs

/**
 * @param $input
 *
 * @return float|int
 */
function absPort($input)
{
    if ($input < 0) {
        return $input * -1;
    }

    return $input;
}

//port of zero360

/**
 * @param $input
 *
 * @return float|int
 */
function zero360Port($input)
{
    $longitude = $input - intPort($input / 360) * 360;

    if ($longitude < 0) {
        return $longitude += 360;
    }

    return $longitude;
}

// Because, PHP natively supports tan function and arcsin function port of these is not written.
// In case of ambiguity please refer to `panchanga.pl` added within this repo, to subs tan and arcsin.

//port of threeRelation
/**
 * @param $a
 * @param $b
 * @param $c
 *
 * @return int
 */
function threeRelationPort($a, $b, $c)
{
    if (($a < $b) && ($b < $c)) {
        return 1;
    } elseif (($c < $b) && ($b < $a)) {
        return -1;
    } else {
        return 0;
    }
}
