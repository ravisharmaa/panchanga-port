<?php
//!/usr/local/bin/perl
// Version 3.20140315
// 20140223
// 20040205
// 20030430 # 20030331
// 20020320 # 20020308 # 20020304
// 20011118 # 20011114 # 20011109 # 20011107 # 20010416 # 20010412 # 20010409
// 20010328 # 20010325 # 20010316 # 20010313 # 20010312 # 20010311 # 20010310
// 20001231 # 20000910 # 20000614 # 20000613 # 20000522
//{:::::::::::::::::::::::::::}
// {addition in perl version}

    $true       = 1;
    $false      = 0;

    $variabledeclaration = $true;

function numericP($data) {
    if (preg_match('/^-?\d*\.?\d*(e\d|e-\d)?\d*$/', $data)) {
        $true;
    } else {
        $false;
    };
}

function intP($data) {
    if ((numericP($data) && (floor($data) == $data))) {
      $true;
    } else {
      $false;
    };
}

function trunc($x) {
    floor($x);
}

function floor($x) {
    ($y);

    $y = floor($x);
    if ($x < $y) {
        $y - 1;
    } else {
        $y;
    };
}

function frac($x) {
    $x - floor($x);
}

function round($x) {
    floor($x + 0.5);
}

function sqr($x) {
    $x * $x;
}

// arctan(x) --> atan2(x,1)

//{:::::::::::::::::::::::::::}
// { mathematical constants }

    $pi        = atan2(1,1) * 4;
    $pi2       = $pi * 2;
    $rad       = 180 / $pi;
// {for function arcsin}
    $eps       = 1e-6;
// {for calcuration cut off}
// in perl; precision changed
    $epsiron   = 1e-8;

//{:::::::::::::::::::::::::::}
// { settings }

//    $with_bija_pf  = $false;
//    $with_bija_pf  = $true;     #20140315
    $selectedSystem  = 'SuryaSiddhanta';     //20140315
    // 'InPancasiddhantika'
//    $loc_lat       = 28.6;          # {Delhi}#20011114
    $ujjainiLat   = 23.2;          // {Ujjaini}#20020304
    $locLat       = $ujjainiLat;  //20020304
    $ujjainiLon   = 75.8;          // {Ujjaini}#20011114#20020320
    $locLon       = $ujjainiLon;  //20020304
    $yearmax       = 3000;

//{:::::::::::::::::::::::::::}
// {planets}
//    type  planets       = (Star,
//                           Sun, Moon, Mercury, Venus, Mars, Jupiter, Saturn,
//                           Candrocca, Rahu);
    $planetName = [
        'star',      'Star        ',
        'sun',       'Sun         ',
        'moon',      'Moon        ',
        'mercury',   'Mercury     ',
        'venus',     'Venus       ',
        'mars',      'Mars        ',
        'jupiter',   'Jupiter     ',
        'saturn',    'Saturn      ',
        'Candrocca', 'Candrocca   ',
        'Rahu',      'Rahu        ',
    ];
    $planet                = $variabledeclaration;
// (Star, Sun, Moon, Mercury, Venus, Mars, Jupiter, Saturn, Candrocca, Rahu);
    $yugaRotation          ;
    $planetRotation        ;
    $planetSighra          ;
    $planetMeanPosition    ;
    $planetTruePosition    ;
    $planetApogee          ;
    $planetCircumm         ;
    $planetCircums         ;
// key == $planet; value == real;

    $yugaCivilDays    = $variabledeclaration;
    $yugaSynodicMonth = $variabledeclaration;
    $yugaAdhimasa     = $variabledeclaration;
    $yugaTithi        = $variabledeclaration;
    $yugaKsayadina    = $variabledeclaration;
    $lagna            = $variabledeclaration;

//{:::::::::::::::::::::::::::}

    $backClongAhar    = -1;
    $backNclongAhar   = -1;
    $backClong         = -1;
    $backNclong        = -1;

//    type  paksas                                =(suklapaksa, krsnapaksa);
    $year                    = $variabledeclaration;
    $month                   = $variabledeclaration;
    $paksa                   = $variabledeclaration;
// (suklapaksa, krsnapaksa);
    $day                     = $variabledeclaration; // {for ahargana}
    $ahar                    = $variabledeclaration; // {for ahargana}
    $hours                   = $variabledeclaration;
    $minutes                 = $variabledeclaration;
    $julianDay               = $variabledeclaration; // {for Julian days}
    $yearKali                = $variabledeclaration;
    $yearSaka                = $variabledeclaration;
    $yearVikrama             = $variabledeclaration;
    $masaNum                = $variabledeclaration;
    $sauraMasaNum          = $variabledeclaration; //##20000614
    $sauraMasaDay          = $variabledeclaration; //##20001231
    $tithiDay               = $variabledeclaration;
    $mslong                  = $variabledeclaration; // {solar position}
    $tslong                  = $variabledeclaration; // {solar position}
    $mllong                  = $variabledeclaration; // {lunar position}
    $tllong                  = $variabledeclaration; // {lunar position}
    $clong                   = $variabledeclaration;
    $nclong                  = $variabledeclaration;
    $tithi                   = $variabledeclaration;
    $ftithi                  = $variabledeclaration;
    $eqtime                  = $variabledeclaration; // {for equation of time}
    $sriseh                  = $variabledeclaration;
    $srisem                  = $variabledeclaration;
    $weekdayName            = $variabledeclaration;
    $suklaKrsna             = $variabledeclaration;
    $adhimasa                = $variabledeclaration;
    $masa                    = $variabledeclaration;
    $naksatra                = $variabledeclaration;
    $jovianYearNorth       = $variabledeclaration;
    $jovianYearSouth       = $variabledeclaration;
    $samkranti               = $variabledeclaration; //##20010310
    $samkrantiYear          = $variabledeclaration; //##20010310
    $samkrantiMonth         = $variabledeclaration; //##20010310
    $samkrantiDay           = $variabledeclaration; //##20010310
    $samkrantiHour          = $variabledeclaration; //##20010310
    $samkrantiMin           = $variabledeclaration; //##20010310
    $ayanadeg                = $variabledeclaration; //##20010313
    $ayanamin                = $variabledeclaration; //##20010313
    $desantara               = ($locLon - $ujjainiLon) / 360; //20011114 time

    $counter                 = $variabledeclaration;

//{:::::::::::::::::::::::::::}

function abs($x) {
    if ($x < 0) {
        $x * -1;
    } else {
        $x;
    }
}

function zero360($longitude) {
//    $longitude = $longitude - trunc($longitude / 360) * 360;
// in perl: trunc --> int
    $longitude = $longitude - floor($longitude / 360) * 360;
    if ($longitude < 0) {
        $longitude = $longitude + 360;
    }
    $longitude;
}

function tan($x) {
    sin($x) / cos($x);
}

function arcsin() { //##20010316
    list($x) = $fake/*check:@*/;

    if ($eps < abs(1 - sqr($x))) {
        atan2($x / sqrt(1 - sqr($x)), 1);
    } elseif (0 < $x) {          // {x is neary to 1}
        $pi / 2;          // {sin(pi/2)=1}
    } else {          // {x is neary to -1}
        3 * $pi / 2;          // {sin(3 pi/2)=-1}
    }
}

function threeRelation($a, $b, $c) {
    if (($a < $b) && ($b < $c)) {
        1;
    } elseif (($c < $b) && ($b < $a)) {
        -1;
    } else {
        0;
    }
}

//{:::::::::::::::::::::::::::}
// { from one date to another date }

function nextDate($year, $month, $day) {
    $day = $day + 1;
    if ($month == 2) {
        if (29 < $day) {
          $day = 1;
          $month = $month + 1;
// ignoring the skipping year !!!
        }
    } elseif (($month == 4) ||
             ($month == 6) ||
             ($month == 9) ||
             ($month == 11)) {
        if (30 < $day) {
          $day = 1;
          $month = $month + 1;
        }
    } else {
        if (31 < $day) {
          $day = 1;
          $month = $month + 1;
        }
    }
    if (12 < $month) {
      $month = 1;
      $year = $year + 1;
    }

    if (moderndateToJulianday($year, $month, $day) ==
        moderndateToJulianday($year, $month + 1, 1)) {
      ($year, $month + 1, 1)
    } else {
      ($year, $month, $day)
    }
}

// procedure prec_tithi(var YearSaka, masa_num	:integer;
//                      var paksa			:paksas;
//                      var tithi_day		:integer);
//   begin
//     if tithi_day = 1 then begin
//       tithi_day := 15;
//       if paksa = suklapaksa then begin
//         paksa := krsnapaksa;
//         dec(masa_num);
//         if masa_num < 0 then begin
//           masa_num := 11;
//           dec(YearSaka)
//         end
//       end
//       else paksa := suklapaksa;
//     end
//     else dec(tithi_day);
//   end;

// procedure next_tithi(var YearSaka, masa_num	:integer;
//                      var paksa			:paksas;
//                      var tithi_day		:integer);
//   begin
//     if tithi_day = 15 then begin
//       tithi_day := 1;
//       if paksa = krsnapaksa then begin
//         paksa := suklapaksa;
//         inc(masa_num);
//         if 11 < masa_num then begin
//           masa_num := 0;
//           inc(YearSaka)
//           end
//         end
//       else paksa := krsnapaksa;
//       end
//     else inc(tithi_day);
//   end;

