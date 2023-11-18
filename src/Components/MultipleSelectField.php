<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class MultipleSelectField
 *
 * This is a filter component for multiple select fields.
 */
class MultipleSelectField extends BaseComponent
{
    /**
     * The options available for filtering multiple select fields.
     *
     * @var array
     */
    public array $options;

    /**
     * The template to be used for rendering the component.
     *
     * @var string
     */
    protected $componentTemplate = 'multiple-select-field';

    /**
     * FilterMultipleSelectField constructor.
     *
     * @param Request $request The HTTP request instance.
     * @param string $field The field associated with the filter component.
     * @param string $name The name associated with the filter component.
     * @param string $modelClass The class representing the model for options.
     * @param string $modelProperty The property of the model used for options.
     */
    public function __construct(
        Request $request,
        string $field,
        string $name,
        string $modelClass,
        string $modelProperty
    ) {
        parent::__construct($request, $field, $name);

        $this->options = $this->fetchOptions($modelClass, $modelProperty);
    }

    /**
     * Fetch the options for filtering multiple select fields.
     *
     * @param string $modelClass The class representing the model for options.
     * @param string $modelProperty The property of the model used for options.
     *
     * @return array The array of options for filtering.
     */
    private function fetchOptions(string $modelClass, string $modelProperty): array
    {
        if (!class_exists($modelClass)) {
            return [];
        }

        if (!is_subclass_of($modelClass, Model::class)) {
            return [];
        }

        $orderByAlias = BaseComponent::ORDER_BY_ALIAS;
        $defaultPropertyKey = BaseComponent::DEFAULT_PROPERTY_KEY;

        return $modelClass::orderBy($modelProperty, $orderByAlias)
            ->pluck($modelProperty, $defaultPropertyKey)
            ->toArray();
    }
}
