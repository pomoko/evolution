<?php
function div($a,$b) { 
	//used in the date convertion function
    return (int) ($a / $b); 
} 
function gregorianToPersian ($g_y, $g_m, $g_d,$str = true) 
{ 
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
 
  
   $gy = $g_y-1600; 
   $gm = $g_m-1; 
   $gd = $g_d-1; 
 
   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400); 
 
   for ($i=0; $i < $gm; ++$i) 
      $g_day_no += $g_days_in_month[$i]; 
   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
      /* leap and after Feb */ 
      $g_day_no++; 
   $g_day_no += $gd; 
 
   $j_day_no = $g_day_no-79; 
 
   $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
   $j_day_no = $j_day_no % 12053; 
 
   $jy = 979+33*$j_np+4*div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
 
   $j_day_no %= 1461; 
 
   if ($j_day_no >= 366) { 
      $jy += div($j_day_no-1, 365); 
      $j_day_no = ($j_day_no-1)%365; 
   } 
 
   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
      $j_day_no -= $j_days_in_month[$i]; 
   $jm = $i+1; 
   $jd = $j_day_no+1; 
 if($str) return $jy.'-'.$jm.'-'.$jd ;
   return array($jy, $jm, $jd); 
} 

function convertNumberToPersian($englishNumber, $leftTrim = true)
{   
    if($leftTrim)  
        $englishNumber = ltrim($englishNumber, '0');

    $numberLength = strlen($englishNumber);

    $persianNumber = '';

    //loop through each number in the string
    for($index = 0; $index < $numberLength; $index++)
    {
        //get the current number
        $currentCase = substr($englishNumber, $index, 1);

        switch($currentCase)
        {     

            case '0':
                $persianNumber .= '۰';
                break;   
            case '1':
                $persianNumber .=  '۱';
                break;
            case '2':
                $persianNumber .=  '۲';
                break;
            case '3':
                $persianNumber .= '۳';
                break;
            case '4':
                $persianNumber .= '۴';
                break;
            case '5':
                $persianNumber .= '۵';
                break;
            case '6':
                $persianNumber .= '۶';
                break;
            case '7':
                $persianNumber .= '۷';
                break;
            case '8':
                $persianNumber .= '۸';
                break;
            case '9':
                $persianNumber .= '۹';
                break;
            default:
                $persianNumber .= $currentCase;
                break;

        }
    }

    return $persianNumber;

}

function getPersianDateWithMonthName($dateTime){
	$unix = strtotime($dateTime);
	$year = date("Y", $unix);
	$month = date("m", $unix);
	$day = date("d", $unix);

	$datePersianArray = gregorianToPersian($year, $month, $day, false);
	return convertNumberToPersian($datePersianArray[2]." ".getMonthNamePersian($datePersianArray[1])." ".$datePersianArray[0]);
}

function getMonthNamePersian($monthNumberLatin)
{
    $monthNumberLatin = ltrim($monthNumberLatin, '0');

	$monthNamePersian = "";
    switch($monthNumberLatin)
	{
		case '1':
			$monthNamePersian = 'فروردین';
			break;
		case '2':
			$monthNamePersian = 'اردیبهشت';
			break;
		case '3':
			$monthNamePersian = 'خرداد';
			break;
		case '4':
			$monthNamePersian = 'تیر';
			break;
		case '5':
			$monthNamePersian = 'مرداد';
			break;
		case '6':
			$monthNamePersian = 'شهریور';
			break;
		case '7':
			$monthNamePersian = 'مهر';
			break;
		case '8':
			$monthNamePersian = 'آبان';
			break;
		case '9':
			$monthNamePersian = 'آذر';
			break;
		case '10':
			$monthNamePersian = 'دی‌';
			break;
		case '11':
			$monthNamePersian = 'بهمن';
			break;
		case '12':
			$monthNamePersian = 'اسفند';
			break;
	}
	
	return $monthNamePersian;
}

?>