function moderndateToJulianday($year, $month, $day) {
    ($julianDay);

    if ($month < 3) {
        $year = $year -1 ;
        $month = $month + 12;
    }

    $julianDay = floor(365.25 * $year) + floor(30.59 * ($month - 2)) + $day + 1721086.5;
    if ($year < 0) {
        $julianDay = $julianDay - 1;
        if ((($year % 4) == 0) && (3 <= $month)) {
            $julianDay = $julianDay + 1;
        }
    }
    if (2299160 < $julianDay) {
        $julianDay = $julianDay + floor($year / 400) - floor($year / 100) + 2;
    }

    $julianDay;
}

function julianInEnglandP() {//##20030331
    list($julianDay) = $fake/*check:@*/;

    if ((2299160 < $julianDay) && ($julianDay <= 2361221)) {
      $true;
    } else {
      $false;
    };

}

//sub JulianDay_to_JulianDate {###20030331
//    local($JulianDay) = @_;
//
//    local($a, $b, $c, $e, $f, $g, $h);
//    local($year, $month, $day); ###20010313
//
//    $a = int($JulianDay) + 68607;
//    $b = int($a / 36525);
//    $c = $a - int(36525 * $b);
//    $e = int(($c + 1) / 365.25);
//
//    $f = $c - int(365.25 * $e) + 31;
//    $g = int($f / 30.59);
//    $h = int($g / 11);
//    $day = &trunc($f - int(30.59 * $g) + ($JulianDay - int($JulianDay)));
//    $month = &trunc($g - 12 * $h + 2);
//    $year = &trunc(100 * ($b - 49) + $e + $h);
//    ($year, $month, $day);
//}

function juliandayToJuliandate() {//##20040205
    list($julianDay) = $fake/*check:@*/;

    ($j, $k, $l, $n, $i, $J, $I);
    ($year, $month, $day);

    $j = floor($julianDay) + 1402;
    $k = floor(($j - 1) / 1461);
    $l = $j - 1461 * $k;
    $n = floor(($l - 1) / 365) - floor($l / 1461);
    $i = $l - 365 * $n  + 30;
    $J = floor(80 * $i / 2447) ;
    $day = $i - floor(2447 *$J / 80);
    $I = floor($J / 11);
    $month =  $J + 2 -12 * $I;
    $year = 4 * $k + $n +$I - 4716;
    ($year, $month, $day);
}

function juliandayToGregoriandate() {//##20030331
    list($julianDay) = $fake/*check:@*/;

    ($a, $b, $c, $e, $f, $g, $h);
    ($year, $month, $day); //##20010313

    $a = $julianDay + 68569;
    $b = floor($a / 36524.25);
    $c = $a - floor(36524.25 * $b + 0.75);
    $e = floor(($c + 1) / 365.2425);

    $f = $c - floor(365.25 * $e) + 31;
    $g = floor($f / 30.59);
    $h = floor($g / 11);
    $day = trunc($f - floor(30.59 * $g) + ($julianDay - floor($julianDay)));
    $month = trunc($g - 12 * $h + 2);
    $year = trunc(100 * ($b - 49) + $e + $h);
    ($year, $month, $day);
}

function juliandayToModerndate() {//##20030331
    list($julianDay) = $fake/*check:@*/;

    ($year, $month, $day);


    if ($julianDay < 2299239) {
        juliandayToJuliandate($julianDay);
    } else {
        juliandayToGregoriandate($julianDay);
    }

}

// killed ###20030331
//sub JulianDay_to_ModernDate {
//    local($JulianDay) = @_;
//
//    local($a, $b, $c, $e, $f, $g, $h);
//    local($year, $month, $day); ###20010313
//
//    if ($JulianDay < 2299239) {
//        $a = int($JulianDay) + 68607;
//        $b = int($a / 36525);
//        $c = $a - int(36525 * $b);
//        $e = int(($c + 1) / 365.25);
//    } else {
//        $a = $JulianDay + 68569;
//        $b = int($a / 36524.25);
//        $c = $a - int(36524.25 * $b + 0.75);
//        $e = int(($c + 1) / 365.2425);
//    }
//
//    $f = $c - int(365.25 * $e) + 31;
//    $g = int($f / 30.59);
//    $h = int($g / 11);
//    $day = &trunc($f - int(30.59 * $g) + ($JulianDay - int($JulianDay)));
//    $month = &trunc($g - 12 * $h + 2);
//    $year = &trunc(100 * ($b - 49) + $e + $h);
//    ($year, $month, $day);
//}

function juliandayToAhargana() {
// {from epoch midnight to given midnight}
    list($julianDay) = $fake/*check:@*/;

    $julianDay - 588465.50;
}

function aharganaToJulianday($ahar) {
    588465.50 + $ahar;
}

function aharganaToKali($ahar) {
// global variables: $YugaRotation{'sun'}, $YugaCivilDays

    trunc($ahar * $yugaRotation['sun'] / $yugaCivilDays);
}

function kaliToAhargana($yearKali, $masaNum, $tithiDay) {
// global variables: $YugaAdhimasa, $YugaRotation{'sun'}, $YugaKsayadina, $YugaTithi

    ($sm, $cm, $adhim, $avama, $tithi);

    $sm = $yearKali;
    $sm = $sm * 12 + $masaNum; // {expired saura masas}
    $adhim = floor($sm * $yugaAdhimasa / (12 * $yugaRotation['sun'])); // {expired adhimasas}
    $cm = $sm + $adhim; // {expired candra masas}
    $tithi = 30 * $cm + $tithiDay -1; // {expired tithis}
    $avama = floor($tithi * $yugaKsayadina / $yugaTithi); // {expired avamas}

    $tithi - $avama; // {ahargana from Kali epoch to given date}
}

function kaliToSaka($yearKali) {
    $yearKali - 3179;
}

function sakaToKali($yearSaka) {
    $yearSaka + 3179;
}

//{:::::::::::::::::::::::::::}
// { condition check }

function adhimasaP($clong, $nclong) {
    if (trunc($clong / 30) == trunc($nclong / 30)) {
        $true;
    } else {
        $false;
    }
}

//{:::::::::::::::::::::::::::}
//  { INPUT }

function readReal($message, $min, $max) {
    ($number);

    print $message;
    $number = /*check:chop*/substr($number = <>, 0, -1);
    if ((preg_match('/^$/', $number)) ||
        !numericP($number) ||
        ($number < $min) ||
        ($max < $number)) {
        print " Number is not appropriate.\n";
        readReal($message, $min, $max);
    } else {
        $number;
    }
}

function readInteger($message, $min, $max) {
    ($number);

    print $message;
    $number = /*check:chop*/substr($number = <>, 0, -1);
    if ((preg_match('/^$/', $number)) ||
        !intP($number) ||
        ($number < $min) ||
        ($max < $number)) {
        print " Number is not appropriate.\n";
        readInteger($message, $min, $max);
    } else {
        $number;
    }
}



function showMapOfIndia() {

    print " ------------------------------------------------------------ \n";
    print "|                  Latitude                                  |\n";
    print "|                                                            |\n";
    print "|_____                              ______36                 |\n";
    print "|                  *                         Srinagar:34.1   |\n";
    print "|_____                              ______32                 |\n";
    print "|                    *                       Delhi:28.6      |\n";
    print "|_____                         *    ______28 Kathmandu:27.7  |\n";
    print "|                          *                 Varanasi:25.3   |\n";
    print "|_____ ---\\                         ______24 Ujjain:23.2     |\n";
    print "|          \\//      *           *___         Calcutta:22.6   |\n";
    print "|_____       \\_/|             _/~   ~_____20                 |\n";
    print "|               |*          _/               Bombay:19.0     |\n";
    print "|_____           \\     *  _/        ______16 Hyderabad:17.4  |\n";
    print "|                 \\      |                                   |\n";
    print "|_____             \\    *|          ______12 Madras:13.1     |\n";
    print "|                   \\   /                                    |\n";
    print "|_____               \\*/ /\\         ______08 Trivandrum:8.5  |\n";
    print "|                       |* |                 Colombo:6.9     |\n";
    print "|_____                   --         ______04                 |\n";
    print "|                                                            |\n";
    print " ------------------------------------------------------------ \n";

}

function readLocalLatitude() {

    readReal(" Input local latitude in degree = ", -80, 80);
}

function showMapOfIndiaLongitude() {//20011114

    print " ------------------------------------------------------------ \n";
    print "|                  Longitude                                 |\n";
    print "|            |     |     |     |     |                       |\n";
    print "|            |     |     |     |     |                       |\n";
    print "|                  *                         Srinagar:74.8   |\n";
    print "|                                                            |\n";
    print "|                    *                       Delhi:77.2      |\n";
    print "|                              *             Kathmandu:85.2  |\n";
    print "|                          *                 Varanasi:83.0   |\n";
    print "|      ---\\                                  Ujjain:75.8     |\n";
    print "|          \\//      *           *___         Calcutta:88.4   |\n";
    print "|            \\_/|             _/~   ~                        |\n";
    print "|               |*          _/               Bombay:72.8     |\n";
    print "|                \\     *  _/                 Hyderabad:78.5  |\n";
    print "|                 \\      |                                   |\n";
    print "|                  \\    *|                   Madras:80.2     |\n";
    print "|                   \\   /                                    |\n";
    print "|                    \\*/ /\\                  Trivandrum:77.0 |\n";
    print "|                       |* |                 Colombo:79.9    |\n";
    print "|            |     |     --    |     |                       |\n";
    print "|            |     |           |     |                       |\n";
    print "|            70          80          90                      |\n";
    print " ------------------------------------------------------------ \n";

}

function readLocalLongitude() {//20011114

    readReal(" Input local longitude in degree = ", -180, 180);
}

