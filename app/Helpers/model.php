<?php

use Illuminate\Database\Eloquent\Model;

if (! function_exists('getFillableFields')) {
    /**
     * Get the attributes that are mass assignable.
     *
     * @param  string  $model
     */
    function getFillableFields(string $model): array
    {
        return app($model)->getFillable();
    }
}

if (! function_exists('filterDataFillableFields')) {
    /**
     * Filter to only include mass assignable attributes.
     *
     * @param  string  $model
     * @param  array  $data
     */
    function filterDataFillableFields(string $model, array $data = []): array
    {
        return collect($data)
            ->only(getFillableFields($model))
            ->toArray();
    }
}

if (! function_exists('getModelId')) {
    /**
     * Get the value of the model's primary key.
     *
     * @param  mixed  $model
     *
     * @throws \InvalidArgumentException
     */
    function getModelId(mixed $model): mixed
    {
        if ($model instanceof Model) {
            return $model->getKey();
        }

        if (is_int($model) || is_string($model)) {
            return $model;
        }

        throw new InvalidArgumentException("The argument type is invalid.", 500);
    }
}
