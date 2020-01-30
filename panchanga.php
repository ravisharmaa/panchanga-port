<?php

//port of sub numeric_p 
function numeric_p($input) {
	if preg_match('/^-?\d*\.?\d*(e\d|e-\d)?\d*$/', $input) {
		return true;
	} 

	return false;
}


//port of int_p

function int_p($input) {
	if ((numeric_p($input) && is_int($input)) {
		return true;
	} 

	return false;
}

//port of trunc

function trunc($variable) {
	
}