<?php

namespace Paksuco\Settings\Traits;

use Paksuco\Settings\Facades\Settings;

trait HasDynamicSettings
{
    public function __construct($id)
    {
        parent::__construct($id);

        $this->listeners = array_merge($this->listeners, [
            "settings-ui::updated" => "updateMember",
        ]);
    }

    public function updateMember($args)
    {
        $model = $args["model"];
        $value = $args["value"];

        if (strpos($model, ".") > 0) {
            $fields = explode(".", $model);
            $key = array_shift($fields);
            if (property_exists($this, $key)) {
                if (is_object($this->$key) || is_array($this->$key)) {
                    data_set($this->{$key}, $fields, $value);
                    if (method_exists($this, "updated" . ucfirst($key))) {
                        call_user_func(array($this, "updated" . ucfirst($key)));
                    }
                }
            }
        } else {
            if (property_exists($this, $model)) {
                $this->{$model} = $value;
                if (method_exists($this, "updated" . ucfirst($model))) {
                    call_user_func(array($this, "updated" . ucfirst($model)), $value);
                }
            }
        }
    }
}