function readDate() {
// global variables: $yearmax

    ($year, $month, $day);
    ($inputdata);

    print " Year  Month  Day = ";
    $inputdata = /*check:chop*/substr($inputdata = <>, 0, -1);
    list($year, $month, $day) = preg_split('/ +/', $inputdata, 3);

    if (!/*check*/isset($day) ||
        !intP($year) ||
//        ($year < -$yearmax) ||
        ($yearmax < $year) ||
        !intP($month) ||
        ($month < 1) ||
        (12 < $month) ||
        ($day < 0) ||
        (32 < $day)) {
        print " Date is not appropriate.\n";
        readDate;
    } elseif (juliandayToAhargana(moderndateToJulianday($year, $month, $day)) < -1) {
//        print " The days before the epoc of Kali are not known to us.\n";
        print " Date is not appropriate.\n";
        readDate;
    } else {
        ($year, $month, $day);
    }
}

function readTime() {

    ($hours, $minutes);
    ($inputdata);

    print " Time in hours and minutes = ";
    $inputdata = /*check:chop*/substr($inputdata = <>, 0, -1);
    list($hours, $minutes) = preg_split('/ +/', $inputdata, 2);

    if (!/*check*/isset($minutes) ||
        !intP($hours) ||
        ($hours < 0) ||
        (24 <= $hours) ||
        ($minutes < 0) ||
        (60 <= $minutes)) {
        print " Time is not appropriate.\n";
        readTime;
    } else {
        ($hours, $minutes);
    }
}

function readChar($message) {
    ($character);

    print $message;
    $character = /*check:chop*/substr($character = <>, 0, -1);
    preg_match('y/a-z/A-Z/', $character);
    $character = substr($character, 0, 1);
    $character = $character . " ";
    $character = substr($character, 0, 1);

}

function readIndianDate() {

    ($sakaYear, $vikramaYear, $masaNum, $paksa, $tithiDay);
    ($paksaAns);

    print " 0(11).Caitra    1( 0).Vaisakha   2( 1).Jyaistha 3( 2).Asadha\n";
    print " 4( 3).Sravana   5( 4).Bhadrapada 6( 5).Asvina   7( 6).Karttika\n";
    print " 8( 7).Margasira 9( 8).Pausa     10( 9).Magha   11(10).Phalguna\n";

    $yearAns = readChar(   "Saka years or Vikrama years? ...S/V      ");
    while (! (preg_match('/[SV]/', $yearAns))) {
        $yearAns = readChar("Saka years or Vikrama years? ...S/V      ");
    }
    if ($yearAns === "S") {
        $sakaYear = readInteger("Saka years expired:                ", 0, $yearmax);
    } else {
        $vikramaYear = readInteger("Vikrama years expired:                ", 0, $yearmax);
	$sakaYear = $vikramaYear - 135;
    }
    print "If purnimanta and krsna-paksa, enter the number in brackets\n";
    $masaNum  = readInteger("Enter masa by the number:          ", 0, 11);
    $paksaAns = readChar(   "Sukla- or Krsnapaksa ? ...s/k      ");
    while (! (preg_match('/[KS]/', $paksaAns))) {
        $paksaAns = readChar("Sukla- or Krsnapaksa ? ...s/k      ");
    }
    if ($paksaAns === "S") {
        $paksa = 'Suklapaksa';
    } else {
        $paksa = 'Krsnapaksa';
    }
    $tithiDay = readInteger("Enter tithi by the number 1 to 15: ", 1, 15);

    ($sakaYear, $masaNum, $paksa, $tithiDay);
}


//{:::::::::::::::::::::::::::}
// { get names }
function getWeekdayName($julianDay) {
    $weekdayName = [
        0, 'Monday',
        1, 'Tuesday',
        2, 'Wednesday',
        3, 'Thursday',
        4, 'Friday',
        5, 'Saturday',
        6, 'Sunday'
    ];

    $weekdayName[trunc($julianDay + 0.5) % 7];
}

function getSuklaKrsna($paksa) {
    $paksa;
}

function getAdhimasa($clong, $nclong) {
    if (adhimasaP($clong, $nclong)) {
        "Adhika-";
    } else {
        "";
    }
}

function getMasaName($number) {
    $masaName = [
        0, 'Caitra    ',
        1, 'Vaisakha  ',
        2, 'Jyaistha  ',
        3, 'Asadha    ',
        4, 'Sravana   ',
        5, 'Bhadrapada',
        6, 'Asvina    ',
        7, 'Karttika  ',
        8, 'Margasirsa',
        9, 'Pausa     ',
        10,'Magha     ',
        11,'Phalguna  '
    ];

    $masaName[$number];
}

function getSauraMasaName() { //##20000613
    list($number) = $fake/*check:@*/;

    $sauraMasaName = [
        0, 'Mesa   ',
        1, 'Vrsa   ',
        2, 'Mithuna',
        3, 'Karkata',
        4, 'Simha  ',
        5, 'Kanya  ',
        6, 'Tula   ',
        7, 'Vrscika',
        8, 'Dhanus ',
        9, 'Makara ',
        10,'Kumbha ',
        11,'Mina   '
    ];

    $sauraMasaName[$number];
}

function getKaranaName($tithi) {
    $karanaName = [
        0, 'kiMstughna',
        1, 'bava      ',
        2, 'bAlava    ',
        3, 'kaulava   ',
        4, 'taitila   ',
        5, 'gara      ',
        6, 'vaNij     ',
        7, 'viSTi     ',
        8, 'zakuni    ',
        9, 'catuSpada ',
        10,'nAga      '
    ];
    ($karana);

    $karana = trunc(2 * $tithi);
    if ($karana == 0) {
        $karanaName[0];}
    elseif ($karana < 57) {
        $karana = $karana % 7;  //###20000910 few lines modified
        if ($karana ==0){
            $karanaName[7];
        } elseif ($karana !=0){
            $karanaName[$karana];
        }
    } elseif ($karana == 57) {  //###20010409
        $karanaName[8];
    } elseif ($karana == 58) {
        $karanaName[9];
    } elseif ($karana == 59) {
        $karanaName[10];
    }
}

function getYogaName($tslong, $tllong) {
    $yogaName = [
        0,  'viSkambha',
        1,  'prIti',
        2,  'AyuSmat',
        3,  'saubhAgya',
        4,  'zobhana',
        5,  'atigaNDa',
        6,  'sukarman',
        7,  'dhRti',
        8,  'zUla',
        9,  'gaNDa', //20010312
        10, 'vRddhi',
        11, 'dhruva',
        12, 'vyAghAta',
        13, 'harSaNa',
        14, 'vajra',
        15, 'siddhi',
        16, 'vyatIpAta',
        17, 'varIyas',
        18, 'parigha',
        19, 'ziva',
        20, 'siddha',
        21, 'sAdhya',
        22, 'zubha',
        23, 'zukla',
        24, 'brahman',
        25, 'aindra',
        26, 'vaidhRti',
        27, 'viSkambha'
    ];
    ($yoga1, $yoga);

    $yoga1 = zero360($tslong + $tllong);
    $yoga = trunc($yoga1 * 27 / 360);
    $yogaName[$yoga];
}

function getNaksatraName($tllong) {
    $naksatraName = [
        0, 'Asvini',
        1, 'Bharani',
        2, 'Krttika',
        3, 'Rohini',
        4, 'Mrgasira',
        5, 'Ardra',
        6, 'Punarvasu',
        7, 'Pusya',
        8, 'Aslesa',
        9, 'Magha',
        10,'P-phalguni',
        11,'U-phalguni',
        12,'Hasta',
        13,'Citra',
        14,'Svati',
        15,'Visakha',
        16,'Anuradha',
        17,'Jyestha',
        18,'Mula',
        19,'P-asadha',
        20,'U-asadha',
        21,'Sravana',
        22,'Dhanistha',
        23,'Satabhisaj',
        24,'P-bhadrapada',
        25,'U-bhadrapada',
        26,'Revati',
        27,'Asvini'
    ];

    $naksatraName[trunc($tllong * 27 / 360)];
}

function getJovianYearName($yearKali) {
    $jovianYearName = [
        0, 'kSaya(60)',
        1, 'prabhava(1)',
        2, 'vibhava(2)',
        3, 'zukla(3)',
        4, 'pramoda(4)',
        5, 'prajApati(5)',
        6, 'aGgiras(6)',
        7, 'zrImukha(7)',
        8, 'bhAva(8)',
        9, 'yuvan(9)',
        10,'dhAtR(10)',
        11,'Izvara(11)',
        12,'bahudhArya(12)',
        13,'pramAthin(13)',
        14,'vikrama(14)',
        15,'vRSa(15)',
        16,'citrabhAnu(16)',
        17,'subhAnu(17)',
        18,'tAraNa(18)',
        19,'pArthiva(19)',
        20,'vyaya(20)',
        21,'sarvajit(21)',
        22,'sarvadhArin(22)',
        23,'virodhin(23)',
        24,'vikRta(24)',
        25,'khara(25)',
        26,'nandana(26)',
        27,'vijaya(27)',
        28,'jaya(28)',
        29,'manmatha(29)',
        30,'durmukha(30)',
        31,'hemalamba(31)',
        32,'vilambin(32)',
        33,'vikArin(33)',
        34,'zArvari(34)',
        35,'plava(35)',
        36,'zubhakRt(36)',
        37,'zobhana(37)',
        38,'krodhin(38)',
        39,'vizvAvasu(39)',
        40,'parAbhava(40)',
        41,'plavaGga(41)',
        42,'kIlaka(42)',
        43,'saumya(43)',
        44,'sAdhAraNa(44)',
        45,'virodhakRt(45)',
        46,'paridhAvin(46)',
        47,'pramAdin(47)',
        48,'Ananda(48)',
        49,'rAkSasa(49)',
        50,'anala(50)',
        51,'piGgala(51)',
        52,'kAlayukta(52)',
        53,'siddhArthin(53)',
        54,'raudra(54)',
        55,'durmati(55)',
        56,'dundubhi(56)',
        57,'rudhirodgArin(57)',
        58,'raktAkSa(58)',
        59,'krodhana(59)'
    ];
    ($jovianYear);

    $jovianYear = (trunc(($yearKali * 211 - 108) / 18000) + $yearKali + 27) % 60;
    $jovianYearName[$jovianYear];
}

