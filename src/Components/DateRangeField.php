<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class DateRangeField
 *
 * This is a filter component for date range fields.
 */
class DateRangeField extends BaseComponent
{
      /**
     * The template to be used for rendering the component.
     *
     * @var string
     */
    protected $componentTemplate = 'date-range-field';
}
