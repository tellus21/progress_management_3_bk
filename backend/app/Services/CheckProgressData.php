<?php

namespace App\Services;

class CheckProgressData
{

    public static function checkGender($data)
    {
        if ($data->gender === 0) {
            $gender = '男性';
        }

        if ($data->gender === 1) {
            $gender = '女性';
        }

        return $gender;
    }

    public static function checkDoctorCheck($data)
    {
        if ($data->doctor_check === 0) {
            $doctor_check = '確認済';
        }

        if ($data->doctor_check === 1) {
            $doctor_check = '未確認';
        }

        return $doctor_check;
    }

    public static function checkNurseCheck($data)
    {

        if ($data->nurse_check === 0) {
            $nurse_check = '確認済';
        }
        if ($data->nurse_check === 1) {
            $nurse_check = '未確認';
        }

        return $nurse_check;
    }
}
