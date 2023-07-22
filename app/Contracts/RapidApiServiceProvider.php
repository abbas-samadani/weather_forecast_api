<?php


namespace App\Contracts;

interface RapidApiServiceProvider
{
    public function getIterableFromProvider(string $uri, string $dataIndex = '', array $params = []): ?iterable;
}
