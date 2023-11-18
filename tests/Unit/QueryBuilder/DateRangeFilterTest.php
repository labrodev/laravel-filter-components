<?php

use Illuminate\Database\Eloquent\Builder;
use Labrodev\Filters\QueryBuilder\DateRangeFilter;
use Labrodev\Filters\Tests\TestCase;

class DateRangeFilterTest extends TestCase
{
    /** @test */
    public function it_can_apply_date_range_filter()
    {
        $query = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->getMock();

        $startDate = '2024-01-01';
        $endDate = '2024-12-31';
        $value = [$startDate, $endDate];
        $property = 'example_column';

        $filter = new DateRangeFilter();
        $filter($query, $value, $property);

        $this->addToAssertionCount(1); 
    }
}
