<?php

namespace BIM\Http\Controllers;

use Illuminate\Http\Request;

use BIM\Http\Requests;
use Calendar;

class ScheduleController extends Controller
{
    public function index($year='', $month='')
    {
        $calendar = Calendar::generate($year,$month);
        return $calendar;
    }
}
