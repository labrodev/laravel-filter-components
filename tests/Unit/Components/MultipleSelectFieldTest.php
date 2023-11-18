<?php

use Illuminate\Http\Request;
use Labrodev\Filters\Components\MultipleSelectField;
use Labrodev\Filters\Tests\TestCase;

class MultipleSelectFieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $modelClass = 'ExampleModelClass';
        $modelProperty = 'name';

        $component = new MultipleSelectField(
            $request, 
            $field,
            $name, 
            $modelClass,
            $modelProperty
        );

        $this->assertEquals($field, $component->field);
        $this->assertEquals($name, $component->name);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $modelClass = 'ExampleModelClass';
        $modelProperty = 'name';

        $component = new MultipleSelectField(
            $request, 
            $field,
            $name, 
            $modelClass,
            $modelProperty
        );

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::multiple-select-field', 
            $view->getName()
        );
    }
}
