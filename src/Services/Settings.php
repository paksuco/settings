<?php

namespace Paksuco\Settings\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Paksuco\Settings\Fields\TextInput;
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
    public static function get($fieldKey, $default = null)
    {
        if (Cache::has("settings::$fieldKey")) {
            return Cache::get("settings::$fieldKey");
        }
        try {
            $option = Option::where("field_key", "=", $fieldKey)->get();
            if ($option->count() > 0) {
                Cache::add("settings::$fieldKey", $option->first()->field_value, 6 * 60 * 60);
                return $option->first()->field_value;
            } else {
                Cache::add("settings::$fieldKey", $default, 6 * 60 * 60);
            }
        } catch (\Throwable $ex) {
            //report($ex);
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
        $option = Option::where("field_key", "=", $key)->get();
        if ($option->count() > 0) {
            $option = $option->first();
            $option->field_value = $value;
            $option->save();

            Cache::add("settings::$key", $value, 6 * 60 * 60);

            return true;
        }

        throw new Exception("Option $key doesn't exist.");
    }

    public static function delete($key)
    {
        Cache::forget("settings::$key");
        return Option::where("field_key", "=", $key)->delete();
    }

    public static function exists($key)
    {
        return Option::where("field_key", "=", $key)->count() > 0;
    }

    public static function create($key, $value, $title, $type = TextInput::class, $properties = [])
    {
        if (Settings::exists($key)) {
            return false;
        }

        $option = new Option();
        $option->field_key = $key;
        $option->field_title = $title;
        $option->field_type = $type;
        $option->field_properties = !is_string($properties) ? json_encode($properties) : $properties;
        $option->field_value = $value;
        $option->save();

        Cache::create("settings::$key", $value);
    }
}
