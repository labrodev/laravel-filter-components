<?php

use Illuminate\Database\Eloquent\Builder;
use Labrodev\Filters\QueryBuilder\WhereInFilter;
use Labrodev\Filters\Tests\TestCase;

class WhereInFilterTest extends TestCase
{
    /** @test */
    public function it_can_apply_array_as_value()
    {
        $query = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->getMock();
  
        $value = ['first', 'second'];
        $property = 'example_column';

        $filter = new WhereInFilter();
        $filter($query, $value, $property);

        $this->addToAssertionCount(1); 
    }

    /** @test */
    public function it_can_apply_string_as_value()
    {
        $query = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->getMock();
  
        $value = 'first';
        $property = 'example_column';

        $filter = new WhereInFilter();
        $filter($query, $value, $property);

        $this->addToAssertionCount(1); 
    }
}
