<?php

if(!function_exists('fox009_wisdom_sanitize_select')){
    function fox009_wisdom_sanitize_select($input, $setting){
        // Ensure input is a slug.
        $input = sanitize_key($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
}

if(!function_exists('fox009_wisdom_sanitize_number')){
    function fox009_wisdom_sanitize_number($input, $setting){
		$input = floatval($input);
		$input_attrs = $setting->manager->get_control($setting->id)->input_attrs;
		$input_attrs = array_merge(
			array(
				'min'  => '',
				'max'  => '',
				'step' => '1',
			),
			$input_attrs
		);
		if($input < $input_attrs['min']){
			$input = $input_attrs['min'];
		}
		if($input > $input_attrs['max']){
			$input = $input_attrs['max'];
		}
		return $input;
    }
}

if(!function_exists('fox009_wisdom_sanitize_sortable')){
    function fox009_wisdom_sanitize_sortable($input, $setting){
		$input=explode(',', $input);
		foreach($input as $item){
			$item = sanitize_key($item);
			$choices = $setting->manager->get_control($setting->id)->choices;
			if(!array_key_exists($item, $choices)){
				return $setting->default;
			}
		}
        return $input;
    }
}