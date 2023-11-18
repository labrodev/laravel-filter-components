<?php

use Illuminate\Http\Request;
use Labrodev\Filters\Components\CustomSelectField;
use Labrodev\Filters\Tests\TestCase;

class CustomSelectFieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $options = 'Option1,Option2';

        $component = new CustomSelectField($request, $field, $name, $options);

        $this->assertEquals(['Option1', 'Option2'], $component->options);
        $this->assertEquals($field, $component->field);
        $this->assertEquals($name, $component->name);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $options = 'Option1,Option2';

        $component = new CustomSelectField($request, $field, $name, $options);

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::select-field', 
            $view->getName()
        );
    }
}
