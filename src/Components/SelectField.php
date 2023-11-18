<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Labrodev\Filters\Components\BaseComponent;

/**
 * Class SelectField
 *
 * This is a filter component for select fields, providing options for filtering.
 */
class SelectField extends BaseComponent
{
    /**
     * The options available for filtering select fields.
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
     * FilterSelectField constructor.
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
     * Fetch the options for filtering select fields.
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

        $modelProperties = explode(',', $modelProperty);

        $modelProperty1 = $modelProperties[0];
        $modelProperty2 = $modelProperties[1] ?? null;

        $orderByAlias = BaseComponent::ORDER_BY_ALIAS;
        $defaultPropertyKey = BaseComponent::DEFAULT_PROPERTY_KEY;

        $options = $modelClass::orderBy($modelProperty1, $orderByAlias)
            ->get();

        if ($modelProperty2 === null) {
            return $options->pluck($modelProperty, $defaultPropertyKey)
                ->toArray();
        }

        $extendedOptions = [];

        foreach ($options as $option) {
            if (!isset($option->$defaultPropertyKey)) {
                break;
            }
            $extendedOptions[$option->$defaultPropertyKey] = sprintf('%s %s',
                $option->$modelProperty1,
                $option->$modelProperty2 ?? null
            );
        }

        return $extendedOptions;
    }
}
