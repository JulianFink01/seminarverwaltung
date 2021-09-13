<?php

/**
 * author   TheArled | Andreas Codalonga
 */
class ICS
{
    var $data;
    var $title;
    function __construct($start, $end, $title, $description, $location)
    {
        $this->title = $title;
        $this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:" . date("Ymd\THis", strtotime($start)) . "\nDTEND:" . date("Ymd\THis", strtotime($end)) . "\nLOCATION:" . $location . "\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:" . date("Ymd\THis") . "\nSUMMARY:" . $title . "\nDESCRIPTION:" . $description . "\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEnd:VALARM\nEnd:VEVENT\nEnd:VCALENDAR\n";
    }
    function save()
    {
        header("Content-type:text/calendar");
        header('Content-Disposition: attachment; filename="' . $this->title . '.ics"');
        header('Content-Length: ' . strlen($this->data));
        header('Connection: close');
        echo $this->data;
    }
}
