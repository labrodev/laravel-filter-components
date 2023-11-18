<?php

namespace Labrodev\Filters;

use Labrodev\Filters\Components\BooleanField;
use Labrodev\Filters\Components\CustomSelectField;
use Labrodev\Filters\Components\DateRangeField;
use Labrodev\Filters\Components\Field;
use Labrodev\Filters\Components\MultipleSelectField;
use Labrodev\Filters\Components\SelectField;
use Labrodev\Filters\Components\Link;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class FilterServiceProvider extends PackageServiceProvider
{
    public const PACKAGE_NAME = 'filter-components';

    public function configurePackage(Package $package): void
    {
        $packageName = self::PACKAGE_NAME;

        $package
            ->name($packageName)
            ->hasTranslations()
            ->hasViews()
            ->hasViewComponents('filter', BooleanField::class)
            ->hasViewComponents('filter', CustomSelectField::class)
            ->hasViewComponents('filter', DateRangeField::class)
            ->hasViewComponents('filter', Field::class)
            ->hasViewComponents('filter', MultipleSelectField::class)
            ->hasViewComponents('filter', SelectField::class)
            ->hasViewComponents('sort', Link::class);
    }
}
