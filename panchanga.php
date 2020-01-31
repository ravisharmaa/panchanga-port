<?php
//CONSTANTS

CONST PI_2 = pi()*2;
CONST RAD = deg2rad(180/pi());

//port of sub numeric_p
function numericPort($input) {
	if (preg_match('/^-?\d*\.?\d*(e\d|e-\d)?\d*$/', $input)) {
		return true;
	}

	return false;
}


//port of int_p
function intPort($input) {
	if ((numeric_port($input) && is_int($input))) {
		return true;
	}

	return false;
}

//port of trunc
function truncPort($input) {
    return (int) $input;
}

//port of floor
function floorPort($input) {
    $y = (int)$input;

    if ($input < $y) {
        return $y - 1;
    }

    return $y;
}

//port of frac
function fracPort($input) {
    return $x - (int)$input;
}

//port of round
function roundPort($input) {
    return floorPort($input + 0.5);
}

//port of
function sqrtPort($input) {
    return $input * $input;
}


