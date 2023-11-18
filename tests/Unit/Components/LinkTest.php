<?php

use Labrodev\Filters\Components\Link;
use Labrodev\Filters\Tests\TestCase;

class LinkTest extends TestCase
{
    /** @test */
    public function it_has_correct_attributes()
    {
        $name = 'Example name';

        $component = new Link($name);

        $this->assertEquals($name, $component->name);
    }

    /** @test */
    public function it_renders_correctly()
    {
        $name = 'Example name';

        $component = new Link($name);

        $view = $component->render();

        $this->assertStringContainsString(
            'filter-components::sort-link', 
            $view->getName()
        );
    }
}
