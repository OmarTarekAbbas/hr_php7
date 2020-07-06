<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'myvacations/comboselect',
        'mytravelling/comboselect',
        'operator/comboselect',
        'notifications/comboselect',
        'travelling/comboselect',
        'sximo/module/combotable',
        'sximo/module/combotablefield',
        'commitments/comboselect',
        'campaignalbums/comboselect',
        'track/comboselect',
        'occasions/comboselect',
        'audiometadata/comboselect',
        'originalcontents/comboselect',
        'finalvideo/comboselect',
        'finalimage/comboselect',
        'departments/comboselect',
    ];
}
