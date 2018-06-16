<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class Events extends Model
{
    use FormAccessible;

    protected $fillable = [
        'title', 'eventDate',
    ];
}
