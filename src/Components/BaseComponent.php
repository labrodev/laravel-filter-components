<?php

declare(strict_types=1);

namespace Labrodev\Filters\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;
use Labrodev\Filters\FilterServiceProvider;

/**
 * Class BaseComponent
 *
 * This is a base component class providing common properties and methods for filter components.
 */
class BaseComponent extends Component
{
    /**
     * The field associated with the filter component.
     *
     * @var string
     */
    public string $field;

    /**
     * The name associated with the filter component.
     *
     * @var string
     */
    public string $name;

    /**
     * The current URL of the request.
     *
     * @var string
     */
    public string $currentUrl;

    /**
     * The current search query value for the associated field.
     *
     * @var string|array
     */
    public string|array $currentSearchQuery;

    /**
     * The default property key used in queries.
     */
    protected const DEFAULT_PROPERTY_KEY = 'id';

    /**
     * The default order direction used in queries.
     */
    protected const ORDER_BY_ALIAS = 'ASC';

    /**
     * The query parameter used for filtering.
     */
    protected const FILTER_QUERY_PARAMETER = 'filter';

    /**
     * BaseComponent constructor.
     *
     * @param Request $request The HTTP request instance.
     * @param string $field The field associated with the filter component.
     * @param string $name The name associated with the filter component.
     */
    public function __construct(Request $request, string $field, string $name)
    {
        $this->field = $field;
        $this->name = $name;
        $this->currentUrl = $request->url();

        $filterQueryParameter = self::FILTER_QUERY_PARAMETER;
        $filterValues = $request->get($filterQueryParameter);
        $this->currentSearchQuery = is_array($filterValues) && isset($filterValues[$field]) ? $filterValues[$field] : '';
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View The rendered view of the component.
     */
    public function render()
    {
        $packageName = FilterServiceProvider::PACKAGE_NAME;

        return view(
            sprintf('%s::%s', 
                $packageName, 
                $this->componentTemplate ?? 'field'
            )
        );
    }

}
