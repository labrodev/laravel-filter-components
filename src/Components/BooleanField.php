<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class BooleanField
 *
 * This is a filter component for boolean fields, providing options for filtering.
 */
class BooleanField extends BaseComponent
{
    /**
     * The options available for filtering boolean values.
     *
     * @var array
     */
    public array $options;

    /**
     * The template to be used for rendering the component.
     *
     * @var string
     */
    protected $componentTemplate = 'boolean-field';

    /**
     * FilterBooleanField constructor.
     *
     * @param Request $request The HTTP request instance.
     * @param string $field The field associated with the filter component.
     * @param string $name The name associated with the filter component.
     * @param string|null $options Optional string representing options for filtering.
     */
    public function __construct(
        Request $request,
        string $field,
        string $name,
        ?string $options = null
    ) {
        parent::__construct($request, $field, $name);

        $this->options = $this->fetchOptions($options);
    }

    /**
     * Fetch the options for filtering boolean values.
     *
     * @param string|null $options Optional string representing options for filtering.
     *
     * @return array The array of options for filtering.
     */
    protected function fetchOptions(?string $options): array
    {
        return $options ? explode(',', $options) :
            [trans('No'), trans('Yes')];
    }
}
