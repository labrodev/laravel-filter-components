<?php

declare(strict_types=1);

namespace Labrodev\Filters\QueryBuilder;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereInFilter
 *
 * This filter allows filtering a query by an array or a single value using the WHERE IN clause.
 */
class WhereInFilter implements Filter
{
    /**
     * Apply the filter to the given Eloquent query.
     *
     * @param Builder $query The Eloquent query builder.
     * @param mixed $value The value or array of values to filter by.
     * @param string $property The property or column to apply the WHERE IN filter to.
     *
     */
    public function __invoke(
        Builder $query,
        $value,
        string $property
    ) {

        // Ensure $value is an array or convert it to an array
        $values = is_array($value) ? array_filter($value) : [$value];

        if (!empty($values)) {
            $query->whereIn($property, $values);
        }
    }
}
