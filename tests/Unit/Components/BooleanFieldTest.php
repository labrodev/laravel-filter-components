<?php


use Illuminate\Http\Request;
use Labrodev\Filters\Components\BooleanField;
use Labrodev\Filters\Tests\TestCase;

class BooleanFieldTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';
        $options = 'Option1,Option2';

        $component = new BooleanField($request, $field, $name, $options);

        $this->assertEquals(['Option1', 'Option2'], $component->options);
        $this->assertEquals($field, $component->field);
        $this->assertEquals($name, $component->name);
    }

    /** @test */
    public function it_defaults_options_when_not_provided()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new BooleanField($request, $field, $name);

        $this->assertEquals([trans('No'), trans('Yes')], $component->options);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $request = new Request();
        $field = 'example_field';
        $name = 'Example Field';

        $component = new BooleanField($request, $field, $name);

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::boolean-field', 
            $view->getName()
        );
    }
}
