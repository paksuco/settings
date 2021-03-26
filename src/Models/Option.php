<?php

namespace Paksuco\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $fillable = [
        "field_title",
        "field_key",
        "field_type",
        "field_properties",
        "field_value"
    ];
}