function getJovianYearNameSouth($yearKali) {
    ($jovianYear);

    if ($yearKali < 4009) {
        $jovianYear = $yearKali;
    } else {
        $jovianYear = ($yearKali - 14) % 60;
    }
    getJovianYearName($jovianYear);
}

//{:::::::::::::::::::::::::::}
// 20140315
function setPrimaryConstantSuryasiddhanta() {// Saura, HIL, p.15
    $yugaRotation['star']       = 1582237828;
    $yugaRotation['sun']        = 4320000;
    $yugaRotation['moon']       = 57753336;
    $yugaRotation['mercury']    = 17937060;
    $yugaRotation['venus']      = 7022376;
    $yugaRotation['mars']       = 2296832;
    $yugaRotation['jupiter']    = 364220;
    $yugaRotation['saturn']     = 146568;
    $yugaRotation['Candrocca']  = 488203;
    $yugaRotation['Rahu']       = -232238;
}

// 20140315
function setPrimaryConstantInpancasiddhantika() {// Latadeva/Ardharatrika, HIL, p.15
    $yugaRotation['star']       = 1582237800;
    $yugaRotation['sun']        = 4320000;
    $yugaRotation['moon']       = 57753336;
    $yugaRotation['mercury']    = 17937000;
    $yugaRotation['venus']      = 7022388;
    $yugaRotation['mars']       = 2296824;
    $yugaRotation['jupiter']    = 364220;
    $yugaRotation['saturn']     = 146564;
    $yugaRotation['Candrocca']  = 488219;
    $yugaRotation['Rahu']       = -232226;
}

// 20140315
function setPrimaryConstant() {
    if ($selectedSystem === 'SuryaSiddhanta') {
      setPrimaryConstantSuryasiddhanta;
    } elseif ($selectedSystem === 'InPancasiddhantika') {
      setPrimaryConstantInpancasiddhantika;
    } else {
      setPrimaryConstantSuryasiddhanta;
    }
}

// 20140315
// sub add_bija{
// global variables: $with_bija_pf
//    if ($with_bija_pf) {
//        $YugaRotation{'star'}      = $YugaRotation{'star'} + 28 ;      ###20020331
//        $YugaRotation{'sun'}       = $YugaRotation{'sun'};
//        $YugaRotation{'moon'}      = $YugaRotation{'moon'};
//        $YugaRotation{'mercury'}   = $YugaRotation{'mercury'} + 60;  ###20020331
//        $YugaRotation{'venus'}     = $YugaRotation{'venus'} - 12;    ###20010328
//        $YugaRotation{'mars'}      = $YugaRotation{'mars'}  + 8;     ###20010328
//        $YugaRotation{'jupiter'}   = $YugaRotation{'jupiter'};       ###20010328
//        $YugaRotation{'saturn'}    = $YugaRotation{'saturn'} + 4;    ###20010328
//        $YugaRotation{'Candrocca'} = $YugaRotation{'Candrocca'} - 16 ; ###20010328
//        $YugaRotation{'Rahu'}      = $YugaRotation{'Rahu'} - 12 ;    ###20010328
//}

function setSecondaryConstant(){
    $yugaCivilDays      = $yugaRotation['star'] - $yugaRotation['sun'];
    $yugaSynodicMonth   = $yugaRotation['moon'] - $yugaRotation['sun'];
    $yugaAdhimasa       = $yugaSynodicMonth - 12 * $yugaRotation['sun'];
    $yugaTithi          = 30 * $yugaSynodicMonth;
    $yugaKsayadina      = $yugaTithi - $yugaCivilDays;
}

function setPlanetaryConstant(){

    $planetRotation['star']      = 0;
    $planetSighra['star']        = 0;
    $planetApogee['star']        = 0;
    $planetCircumm['star']       = 0;
    $planetCircums['star']       = 0;

    $planetRotation['sun']       = $yugaRotation['sun'];
    $planetSighra['sun']         = $yugaRotation['sun'];
    $planetApogee['sun']         = 77 + 17 / 60;
    $planetCircumm['sun']        = 13 + 50 / 60;
    $planetCircums['sun']        = 0;

    $planetRotation['moon']      = $yugaRotation['moon'];
    $planetSighra['moon']        = 0;
    $planetApogee['moon']        = 0;
    $planetCircumm['moon']       = 31 + 50 / 60;
    $planetCircums['moon']       = 0;

    $planetRotation['mercury']   = $yugaRotation['sun'];
    $planetSighra['mercury']     = $yugaRotation['mercury'];
    $planetApogee['mercury']     = 220 + 27 / 60;
    $planetCircumm['mercury']    = 29;
    $planetCircums['mercury']    = 131.5;

    $planetRotation['venus']     = $yugaRotation['sun'];
    $planetSighra['venus']       = $yugaRotation['venus'];
    $planetApogee['venus']       = 79 + 50 / 60;
    $planetCircumm['venus']      = 11.5;
    $planetCircums['venus']      = 261;

    $planetRotation['mars']      = $yugaRotation['mars'];
    $planetSighra['mars']        = $yugaRotation['sun'];
    $planetApogee['mars']        = 130 + 2 / 60;
    $planetCircumm['mars']       = 73.5;
    $planetCircums['mars']       = 233.5;

    $planetRotation['jupiter']   = $yugaRotation['jupiter'];
    $planetSighra['jupiter']     = $yugaRotation['sun'];
    $planetApogee['jupiter']     = 171 + 18 / 60;
    $planetCircumm['jupiter']    = 32.5;
    $planetCircums['jupiter']    =  71;

    $planetRotation['saturn']    = $yugaRotation['saturn'];
    $planetSighra['saturn']      = $yugaRotation['sun'];
    $planetApogee['saturn']      = 236 + 37 / 60;
    $planetCircumm['saturn']     = 48.5;
    $planetCircums['saturn']     = 39.5;

    $planetRotation['Candrocca'] = $yugaRotation['Candrocca'];
    $planetSighra['Candrocca']   = 0;
    $planetApogee['Candrocca']   = 0;
    $planetCircumm['Candrocca']  = 0;
    $planetCircums['Candrocca']  = 0;

    $planetRotation['Rahu']      = $yugaRotation['Rahu'];
    $planetSighra['Rahu']        = 0;
    $planetApogee['Rahu']        = 0;
    $planetCircumm['Rahu']       = 0;
    $planetCircums['Rahu']       = 0;
}

function getMeanLong($ahar, $rotation) {
// definition

    360 * frac($rotation * $ahar / $yugaCivilDays);

// {consider rounding}
//
// transformation 1 of original definition
//    --> 360 * &frac($rotation * (int($ahar) + &frac($ahar)) / $YugaCivilDays)
//    --> 360 * &frac(($rotation * int($ahar) / $YugaCivilDays) +
//                    ($rotation * &frac($ahar) / $YugaCivilDays))
//    --> 360 * &frac(&frac($rotation * int($ahar) / $YugaCivilDays) +
//                    &frac($rotation * &frac($ahar) / $YugaCivilDays))
// ok! difference from original is 1/100,000,000 degree.

//    --> 360 * &frac(&frac(($rotation * int($ahar) % $YugaCivilDays) /
//                          $YugaCivilDays) +
//                    &frac($rotation * &frac($ahar) / $YugaCivilDays))
//    --> 360 * &frac(&frac((($rotation % $YugaCivilDays) *
//                           (int($ahar) % $YugaCivilDays)) /
//                          $YugaCivilDays) +
//                    &frac($rotation * &frac($ahar) / $YugaCivilDays))
// no good transformation. why ???

// transformation 2 of original definition
//    &zero360(($rotation / $YugaCivilDays) * $ahar * 360);
//    --> &zero360((360 * $rotation * int($ahar) / $YugaCivilDays) +
//                 (360 * $rotation * &frac($ahar) / $YugaCivilDays))
//    --> &zero360(&zero360((360 * $rotation * int($ahar) / $YugaCivilDays)) +
//                 &zero360((360 * $rotation * &frac($ahar) / $YugaCivilDays)))
// ok! difference from original is 1/10,000,000,000 degree.
}

function declination($long) {
    arcsin(sin($long / $rad) * sin(24 / $rad)) * $rad;
}

function getDaylightEquation() {
// global variables: $ahar, $YugaRotation{'sun'}
    list($year, $locLat) = $fake/*check:@*/;

    ($mslong, $samslong, $sdecl, $x);

    $mslong = getMeanLong($ahar, $yugaRotation['sun']);
// {debugging for sunrise time}
// printf "ahar=%15s\n", $ahar;
// printf "mslong=%15s\n", $mslong;
// {end of debugging for sunrise time}
// {sayana solar longitude and declination}
    $samslong = $mslong + (54 / 3600) * ($year - 499);
// {debugging for sunrise time}
// printf "samslong=%15s\n", $samslong;
// $samslong = 270;
// {end of debugging for sunrise time}
// {See Sewell, p.10}
    $sdecl = declination($samslong);
// {debugging for sunrise time}
// printf "sdecl=%15s\n", $sdecl;
// {end of debugging for sunrise time}
// {equation of daylight by analemma}
    $x = tan($locLat / $rad) * tan($sdecl / $rad);
    0.5 * arcsin($x) / $pi;
}

