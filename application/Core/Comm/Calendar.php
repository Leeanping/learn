<?php
namespace Core\Comm;
/*
 * 输出日历
 * author Lee
 * vpcvcms 2016
 */
class Calendar
{
    private static $weeks  = array('日','一','二','三','四','五','六');
    
    public static function display($year, $month, $dermid, $uid)
    {
		$year = $year ? $year : date('Y');
        $month = $month ? $month : date('m');
        $html = '<table cellpadding="0" cellspacing="0" width="100%">';
        $html .= self::showWeeks();
        $html .= self::showDays($year, $month, $dermid, $uid);
        $html .= '</table>';

		return $html;
    }
     
    private static function showWeeks()
    {
        $html = '<tr>';
        foreach(self::$weeks as $title)
        {
            $html .= '<th>'.$title.'</th>';
        }
        $html .= '</tr>';
		
		return $html;
    }
     
    private static function showDays($year, $month, $dermid, $uid)
    {
        $firstDay = mktime(0, 0, 0, $month, 1, $year);
        $starDay = date('w', $firstDay);
        $days = date('t', $firstDay);
        $html = '<tr>';
        for ($i=0; $i<$starDay; $i++) {
            $html .= '<td class="bge">&nbsp;</td>';
        }
		
        for ($j=1; $j<=$days; $j++) {
            $i++;
            //$j == date('d') && $month == date('m') && $year == date('Y') 判断今天 这里不需要
            if($year < date('Y')){
                $html .= '<td class="bge"><span class="span">'.$j.'</span></td>';
            }elseif ($month < date('m') && $year <= date('Y')){
                $html .= '<td class="bge"><span class="span">'.$j.'</span></td>';
            }elseif ($j < date('d') && $month == date('m') && $year == date('Y')){
                $html .= '<td class="bge"><span class="span">'.$j.'</span></td>';
            }else {
                if(M('booking')->isBooking($dermid, $year, $month, $j))
                {
                    if(!M('booking')->myBooking($dermid, $uid, $year, $month, $j))
                    {
                        $html .= '<td class="mybooking"><span class="span">'.$j.'</span></td>';
                    }
                    else
                    {
                        $html .= '<td onclick="showDate.booking(\'' . $year . '-' . $month . '-' . $j . '\')"><span class="span">'.$j.'</span></td>';
                    }
                }
                else
                {
                    if(!M('booking')->myBooking($dermid, $uid, $year, $month, $j))
                    {
                        $html .= '<td class="mybooking"><span class="span">'.$j.'</span></td>';
                    }
                    else
                    {
                        $html .= '<td class="hasbooking"><span class="span">'.$j.'</span></td>';
                    }
                }
            }
            if ($i % 7 == 0) {
                $html .= '</tr><tr>';
            }
        }
         
        $html .= '</tr>';

		return $html;
    }
}