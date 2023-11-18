<?php

declare(strict_types=1);

namespace Labrodev\Filters\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class IsNotNullFilter
 *
 * This filter allows filtering
 * a query by checking if a property
 * is null or not null based on the provided value.
 */
class IsNotNullFilter implements Filter
{
    /**
     * Apply the filter to the given Eloquent query.
     *
     * @param Builder $query The Eloquent query builder.
     * @param mixed $value The value indicating whether to filter for null or not null.
     * @param string $property The property or column to apply the filter to.
     *
     */
    public function __invoke(
        Builder $query,
        $value,
        string $property
    ) {

        $actions = [
            0 => 'whereNull',
            1 => 'whereNotNull',
        ];

        if (is_string($value)) {
            if (array_key_exists($value, $actions)) {
                $action = $actions[$value];
                $query->$action($property);
            }
        }
    }
}
