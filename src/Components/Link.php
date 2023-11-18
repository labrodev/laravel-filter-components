<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\View\Component;

/**
 * Class Link
 *
 * This is a component for rendering a sortable link in a table header.
 */
class Link extends Component
{
    /**
     * The name associated with the sort link.
     *
     * @var string
     */
    public string $name;

    /**
     * SortLink constructor.
     *
     * @param string $name The name associated with the sort link.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View The rendered view of the component.
     */
    public function render()
    {
        return view('filter-components::sort-link');
    }
}
