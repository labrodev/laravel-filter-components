<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class CustomSelectField
 *
 * This is a filter component for custom select fields, providing options for filtering.
 */
class CustomSelectField extends BaseComponent
{
    /**
     * The options available for filtering custom select fields.
     *
     * @var array
     */
    public array $options;

    /**
     * The template to be used for rendering the component.
     *
     * @var string
     */
    protected $componentTemplate = 'select-field';

    /**
     * FilterCustomSelectField constructor.
     *
     * @param Request $request The HTTP request instance.
     * @param string $field The field associated with the filter component.
     * @param string $name The name associated with the filter component.
     * @param string $options A string representing options for the custom select field.
     */
    public function __construct(
        Request $request,
        string $field,
        string $name,
        string $options
    ) {
        parent::__construct($request, $field, $name);

        $this->options = explode(',', $options);
    }
}