function getSunRiseTime($eqtime) {
    ($sriseh, $srisem);

    $sriseh = trunc((0.25 - $eqtime) * 24);
    $srisem = trunc(60 * frac((0.25 - $eqtime) * 24));
    ($sriseh, $srisem);
}

function getAyanaAmsa() {             //##20010313
    list($ahar) = $fake/*check:@*/;

    ($ayanadeg, $ayanamin);

    $ayanadeg = trunc((54 * 4320000 / $yugaCivilDays / 3600) * ($ahar - 1314930));
    $ayanamin = trunc(60 * frac((54 * 4320000 / $yugaCivilDays / 3600) * ($ahar - 1314930)));
    ($ayanadeg, $ayanamin);
}


function getMandaEquation($argument, $planet) {
    arcsin($planetCircumm[$planet] / 360 * sin($argument / $rad)) * $rad;
}

function getSighraEquation($anomaly, $planet) {
    ($bhuja, $koti, $karna);

    $bhuja = $planetCircums[$planet] / 360 * sin($anomaly / $rad) * $rad;
    $koti  = $planetCircums[$planet] / 360 * cos($anomaly / $rad) * $rad;
    $karna = sqrt(sqr($rad + $koti) + sqr($bhuja));
    arcsin($bhuja / $karna) * $rad;
}

function getTrueLong($ahar, $mslong, $planet) {
    ($meanLong1, $meanLong2, $meanLong3);
    ($argument);
    ($anomaly1, $anomaly2);
    ($equ1, $equ2, $equ3, $equ4, $equ5);

// {first sighra correction}
    if (($planet === 'mercury') ||
        ($planet === 'venus')) {
        $anomaly1 = getMeanLong($ahar, $planetSighra[$planet]) - $mslong;
    } else {
        $anomaly1 = getMeanLong($ahar, $planetSighra[$planet]) - $planetMeanPosition[$planet] ;
    }
    $equ1 = getSighraEquation($anomaly1, $planet);

// {first manda correction}
    $meanLong1 = $planetMeanPosition[$planet] + $equ1 / 2;
    $argument = $meanLong1 - $planetApogee[$planet];
    $equ2 = getMandaEquation($argument, $planet);

// {second manda correction}
    $meanLong2 = $meanLong1 - $equ2 / 2;
    $argument = $meanLong2 - $planetApogee[$planet];
    $equ3 = getMandaEquation($argument, $planet);

// {second sighra correction}
    $meanLong3 = $planetMeanPosition[$planet] - $equ3;
    $anomaly2 = getMeanLong($ahar, $planetSighra[$planet]) - $meanLong3;
    $equ4 = getSighraEquation($anomaly2, $planet);
    $equ5 = 0;

// {$ifdef suryasiddhanta}
// {$else}
//    if (($planet eq 'mercury') ||
//        ($planet eq 'venus')) {
//        $argument = $mslong - (77 + 17 / 60);
//        $equ5 = (13.5 / 360 * sin($argument / $rad)) * $rad;
//    }
//    if ($planet eq 'venus') {
//        $equ5 = $equ5 - (1 + 7 / 60);
//    }
// {$endif}

    zero360($meanLong3 + $equ4 + $equ5);

}

function rightAscension($long, $decl) {
    ($dayRadius, $radius90, $x, $ra);

    $dayRadius = cos($decl / $rad);
    $radius90 = cos(24 / $rad);
    $x = $radius90 / $dayRadius * sin($long / $rad);
    $ra = arcsin($x) * $rad;

    if ($long < 90) {
    } elseif ($long < 270) {
        $ra = 180 - $ra;
    } elseif ($long == 270) {
        $ra = 270
    } else {
        $ra = 360 + $ra;
    }
    $ra;
}

function ascendant($hrasc, $locLat) {
    ($asc, $x, $y); // {Modern method, see North, p.50}

    $x = sin($hrasc / $rad);
    $y = cos($hrasc / $rad) * cos(24 / $rad) - sin(24 / $rad) * tan($locLat / $rad);
    $asc = atan2($x / $y, 1) * $rad;

    if (180 <= $hrasc) {
        if (0 < $y) {
            $asc = $asc;
        } else {
            $asc = $asc + 180;
        }
    } else {
        if (0 < $y) {
            $asc = $asc + 360;
        } else {
            $asc = $asc + 180;
        }
    }
}

function getTithi($tllong, $tslong) {
    ($elong);

    $elong = $tllong - $tslong;
    $elong = zero360($elong);

    $elong / 12;
}

function getTithiSet($tithi) {
    ($tithiDay, $ftithi);

    $tithiDay = trunc($tithi) + 1;
    $ftithi = frac($tithi);

    ($tithiDay, $ftithi);
}

function setSuklaKrsna($tithiDay) {
    ($suklaKrsna, $paksa);

    if (15 < $tithiDay) {
        $tithiDay = $tithiDay - 15;
        $paksa = 'Krsnapaksa';
    } else {
        $paksa = 'Suklapaksa';
    }
    $suklaKrsna = getSuklaKrsna($paksa);

    ($tithiDay, $suklaKrsna, $paksa);
}

function getTslong($ahar) {
    ($mslong);

    $mslong = getMeanLong($ahar, $yugaRotation['sun']);
    $getTslong = zero360($mslong - getMandaEquation(($mslong - $planetApogee['sun']), 'sun'));
}

function getTllong($ahar) {
    ($mllong, $apogee);

    $mllong = getMeanLong($ahar, $yugaRotation['moon']);
    $apogee = getMeanLong($ahar, $yugaRotation['Candrocca']) + 90;
    zero360($mllong - getMandaEquation(($mllong - $apogee), 'moon'));
}

function getElong($ahar) {
    ($elong);

    $elong = abs(getTllong($ahar) - getTslong($ahar));
    if (180 < $elong) {
        $elong = 360 - $elong;
    }
        $elong;
}

function findConj($leftx, $lefty, $rightx, $righty) {
    ($width, $centrex, $centrey, $relation);

//{$ifdef conj_debug}
//    printf "lx=%15s rx=%15s ly=%15s ry=%15s\n", $leftx, $rightx, $lefty, $righty;
//    printf "%18s %18s %18s\n", $leftx, $rightx, $rightx - $leftx;
//    printf "%18s %18s %18s\n", $leftx, $rightx, ($rightx + $leftx)/2;
//{$endif}
    $width = ($rightx - $leftx) / 2;
    $centrex = ($rightx + $leftx) / 2;
    if ($width < $epsiron) {
        getTslong($centrex);
    } else {
        $centrey = getElong($centrex);
        $relation = threeRelation($lefty, $centrey, $righty);
        if ($relation < 0) {
            $rightx = $rightx + $width;
	    $righty = getElong($rightx);
            findConj($centrex, $centrey, $rightx, $righty);
        } elseif (0 < $relation) {
            $leftx = $leftx - $width;
	    $lefty = getElong($leftx);
            findConj($leftx, $lefty, $centrex, $centrey);
        } else {
            $leftx = $leftx + $width / 2;
            $lefty = getElong($leftx);
            $rightx = $rightx - $width / 2;
            $righty = getElong($rightx);
            findConj($leftx, $lefty, $rightx, $righty);
        }
    }
}

function getConj($ahar) {
    findConj($ahar - 2, getElong($ahar - 2),
               $ahar + 2, getElong($ahar + 2));
}

function getClong($ahar, $tithi) {
    ($newNew);

    $newNew = $yugaCivilDays / ($yugaRotation['moon'] - $yugaRotation['sun']);
    $ahar = $ahar - $tithi * ($newNew / 30);

    if (abs($ahar - $backClongAhar) < 1) {
        $backClong;
    } elseif (abs($ahar - $backNclongAhar) < 1) {
        $backClongAhar = $backNclongAhar;
        $backClong = $backNclong;
        $backNclong;
    } else {
        $backClongAhar = $ahar;
        $backClong = getConj($ahar);
        $backClong;
    }
}

function getNclong($ahar, $tithi) {
    ($newNew);

    $newNew = $yugaCivilDays / ($yugaRotation['moon'] - $yugaRotation['sun']);
    $ahar = $ahar + (30 - $tithi) * ($newNew / 30);

    if (abs($ahar - $backNclongAhar) < 1) {
        $backNclong;
    } else {
        $backNclongAhar = $ahar;
        $backNclong = getConj($ahar);
        $backNclong;
    }
}

function getMasaNum($tslong, $clong) {
    ($masaNum);

    $masaNum = (trunc($tslong / 30)) % 12;
    if ((trunc($clong / 30) % 12) == $masaNum) {
        $masaNum = $masaNum + 1;
    }
    $masaNum = ($masaNum + 12) % 12;
    $masaNum;
}

//{:::::::::::::::::::::::::::}
//{ saura_masa calculations }

function findSamkranti() {//find out samkranti in ahargana #20010311
    list($oAhar, $nAhar) = $fake/*check:@*/;

    ($oTslong, $nTslong, $cAhar, $cTslong, $width);

    $oTslong = getTslong($oAhar);
    $nTslong = getTslong($nAhar);

    $oTslong = $oTslong - floor($oTslong / 30) * 30;
    $nTslong = $nTslong - floor($nTslong / 30) * 30;

//{for debug}
//    printf "lx=%15s rx=%15s ly=%15s ry=%15s\n", $o_ahar, $n_ahar, $o_tslong, $n_tslong;
//
    $width  = ($nAhar - $oAhar) / 2;
    $cAhar = ($nAhar + $oAhar) / 2;
    if ($width < $epsiron) {
        $cAhar;
    } else {
        $cTslong = getTslong($cAhar);
        $cTslong = $cTslong - floor($cTslong / 30) * 30;
        if ($cTslong < 5) {
            findSamkranti($oAhar, $cAhar);
        } else {
            findSamkranti($cAhar, $nAhar);
        }
    }
}

