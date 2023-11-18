<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class Field
 *
 * This is a filter component for filter text input fields.
 */
class Field extends BaseComponent
{
    /**
     * The template to be used for rendering the component.
     *
     * @var string
     */
    protected $componentTemplate = 'field';
}
