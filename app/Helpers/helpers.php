<?php

//in this helper function can show any word like this
//NewLine =====> new-line
//it can help to write any route name very easier
/*
 * Example
 * in routes/web.php
 * Route::resource('line-items', 'LineItemsController');

 * in  blade templates
   <a href="{{ show_route($lineItem) }}">
    {{ $lineItem->name }}
   </a>
 *
 * */

use Illuminate\Support\Facades\Lang;

if (! function_exists('show_route')) {
    function show_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.show", $model);
    }
}

if (! function_exists('plural_from_model')) {
    function plural_from_model($model)
    {
        $plural = Str::plural(class_basename($model));

        return Str::kebab($plural);
    }
}

//--------------------------------------------------------------------------------------------------
if (! function_exists('plural_from_model')) {

    function t($key, $placeholder = [], $locale = null)
    {

        $group = 'manager';
        if (is_null($locale))
            $locale = config('app.locale');
        $key = trim($key);
        $word = $group . '.' . $key;
        if (Lang::has($word))
            return trans($word, $placeholder, $locale);

        $messages = [
            $word => $key,
        ];

        app('translator')->addLines($messages, $locale);
        $langs = config('translatable.locales');
        foreach ($langs as $lang) {
            $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
            $fh = fopen($translation_file, 'r+');
            $new_key = "  \n  '$key' => '$key',\n];\n";
            fseek($fh, -4, SEEK_END);
            fwrite($fh, $new_key);
            fclose($fh);
        }
        return trans($word, $placeholder, $locale);
        return $key;

    }
}

