<?php

use Illuminate\Http\Request;
use Labrodev\Filters\Components\SelectField;
use Labrodev\Filters\Tests\TestCase;

class SelectFieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $modelClass = 'ExampleModelClass';
        $modelProperty = 'name';

        $component = new SelectField(
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

        $component = new SelectField(
            $request, 
            $field,
            $name, 
            $modelClass,
            $modelProperty
        );

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::select-field', 
            $view->getName()
        );
    }
}
