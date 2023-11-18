# labrodev/laravel-filter-components

---
This repo is Laravel package to extend filtering functionality in Laravel projects. If you have a list with items and you use spatie/laravel-query-builder to filter them, this package could be useful for you. 

## QueryBuilder classes

In this package you may find some custom part of Query Builder to extend filtering logic.

**DateRangeFilter**

QueryBuilder class which implements a logic to filter by range of dates using WhereBetween. 

**IsNotNullFilter**

QueryBuilder class which implements a logic to filter by whereNull or whereNotNull depend on the given input value. Could be used when we just need to filter by some flag behind which there is a logic (like: Have unpaid invoices - Yes/No).

**WhereInFilter**

QueryBuilder class which implements a logic to filter b whereIn using given array of values (good for multiple selects as filters). 

## View components

Also in this package you may find filter components that render filter component depends on type and logic.  

You may public vendor views from this package to implement your own styles for filter components blade templates and to adjust it to your layout and theme. 

By default filter components in blade use Bootstrap classes. 

**Boolean filter**

View component to render a filter with select options No,Yes (or custom options defined in component attribute).

**Custom select filter**

View component to render a filter with custom select options as filter options. 

**Date range filter**

View component to render a filter with two date inputs as date range (start date and end date).

**Input filter**

View component to render a filter with text input.

**Multiple select field**

View component to render a filter with multiple select options from given Eloquent Model. 

**Select field**

View component to render a filter with select options from given Eloquent Model. 

**Link**

View component to render a sort field.

## Installation

You can install the package via composer:

```bash
composer require labrodev/laravel-filter-components
```

Optionally, you can publish the views to implement them to your layout. 

```bash
php artisan vendor:publish --tag=filter-components-views
```

Optionally, you can publish the view components to extend the logic you need.

```bash
php artisan vendor:publish --tag=filter-components-components
```

## Usage

### QueryBuilder classes

Let's assume that you are familiar with [Spatie\QueryBuilder](https://spatie.be/docs/laravel-query-builder/v5/introduction) and already implemented filtering logic using Spatie\QueryBuilder. 

You may extend usage by using QueryBuilder classes from this package: DateRangeFilter, WhereInFilter, IsNotNullFilter.

```php
use Illuminate\Http\Request;
use Labrodev\Filters\QueryBuilder\DateRangeFilter;
use Labrodev\Filters\QueryBuilder\WhereInFilter;
use Labrodev\Filters\QueryBuilder\IsNotNullFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class YourQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = YourModel::query();

        parent::__construct($query, $request);

        //DateRangeFilter
        $this->allowedFilters([
            AllowedFilter::custom('filter_name', new DateRangeFilter(), 'table_column') 
        ]);

        //DateRangeFilter
        $this->allowedFilters([
            AllowedFilter::custom('filter_name', new WhereInFilter(), 'table_column') 
        ]);

        //IsNotNullFilter
        $this->allowedFilters([
            AllowedFilter::custom('filter_name', new IsNotNullFilter(), 'table_column') 
        ]);
    }
}
```

### View components

Let's consider that you want to have a filtering in your CRUD list.

There could be a filter block. Let's assume to may have a form for your filters. 

```blade
<form action="your filter routing" method="GET">
<!-- and here could be components from this package -->
<button type="submit"></button>
</form>
```

**Boolean filter**

```blade
<x-filter-boolean-field 
    field="filter[{{ $filterField }}]" 
    name="{{ __('Filter label') }}" 
    options="{{__('Your option 1') }},{{ __('Your option 2')}}">
</x-filter-boolean-field>
```

* field - this property is query parameter which will be in search request
* name - this is label for this filter
* options - options which will be in select box; if it is not provided, then it will No, Yes options by default

**Custom select filter**

```blade
<x-filter-custom-select-field>
    field="filter[{{ $filterField }}]"
    name="{{ __('Filter label') }}"
    options="{{__('Your option 1') }},{{ __('Your option 2')}}">
</x-filter-custom-select-field>
```

* field - this property is query parameter which will be in search request
* name - this is label for this filter
* options - options which will be in select box

**Date range filter**

```blade
<x-filter-date-range-field>
    field="filter[{{ $filterField }}]"
    name="{{ __('Filter label') }}">
</x-filter-date-range-field>
```

* field - this property is query parameter which will be in search request
* name - this is label for this filter

**Input filter**

```blade
<x-filter-field>
    field="filter[{{ $filterField }}]"
    name="{{ __('Filter label') }}">
</x-filter-field>
```

* field - this property is query parameter which will be in search request
* name - this is label for this filter

**Multiple select filter**

```blade
<x-filter-multiple-select-field 
    field="filter[{{$filterField}}]"
    name="{{ __('Filter label') }}"
    class="{{ $eloquentModelClass }}"
    value="{{ $eloquentModelProperty}}">
</x-filter-multiple-select-field>
```

* field - this property is query parameter which will be in search request
* name - this is label for this filter
* class - Eloquent model class from where will be taken values for options. For example, if class is App\Models\UserGroup, then will be rendered all user groups from `user_groups` table as options 
* value - property which will be shown as options. For example, if value will be `name`, column `name` from `user_groups` table will be used for option; if you want to split two columns to have them as option, put in value them separeted by comma: 'column1,column2'

**Select filter**

```blade
<x-filter-select-field 
     field="filter[{{$filterField}}]"
    name="{{ __('Filter label') }}"
    class="{{ $eloquentModelClass }}"
    value="{{ $eloquentModelProperty}}">
</x-filter-select-field>
```    

* field - this property is query parameter which will be in search request
* name - this is label for this filter
* class - Eloquent model class from where will be taken values for options. For example, if class is App\Models\UserGroup, then will be rendered all user groups from `user_groups` table as options 
* value - property which will be shown as options. For example, if value will be `name`, column `name` from `user_groups` table will be used for option; if you want to split two columns to have them as option, put in value them separeted by comma: 'column1,column2'

**Link**

```blade
<x-sort-link name="{{ $fieldToSort }}">
</x-sort-link>
```  

* name - field to sort 

## Testing

```bash
composer test
```

## PhpStan check

```bash
composer analyse
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Labro Dev](https://github.com/labrodev)

We are appriciate [Spatie](https://github.com/spatie) for inspiration, sharing experiences and their beaufiul Laravel packages that we are widely use and highly recommend.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


