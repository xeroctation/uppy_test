<?php

namespace Xeroctation\Uppy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Uppy extends Model
{
    use HasFactory;
    protected $table = config('uppy.uppy_model');

}