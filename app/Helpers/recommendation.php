<?php

use \App\Cache\Setting\SettingByKey;

if (! function_exists('isRecombeeEnabled')) {

    function isRecombeeEnabled(): bool
    {
        return (new SettingByKey('recombee_enabled'))->fetch()?->value ?? false;
    }
}

if (! function_exists('getRecommendationDriver')) {
    /**
     * Get recommendation driver
     */
    function getRecommendationDriver(): string
    {
        return (new SettingByKey('recommendation_driver'))->fetch()?->value ??
            config('recommendation.default');
    }
}