function setSamkranti() {//##20010311
    list($ahar) = $fake/*check:@*/;

//    if (&abs($ahar - $samkranti) < 1) { #20020308
//    } else { #20020308
        $samkranti = findSamkranti($ahar, $ahar + 1); //20010311
        $samkranti = $samkranti + $desantara; //20011114
//        ($samkranti_year, $samkranti_month, $samkranti_day) = &JulianDay_to_ModernDate(&Ahargana_to_JulianDay($samkranti)); #20010310
        list($samkrantiYear, $samkrantiMonth, $samkrantiDay) = juliandayToModerndate(aharganaToJulianday(trunc($samkranti) + 0.5)); //20140223 cf. try_calculations
        $samkrantiHour = trunc(frac($samkranti) * 24); //20010310
        $samkrantiMin  = trunc(60 * frac(frac($samkranti) * 24)); //20010310
//    } #20020308
}

function todaySauraMasaFirstP() {//##20001231
//
// Definition of the first day
// samkranti is between today's 0:00 and 24:00
// ==
// at 0:00 before 30x, at 24:00 after 30x

    list($ahar) = $fake/*check:@*/;
    ($tslongToday, $tslongTomorrow);

    $tslongToday = getTslong($ahar - $desantara); //20011118
    $tslongTomorrow = getTslong($ahar - $desanatar + 1); //20011118

    $tslongToday = $tslongToday - floor($tslongToday / 30) * 30;
    $tslongTomorrow = $tslongTomorrow - floor($tslongTomorrow / 30) * 30;

    if ((25 < $tslongToday) && ($tslongTomorrow < 5)) {
        setSamkranti($ahar);
        $true;
    } else {
        $false;
    }

}

function getSauraMasaDay() { //##20001231
// If today is the first day then 1
// Otherwies yesterday's + 1
    list($ahar) = $fake/*check:@*/;
    ($tslongTomorrow, $month, $day);

    $ahar = trunc($ahar);
    if (todaySauraMasaFirstP($ahar)) {
        $day = 1;
        $tslongTomorrow = getTslong($ahar + 1);
        $month = (trunc($tslongTomorrow / 30)) % 12;
        $month = ($month + 12) % 12;
    } else {
        list($month, $day) = getSauraMasaDay($ahar - 1);
        $day = $day + 1;
    };
    ($month, $day);
}

//{:::::::::::::::::::::::::::}
//{ set of calculations }

function calculations() {

    setPrimaryConstant;
//     &add_bija; # 20140315
    setSecondaryConstant;
    setPlanetaryConstant;
    $julianDay = moderndateToJulianday($year, $month, $day);
    $ahar = juliandayToAhargana($julianDay);
    $julianDay = floor($julianDay + 0.5);
    $ahargana = floor($ahar + 0.5); //##20010325
    $weekdayName = getWeekdayName($julianDay);
    list($ayanadeg, $ayanamin) = getAyanaAmsa($ahar); //##20010313

// {at 6 o'clock}
    $ahar = $ahar + 0.25;

// {desantara} #20011114
    $ahar = $ahar - $desantara; //20011114

// {time of sunrise at local latitude}
    $eqtime = getDaylightEquation($year, $locLat);
    $ahar = $ahar - $eqtime;
    list($sriseh, $srisem) = getSunRiseTime($eqtime);

// {Lunar apogee and node at sunrise}
    $planetMeanPosition['Candrocca']
      = getMeanLong($ahar, $yugaRotation['Candrocca']) + 90;
    $planetMeanPosition['Candrocca'] = zero360($planetMeanPosition['Candrocca']);

    $planetMeanPosition['Rahu']
      = getMeanLong($ahar, $yugaRotation['Rahu']) + 180;
    $planetMeanPosition['Rahu'] = zero360($planetMeanPosition['Rahu']);

// {mean and true sun at sunrise}
     $mslong = getMeanLong($ahar, $yugaRotation['sun']);
       $planetMeanPosition['sun'] = $mslong;
     $tslong = zero360($mslong - getMandaEquation(($mslong - $planetApogee['sun']), 'sun'));
       $planetTruePosition['sun'] = $tslong;

// {mean and true moon at sunrise}
    $mllong = getMeanLong($ahar, $yugaRotation['moon']);
      $planetMeanPosition['moon'] = $mllong;
      $planetApogee['moon'] = $planetMeanPosition['Candrocca'];
    $tllong = zero360($mllong - getMandaEquation(($mllong - $planetApogee['moon']), 'moon'));
      $planetTruePosition['moon'] = $tllong;

// {finding tithi and longitude of conjunction}
    $tithi = getTithi($tllong, $tslong);
    list($tithiDay, $ftithi) = getTithiSet($tithi);
    list($tithiDay, $suklaKrsna, $paksa) = setSuklaKrsna($tithiDay);

// {last conjunction}
    $clong = getClong($ahar, $tithi);
// {next conjunction}
    $nclong = getNclong($ahar, $tithi);

    $adhimasa = getAdhimasa($clong, $nclong);
    $masaNum = getMasaNum($tslong, $clong);
    $masa = getMasaName($masaNum);
//    $saura_masa_day = &get_saura_masa_day($ahar); #20001231
//    $saura_masa_num = &get_saura_masa_num($tslong, $saura_masa_day); #20000614
    list($sauraMasaNum, $sauraMasaDay) = getSauraMasaDay($ahar); //20001231
    $sauraMasa = getSauraMasaName($sauraMasaNum); //20001231
    $naksatra = getNaksatraName($tllong);
//{kali and Saka era}
    $yearKali = aharganaToKali($ahar + (4 - $masaNum) * 30);
    $yearSaka = kaliToSaka($yearKali);
    $yearVikrama = $yearSaka + 135;
}

function planetaryCalculations(){

// {mean and true planets at sunrise}
    for ('mercury', 'venus', 'mars', 'jupiter', 'saturn') {
        $planet = $fake/*check:$*/;
        $planetMeanPosition[$planet] = getMeanLong($ahar, $planetRotation[$planet]);
        $planetTruePosition[$planet] = getTrueLong($ahar, $mslong, $planet);
    }
}

function tryCalculations(){
    setPrimaryConstant;
//     &add_bija; # 20140315
    setSecondaryConstant;
    setPlanetaryConstant;
    $masa = getMasaName($masaNum);
    if ($paksa === 'Krsnapaksa') {
        $tithiDay = $tithiDay + 15;
    };
    $yearKali = sakaToKali($yearSaka);
    $ahar = kaliToAhargana($yearKali, $masaNum, $tithiDay);
    list($tithiDay, $suklaKrsna, $paksa) = setSuklaKrsna($tithiDay);
    $julianDay = aharganaToJulianday($ahar);
    $julianDay = $julianDay + 0.5;
    list($year, $month, $day) = juliandayToModerndate($julianDay);
    $weekdayName = getWeekdayName($julianDay);
}

function horoscopeCalculation(){

    ($saslong, $sdecl, $srasc, $timeDegree, $hrasc, $ascend);

    setPrimaryConstant;
//    &add_bija; # 20140315
    setSecondaryConstant;
    setPlanetaryConstant;
    $julianDay = moderndateToJulianday($year, $month, $day);
    $ahar = juliandayToAhargana($julianDay);
    $ahar = $ahar + $hours / 24 + $minutes / 24 / 60;

    $ahar = $ahar - $desantara; //20011114

    $mslong = getMeanLong($ahar, $yugaRotation['sun']);
    $tslong = getTslong($ahar);

    $saslong = $tslong + (54 / 3600) * ($year - 499); // {See Sewell, p.10}

    $sdecl = declination($saslong);
    $srasc = rightAscension($saslong, $sdecl);

    $timeDegree = $hours * 15 + $minutes / 4;
    $hrasc = $timeDegree - 90 + $srasc;
    $hrasc = zero360($hrasc);

    $ascend = ascendant($hrasc, $locLat); // {sayana lagna}
    $ascend = zero360($ascend);
    $lagna = $ascend - (54 / 3600) * ($year - 499); // {nirayana lagna}
    $lagna = zero360($lagna);
}

function tithiNaksatraKaranaYogaAtAnyGivenAhar(){ //##20011106
    list($ahar) = $fake/*check:@*/;
    ($tithiDay, $ftithi, $naksatra, $karana, $yoga);

    setPrimaryConstant;
//    &add_bija; # 20140315
    setSecondaryConstant;
    setPlanetaryConstant;

     $mslong = getMeanLong($ahar, $yugaRotation['sun']);
       $planetMeanPosition['sun'] = $mslong;
     $tslong = zero360($mslong - getMandaEquation(($mslong - $planetApogee['sun']), 'sun'));
       $planetTruePosition['sun'] = $tslong;
    $mllong = getMeanLong($ahar, $yugaRotation['moon']);
      $planetMeanPosition['moon'] = $mllong;
      $planetApogee['moon'] = $planetMeanPosition['Candrocca'];
    $tllong = zero360($mllong - getMandaEquation(($mllong - $planetApogee['moon']), 'moon'));
      $planetTruePosition['moon'] = $tllong;
    $tithi = getTithi($tllong, $tslong);
    list($tithiDay, $ftithi) = getTithiSet($tithi);
    list($tithiDay, $suklaKrsna, $paksa) = setSuklaKrsna($tithiDay);
    $naksatra = getNaksatraName($tllong);
    $karana = getKaranaName($tithi);
    $yoga = getYogaName($tslong, $tllong);

    ($tithiDay, $ftithi, $naksatra, $karana, $yoga);
}

