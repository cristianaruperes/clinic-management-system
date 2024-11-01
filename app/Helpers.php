<?php

function isSuperadmin()
{
    return Auth::user()->access_level == 'superadmin';
}

function isStaff()
{
    return Auth::user()->access_level == 'staf';
}

function isPharmacist()
{
    return Auth::user()->access_level == 'apoteker';
}

function isCashier()
{
    return Auth::user()->access_level == 'kasir';
}

function getActivityFeedColor($action)
{
    $actions = [
        'success' => 'success',
        'enable' => 'info',
        'disable' => 'warning',
        'edit' => 'info',
    ];

    if (isset($actions[$action])) {
        return $actions[$action];
    }

    return 'danger';
}

function gravatar($email)
{
    return 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=identicon';
}

function getAge($age) {
    
    // return Carbon\Carbon::parse($age)->age." tahun";
    return Carbon\Carbon::createFromDate($age)->diff(Carbon\Carbon::now())->format('%y Tahun, %m Bulan, %d Hari');
}

function getAddress($patient) {
    
    return ($patient->jalan ? $patient->jalan." ":"").($patient->kelurahan? $patient->kelurahan." ":"").($patient->kecamatan? $patient->kecamatan." ":"").($patient->city? $patient->city." ":"").($patient->postal_code? $patient->postal_code." ":"").($patient->residence? $patient->residence." ":"");
}