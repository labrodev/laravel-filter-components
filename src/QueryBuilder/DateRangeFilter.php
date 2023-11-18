<?php

declare(strict_types=1);

namespace Labrodev\Filters\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * Class DateRangeFilter
 *
 * This filter allows filtering a query by a date range.
 */
class DateRangeFilter implements Filter
{
    private const DEFAULT_START_DATE = '1970-01-01';
    private const DEFAULT_END_DATE = '2099-12-31';

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
        $startDate = is_array($value) ? ($value[0] ?? self::DEFAULT_START_DATE) : self::DEFAULT_START_DATE;
        $endDate = is_array($value) ? ($value[1] ?? self::DEFAULT_END_DATE) : self::DEFAULT_END_DATE;

        $query->whereBetween($property, [$startDate, $endDate]);
    }
}