function wechselnCalcWrite(){ //##20011109
    ($tithiDay, $ftithi, $naksatra, $karana, $yoga);
    ($otithiDay, $onaksatra, $okarana, $oyoga);

// {at 0 o'clock}

    $julianDay = moderndateToJulianday($year, $month, $day);
    $ahar = juliandayToAhargana($julianDay);
//    $JulianDay = int($JulianDay + 0.5); #20011114
//    $ahargana = int($ahar + 0.5); ###20010325 #20011114

    $ahar = $ahar - $desantara; //20011114

    list($tithiDay, $ftithi, $naksatra, $karana, $yoga) = tithiNaksatraKaranaYogaAtAnyGivenAhar($ahar);
    list($otithiDay, $onaksatra, $okarana, $oyoga) = [$tithiDay, $naksatra, $karana, $yoga];

//        printf " tithi: %s\n", $tithi; ###20011107
//        printf " ftithi: %s\n", $ftithi; ###20011107
        printf "%2sh ", trunc(frac($ahar + $desantara) * 24); //20011114
        printf "%2sm ", trunc(60 * frac(frac($ahar + $desantara) * 24)); //20011114
        printf " tithi: %2s (0.%s)", $tithiDay, substr(1+$ftithi, 2, 3);
        printf " nak: %-12s", $naksatra;
        printf " kar: %s", $karana;
        printf " yog: %-10s\n", $yoga;

    for ($counter = 0; $counter < 4000; $counter++) {
        $ahar = $ahar + 0.00025;

        list($tithiDay, $ftithi, $naksatra, $karana, $yoga) = tithiNaksatraKaranaYogaAtAnyGivenAhar($ahar);

        if (($otithiDay != $tithiDay) ||
            ($onaksatra !== $naksatra) ||
            ($okarana !== $karana) ||
            ($oyoga !== $yoga)) {
//        printf " tithi: %s\n", $tithi; ###20011107
//        printf " ftithi: %s\n", $ftithi; ###20011107
            printf "%2sh ", trunc(frac($ahar + $desantara) * 24); //20011114
            printf "%2sm ", trunc(60 * frac(frac($ahar + $desantara) * 24)); //20011114
            printf " tithi: %2s (0.%s)", $tithiDay, substr(1+$ftithi, 2, 3); //##20011107
            printf " nak: %-12s", $naksatra;
            printf " kar: %s", $karana;
            printf " yog: %-10s\n", $yoga;
            list($otithiDay, $onaksatra, $okarana, $oyoga) = [$tithiDay, $naksatra, $karana, $yoga];
        }
    }

}


//{:::::::::::::::::::::::::::}
// { OUTPUT }

function writeOpeningMessage(){
print "   ********* Pancanga vers.3.14  **********   M. YANO and M. FUSHIMI \n";//20140315
//print "   ----------------- perl version ------------- March 2002          \n";
print "   ----------------- perl version ------------- March 2014          \n";
// 20140315
print "       This program is based on the Suuryasiddhaanta (ca AD 1000), \n";
print "   and also on the older constants of the Pancasiddhaantikaa (AD 505).        \n";
print "   <MENUES>                                                         \n";
print "   <T>:   To find the modern date from the given Indian date.   The \n";
print "       result is not always correct.  (Sometimes error is one month \n";
print "       because of adhimaasa.) You should confirm it by menu <L>.     \n";
print "   <L>:   To find the Indian date (in amaanta) from the given modern \n";
print "       date.  The result is considerably reliable:  the month names \n";
print "       are almost always correct; only the error of 1 tithi is to be \n";
print "       admitted because of occurrence of KSayadina or adhidina.     \n";
print "   <V>:   To get the further details of <L>.                        \n";
// print "   <H>:   To get horoscope (at present only lagna). \n"; #20010416
// print "   <S>:   To set local <L>atitude, l<O>ngitude, <B>ija. \n"; #20020304
print "   <S>:   To set local <L>atitude, l<O>ngitude, and <C>hange System. \n"; //20140315
print "   NOTICE ... Remember the difference of amaanta and puurNimaanta.     \n";
print "              Beginning of the year is set for Caitra sukla 1.      \n";
print "   ***** This program should not be copied without our permission.  \n";
print "     Please contact:                                                \n";
print "         M.YANO (for Indian astronomy): yanom at cc.kyoto-su.ac.jp \n"; //20140315
print "         M.FUSHIMI (for programming) at makoto.fushimi at nifty.com \n"; //20140315
}

// 20140315
function writeSettings(){

    print " Current settings. Lat: $loc_lat. ";
    print "Long: $loc_lon. ";
    if ($selectedSystem === 'SuryaSiddhanta') { //20140315
      print " Suryasiddhanta (AD 1000ca).\n";
    } else {
      print " Older constants in PS (AD 505).\n";
    }
}

function writeSigDegMinSec($decimal) {
    ($sig, $deg, $min, $sec, $remain);

    $decimal = zero360($decimal);
    $sig = trunc($decimal / 30);
      $remain = $decimal - $sig * 30;
    $deg = trunc($remain);
      $remain = $remain - $deg;
    $min = trunc(60 * $remain);
      $remain = 60 * $remain - $min;
    $sec = round(60 * $remain);
    printf "%3ss%3sd%3s'%3s%s", $sig, $deg, $min, $sec, pack("C", 34);
}

// 20140315
function writeSigDeg($decimal) {
    ($sig, $deg, $min, $sec, $remain);

    $decimal = zero360($decimal);
    $sig = trunc($decimal / 30);
      $remain = $decimal - $sig * 30;
    $deg = trunc($remain);
      $remain = $remain - $deg;
    $min = trunc(60 * $remain);
      $remain = 60 * $remain - $min;
    $sec = round(60 * $remain);
    printf "%3ss%3sd", $sig, $deg;
}

function writeNirayanaLongitudeSunMoon() {

    printf "Sun: ";
    writeSigDeg($planetTruePosition['sun']);
    printf ", ";
    printf " Moon: ";
    writeSigDeg($planetTruePosition['moon']);
}

function writeNirayanaLongitude() {

    ($counter);

    $counter = -1;
    for ('sun', 'moon', 'mercury', 'venus', 'mars', 'jupiter', 'saturn', 'Candrocca', 'Rahu') {
        $planet = $fake/*check:$*/;
        printf "   %s", $planetName[$planet];
//        &write_sig_deg_min_sec($PlanetMeanPosition{$planet});###20000613
//        print  "   ";###20000613
        if (preg_match('/(Candrocca|Rahu)/', $planet)) {
//            print "                ";###20000613
            writeSigDegMinSec($planetMeanPosition[$planet]);
        } else {
            writeSigDegMinSec($planetTruePosition[$planet]);
        }
        print "  |  ";
        if ((0 <= $counter) && ($counter < 6)) {
            printf "%s  ", getMasaName($counter);
            printf "%s", getMasaName($counter + 6);
        }
        if ((0 <= $counter) && ($counter < 6)) { //##20000613
            print " |  "; //##20000613
            printf "%s  ", getSauraMasaName($counter); //##20000613
            printf "%s", getSauraMasaName($counter + 6); //##20000613
        } //##20000613
        print "\n";
        $counter = $counter + 1;
    }
}

function writeList(){
    printf "%4s ", $year; //##20010409
    printf "%2s ", $month;
    printf "%2s ", trunc($day);
    printf "%s", substr($weekdayName, 0, 3); //##20010409
    printf "|Saka ";
    printf "%4s", $yearSaka;
    printf "|V.S.";                       //##20010409
    printf "%4s ", $yearVikrama;
    printf "%17s ", $adhimasa . $masa;
    printf "%5s ", $suklaKrsna;
    printf "%2s ", $tithiDay; //##20000522
//    printf "(%4s) ", substr($ftithi, 0, 4);###20000522
    printf "%s", $naksatra;
    printf "\n";
    if (julianInEnglandP($julianDay)) {//##20030430
      printf "(=%5s %2s %3s in Julian) ", juliandayToJuliandate($julianDay);
      printf "=====================================================\n";
    }else{
      printf "===============================================================================\n";
    }
}

