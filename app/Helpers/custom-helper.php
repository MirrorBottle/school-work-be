<?php

if (!function_exists('indonesian_date_format')) {
    /**
     * Change database date to Indonesian date format
     *
     * @param  mixed $date
     * @return date
     */
    function indonesian_date_format($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}

if (!function_exists('get_gender')) {
    /**
     * Get user gender
     *
     * @param  mixed $user
     * @return string
     */
    function get_gender($user)
    {
        return $user->gender === 0 ? 'Laki-laki' : 'Perempuan';
    }
}
