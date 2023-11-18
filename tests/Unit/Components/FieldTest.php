<?php

use Illuminate\Http\Request;
use Labrodev\Filters\Components\Field;
use Labrodev\Filters\Tests\TestCase;

class FieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new Field($request, $field, $name);

        $this->assertEquals($name, $component->name);
        $this->assertEquals($field, $component->field);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new Field($request, $field, $name);

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::field', 
            $view->getName()
        );
    }
}