function writeTable(){
    printf "  AD%5s %2s %3s %4s ", $year, $month, $day, $weekdayName;//##20010325
    printf "| JD (at noon)=%8s ", $julianDay; //##20010412
    printf "| Kali-ahargana=%8s \n", $ahargana; //##20010412
  if (julianInEnglandP($julianDay)) {//##20030331
    printf "  (=%5s %2s %3s in Julian) ", juliandayToJuliandate($julianDay);
    printf "===================================================\n";
  }else{
    printf "===============================================================================\n";
  };
// 20140315
//    printf "  Pancanga based on the Suryasiddhanta (at sunrise)";
//    printf "  Pancanga based on Suryasiddhanta (sunrise)";  #20020304
if ($selectedSystem === 'SuryaSiddhanta') { //20140315
    printf "  Pancanga based on Suryasiddhanta (AD 1000 ca) \n";
} elseif ($selectedSystem === 'InPancasiddhantika') {
    printf "  Pancanga based on older constants in Pancasiddhantika (AD 505) \n";
} else {
    printf "  Pancanga based on Suryasiddhanta (AD 1000 ca) \n";
}
    printf "    at latitude=%3s,", $locLat; //20020304
    printf " longitude=%3s\n", $locLon; //20020304
    printf "-------------------------------------------------------------------------------\n";
// 20140315
//    printf "      Nirayana  Mean Longitude     True Longitude    |  Month Names\n";###20000613
//    printf "      Nirayana  True Longitude   |  Lunar Month Names      |  Solar Month Names\n";
//    &write_nirayana_longitude;
//    printf "-------------------------------------------------------------------------------\n";
    printf " Indian date (luni-solar year and amanta month)  (*) local sunrise...%2sh %2sm\n", $sriseh, $srisem; //##20010313
// 20140315
    printf "   (Nirayana True Longitude at sunrise. ";
    writeNirayanaLongitudeSunMoon;
    printf ")\n";
    printf " year(atita):Saka %4s", $yearSaka;
    printf " |Vikrama %4s", $yearVikrama;
    printf " |Kali %4s",    $yearKali; //##20010313
    printf " | ayanamsa: %2sd %2sm\n", $ayanadeg, $ayanamin; //##20010313
    printf "             Jovian(North):%s", getJovianYearName($yearKali); //##20001231
    printf " |Jovian(South):%s\n", getJovianYearNameSouth($yearKali); //##20001231
    printf " lunar month, paksa, and tithi(at sunrise): \n"; //##20010313
    printf "       %s%s", $adhimasa, $masa; //##20001231
    printf " %s", $suklaKrsna; //##20000522
    printf " %2s (fraction = 0.%s)\n", $tithiDay, substr(1+$ftithi, 2, 3); //##20011107
    printf " solar month and day: %s", $sauraMasa; //##20010313
    printf " %s", $sauraMasaDay; //##20010310
    printf " (samkranti: on %4s %2s %2s", $samkrantiYear, $samkrantiMonth, $samkrantiDay; //##20010311
    printf " at %2sh %2sm)\n", $samkrantiHour, $samkrantiMin; //##20010310
    printf " naksatra.... %s", $naksatra;
    printf "  /  karana...%s", getKaranaName($tithi);
    printf "  /  yoga...%s\n", getYogaName($tslong, $tllong);
//   printf " (Jovian year, karana, and yoga are in the Kyoto-Harvard transliteration system)\n";###20010412
//    printf "    NOTICE: if PURNIMANTA K-paksa month names appear a month earlier\n";
//    printf "===============================================================================\n"; #20010416
}

function writeTryList(){
    printf "===============================================================================\n";
    printf "Saka %4s", $yearSaka;
    printf " Vikrama %4s", $yearSaka + 135; //##20000522
    printf " | %s %s", $masa, $suklaKrsna;
    printf "%3s  ", $tithiDay;
    printf "| AD%5s %2s %2s", $year, $month, trunc($day);//##20030331
    printf " %s", $weekdayName;
    printf "\n";
  if (julianInEnglandP($julianDay)) {//##20030331
    printf "====================================================";
    printf " (=%5s %2s %3s in Julian)\n", juliandayToJuliandate($julianDay);
  }else{
    printf "===============================================================================\n";
  };
}

function writeHoroscope(){
    printf "===============================================================================\n";
    printf "Date: %4s%3s%3s", $year, $month, $day;
    printf " Time: %2sh%2sm", $hours, $minutes;
    printf "  Lat.:%3s", $locLat;
    printf " | Lagna =";
    writeSigDegMinSec($lagna);
    printf "\n";
    printf "===============================================================================\n";
}

//{:::::::::::::::::::::::::::}
// {programme choice}
    $progModeMessage =
//              "<T>ry, <L>ist, <V>erbose, <H>oroscope, <S>etting, <E>nd: "; #20010416
              "<T>ry, <L>ist, <V>erbose, <S>etting, <E>nd: ";
    $progModeMessageCont =
//              "<Return>:continue, <T>ry, <L>ist, <V>erbose, <H>oroscope, <S>etting, <E>nd: "; #20010416
              "<Return>:continue, <T>ry, <L>ist, <V>erbose, <S>etting, <E>nd: ";
    $progSettingModeMessage =
// 20140315
//              "<L>atitude, l<O>ngitude, <B>ija, <E>xit from Setting: ";  #20020304
              "<L>atitude, l<O>ngitude, <C>hange System, <E>xit from Setting: ";  //20020304
// type  prog_modes =
// (continue, try, list, verbose, wechseln, horoscope, setting, latitude, longitude, bija, prog_end); #20020304

    $progMode = $variabledeclaration;

function setProgMode($message) {
    ($ans);

    $ans = readChar($message);
    if ($ans === 'T') {
         $progMode = 'try';
    } elseif ($ans === 'L') {
         $progMode = 'list';
    } elseif ($ans === 'V') {
         $progMode = 'verbose';
    } elseif ($ans === 'W') {
         $progMode = 'wechseln';
    } elseif ($ans === 'H') {
         $progMode = 'horoscope';
    } elseif ($ans === 'S') {
         $progMode = 'setting';
    } elseif ($ans === 'E') {
         $progMode = 'prog_end';
    } else {
         $progMode = 'continue';
    }
}

function setProgSettingMode($message) {
    ($ans);

    $ans = readChar($message);
    if ($ans === 'L') {
         $progMode = 'latitude';
    } elseif ($ans === 'O') {
         $progMode = 'longitude'; //20011114
// 20140315
//    } elsif ($ans eq 'B') {
//         $prog_mode = 'bija';
    } elseif ($ans === 'C') {
         $progMode = 'changeSystem';
    } elseif ($ans === 'E') {
         $progMode = 'prog_end';
    } else {
         $progMode = 'continue';
    }
}

function cacheVariableClear(){
    $backClongAhar     = -1;
    $backNclongAhar    = -1;
    $backClong          = -1;
    $backNclong         = -1;
}

//{:::::::::::::::::::::::::::}
//{main routine}
if (/*check*/isset(($pancangaAsSub))) {
1;
} else {
writeOpeningMessage;
print "If there is no need to change default settings, type E.\n"; // 20140315
$progMode = 'setting';
while ($progMode !== 'prog_end') {
    if ($progMode === 'continue') {
        setProgMode($progModeMessage);
    } elseif ($progMode === 'try') {
        print "\n";
        list($yearSaka, $masaNum, $paksa, $tithiDay) = readIndianDate;
        tryCalculations;
        print "\n";
        writeTryList;
        setProgMode($progModeMessage);
    } elseif ($progMode === 'list') {
        print "\n";
        list($year, $month, $day) = readDate;
        print "\n";
        for ($counter = 1; $counter < 11; $counter++) {
            calculations;
            writeList;
            list($year, $month, $day) = nextDate($year, $month, $day);
        }
        setProgMode($progModeMessageCont);
        while ($progMode === 'continue') {
            print "\n";
            for ($counter = 1; $counter < 11; $counter++) {
                calculations;
                writeList;
                list($year, $month, $day) = nextDate($year, $month, $day);
            }
            setProgMode($progModeMessageCont);
        }
    } elseif ($progMode === 'verbose') {
        print "\n";
        list($year, $month, $day) = readDate;
        calculations;
        planetaryCalculations;

        print "\n";
        writeTable;
        setProgMode($progModeMessageCont);
        while ($progMode === 'continue') {
            print "\n";
            list($year, $month, $day) = nextDate($year, $month, $day);
            calculations;
            planetaryCalculations;
            writeTable;
            setProgMode($progModeMessageCont);
        }
    } elseif ($progMode === 'horoscope') {
        print "\n";
        list($year, $month, $day) = readDate;
        list($hours, $minutes) = readTime;
        horoscopeCalculation;
        print "\n";
        writeHoroscope;
        setProgMode($progModeMessage);
    } elseif ($progMode === 'wechseln') { //20011109
        print "\n";
        list($year, $month, $day) = readDate;
        wechselnCalcWrite;
        setProgMode($progModeMessageCont);
        while ($progMode === 'continue') { //20011114
            print "\n";
            list($year, $month, $day) = nextDate($year, $month, $day);
            wechselnCalcWrite;
            setProgMode($progModeMessageCont);
        }
    } elseif ($progMode === 'setting') {
//        print "\n"; #20140315
        writeSettings; //20140315
        setProgSettingMode($progSettingModeMessage);
        while ($progMode !== 'prog_end') {
            if ($progMode === 'continue') {
                setProgSettingMode($progSettingModeMessage);
            } elseif ($progMode === 'latitude') {
                showMapOfIndia;
                $locLat = readLocalLatitude;
                printf " Local latitude is set to %3s.\n", $locLat;
                setProgSettingMode($progSettingModeMessage);
            } elseif ($progMode === 'longitude') { //20011114
                showMapOfIndiaLongitude;
                $locLon = readLocalLongitude;
                $desantara = ($locLon - $ujjainiLon) / 360;
                printf " Local longitude is set to %3s.\n", $locLon;
                printf " dezantara is ";
                printf " %3sh ", trunc(frac($desantara) * 24);
                printf "%2sm ", trunc(60 * frac(frac($desantara) * 24));
                printf "\n";
                setProgSettingMode($progSettingModeMessage);
//             } elsif ($prog_mode eq 'bija') {
//                if ($with_bija_pf) {
//                    $with_bija_pf = $false;
//                    print " Without bija.\n";
//                } else {
//                    $with_bija_pf = $true;
//                    print " With bija.\n";
//                }
             } elseif ($progMode === 'changeSystem') {
                if ($selectedSystem === 'SuryaSiddhanta') { //20140315
                    $selectedSystem = 'InPancasiddhantika';
                    print " Calculations are based on older constants in Pancasiddhantika (AD 505).\n";
                } else {
                    $selectedSystem = 'SuryaSiddhanta';
                    print " Calculations are based on SuryaSiddhanta (AD 1000ca).\n";
                }
                setProgSettingMode($progSettingModeMessage);
            }
        }
//        print "\n";#20140315
        writeSettings;
        cacheVariableClear;
        setProgMode($progModeMessage);
    }
}
}