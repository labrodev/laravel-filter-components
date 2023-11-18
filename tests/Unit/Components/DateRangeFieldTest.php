<?php

use Illuminate\Http\Request;
use Labrodev\Filters\Components\DateRangeField;
use Labrodev\Filters\Tests\TestCase;

class DateRangeFieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new DateRangeField($request, $field, $name);

        $this->assertEquals($name, $component->name);
        $this->assertEquals($field, $component->field);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new DateRangeField($request, $field, $name);

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::date-range-field', 
            $view->getName()
        );
    }
}
