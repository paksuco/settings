<?php

namespace Paksuco\Settings\Services;

use Exception;
use Paksuco\Settings\Models\Option;

class Settings
{
    /**
     * Gets the option value from database
     *
     * @param   string $key      The field key to return
     * @param   string $default  The default value if the field doesn't exist, default null
     *
     * @return  string           The correspoding value
     */
    public static function get($key, $default = null)
    {
        $option = Option::where("field_name", "=", $key)->get();

        if ($option->count() > 0) {
            return $option->first()->field_value;
        }

        return $default;
    }

    /**
     * Try to set the value of the key, throw if row doesn't exist
     *
     * @param   string  $key    The key to set it's value
     * @param   string  $value  The value
     *
     * @return  boolean         Whether the set operation is successful
     * @throws  \Exception      When the row doesn't exist.
     */
    public static function set($key, $value)
    {
        $option = Option::where("field_name", "=", $key)->get();
        if ($option->count() > 0) {
            $option = $option->first();
            $option->field_value = $value;
            $option->save();

            return true;
        }

        throw new Exception("Option $key doesn't exist.");
    }
}
