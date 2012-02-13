<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>TriConsole - Programming, Web Hosting, and Entertainment Directory</title>
<script language="javascript" src="calendar/calendar.js"></script>

</head>

<body>
        <form name="cualquier vaina" method="post" action="">
              <table>
                <tr>
                  <td>
                    <?php
					$dia = 10;
					$mes = 01;
					$ano = 2000;
					  $myCalendar = new tc_calendar("fecha", true);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date($dia), date('m'), date('Y'));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1960, 2015);
					  $myCalendar->dateAllow('2010-01-01', '2015-03-01');
					  $myCalendar->writeScript();
					  ?></td>
                </tr>
              </table>
            </form>
</body>
</html>
