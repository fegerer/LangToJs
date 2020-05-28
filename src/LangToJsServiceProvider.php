<?php

namespace Fegerer\LangToJs;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class LangToJsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        foreach (config('langtojs.languages') as $lang) {

            Cache::remember('langtojs.' . $lang, config('langtojs.cachetime') , function () use ($lang) {

                $translations = [];

                $jsonPath = resource_path() . "/lang/{$lang}.json";
                if (File::exists($jsonPath)) {
                    $translations = json_decode(File::get($jsonPath), true);
                }

                $files = File::files(resource_path() . "/lang/{$lang}");
                foreach ($files as $file) {
                    $data = Arr::dot(File::getRequire($file->getRealPath()));
                    foreach ($data as $key => $value) {
                        $translations[$file->getBasename('.php') . "." . $key] = $value;
                    }
                }

                return json_encode($translations, JSON_UNESCAPED_UNICODE);
            });
        }

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/langtojs.php', 'langtojs');

        // Register the service the package provides.
        $this->app->singleton('langtojs', function ($app) {
            return new LangToJs;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['langtojs'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__.'/../config/langtojs.php' => config_path('langtojs.php'),
        ], 'langtojs.config');
    }
}
