<?php

use Illuminate\Http\Request;
use Spatie\QueryString\QueryString;
use Labrodev\Filters\Tests\TestCase;

class helpersTest extends TestCase
{
    /** @test */
    public function it_can_create_query_string_with_sort()
    {
        $queryString = query_sort('name');

        $this->assertInstanceOf(QueryString::class, $queryString);
    }

    /** @test */
    public function it_can_check_if_sort_is_active()
    {
        $isActive = query_sort_active('name');

        $this->assertFalse($isActive);
    }

    /** @test */
    public function it_can_create_a_query_string_instance()
    {
        $queryString = query_string();

        $this->assertInstanceOf(QueryString::class, $queryString);
    }

    /** @test */
    public function it_can_clear_filter_from_query_string()
    {
        // Assuming a request with a query parameter ?filter=name
        $clearedQuery = clear_filter('name');

        $this->assertEquals('', $clearedQuery);
    }

    /** @test */
    public function it_can_check_if_link_is_active()
    {
        // Assuming a request with the URI '/example'
        $isActive = is_link_active('/example');

        $this->assertFalse($isActive);
    }
}
