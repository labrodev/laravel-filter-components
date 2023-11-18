<?php

use Illuminate\Database\Eloquent\Builder;
use Labrodev\Filters\QueryBuilder\IsNotNullFilter;
use Labrodev\Filters\Tests\TestCase;

class IsNotNullFilterTest extends TestCase
{
    /** @test */
    public function it_can_apply_is_not_null_filter()
    {
        $query = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->getMock();
  
        $property = 'example_column';
        $value = rand(0,1);

        $filter = new IsNotNullfilter();
        $filter($query, $value, $property);

        $this->addToAssertionCount(1); 
    }
}
