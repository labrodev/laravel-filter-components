<?php

use Illuminate\Http\Request;
use Spatie\QueryString\QueryString;

if (! function_exists('query_sort')) {
    function query_sort(string $value): QueryString
    {
        $queryString = app(QueryString::class);

        return $queryString->sort($value);
    }
}

if (! function_exists('query_sort_active')) {
    function query_sort_active(string $value): bool
    {
        $queryString = app(QueryString::class);

        return $queryString->isActive('sort', $value);
    }
}

if (! function_exists('query_string')) {
    function query_string(): QueryString
    {
        return app(QueryString::class);
    }
}

if (! function_exists('clear_filter')) {
    function clear_filter(string $name): string
    {
        $queryString = app(QueryString::class);

        return $queryString->clear($name);
    }
}

if (! function_exists('is_link_active')) {
    function is_link_active(string ...$hrefs): bool
    {
        $request = app(Request::class);

        $uriPath = parse_url($request->getUri(), PHP_URL_PATH) ?? '/';

        foreach ($hrefs as $href) {
            $hrefPath = parse_url($href, PHP_URL_PATH) ?? '/';

            if ($uriPath === $hrefPath) {
                return true;
            }
        }

        return false;
    }
}