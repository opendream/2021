<?php 

getYearMonthIndexes(2020,4,2022,6);


function getYearMonthIndexes($startYear, $startMonth, $endYear, $endMonth){

$yearMonth = array();

$yearGap = $endYear-$startYear;
for($i=0; $i<=$yearGap; $i++):
    if($yearGap>0 && $yearGap-$i>0):
        // more than a year
        if($i==0):
            // the start year
            for($m=$startMonth; $m<=12; $m++):
                $e = ['year'=> $startYear, 'month'=> $m];
                array_push($yearMonth, $e);
            endfor;
        else:
            // years in the middle (full year)
            for($m=1; $m<=12; $m++):
                $e = ['year'=> $startYear+$i, 'month'=> $m];
                array_push($yearMonth, $e);
            endfor;
        endif;
        $startMonth = 1;
    elseif($yearGap==0 || $yearGap-$i==0):
        // less than a year
        for($i=$startMonth; $i<=$endMonth; $i++):
            $e = ['year'=> $endYear, 'month'=> $i];
            array_push($yearMonth, $e);
        endfor;
    endif;
endfor;

error_log(print_r($yearMonth, true));
}


?>