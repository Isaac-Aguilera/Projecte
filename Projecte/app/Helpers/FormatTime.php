<?php
namespace App\Helpers;

class FormatTime {
    public static function LongTimeFilter($date) {
        if ($date == null) {
            return "Sense data";
        }
 
        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));
 
        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' segons';
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' segon';
                                } else {
                                    $result = $since_start->s . ' segons';
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' minut';
                            } else {
                                $result = $since_start->i . ' minuts';
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' hora';
                        } else {
                            $result = $since_start->h . ' hores';
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' día';
                    } else {
                        $result = $since_start->d . ' díes';
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' mes';
                } else {
                    $result = $since_start->m . ' mesos';
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' any';
            } else {
                $result = $since_start->y . ' anys';
            }
        }
 
        return "Fa " . $result;
    }
}