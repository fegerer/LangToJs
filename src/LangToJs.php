<?php

namespace Fegerer\LangToJs;

use Illuminate\Support\Facades\Cache;

class LangToJs
{
    /**
     * add Javacript with Translations
     *
     * @param string $variable
     * @return string
     */
    public function scripts()
    {
        return '
        <script>
            window.LangToJs = ' . Cache::get('langtojs.' . app()->getLocale(), 'null') . ';
            window.__ = function (string) {
                if (typeof window.LangToJs[string] === "undefined") {
                    return string;
                }
                    return window.LangToJs[string];
            }
        </script>';
    }
}
