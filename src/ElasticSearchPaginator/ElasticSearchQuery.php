<?php

namespace BayWaReLusy\ElasticSearchPaginator;

class ElasticSearchQuery
{
    /** @var array<string, mixed> */
    protected array $query = [];
    /** @var array<string, mixed> */
    protected array $sort = [];

    /**
     * @param array<string, mixed> $query
     * @param array<string, mixed> $sort
     */
    public function __construct(array $query, array $sort = [])
    {
        $this->query = $query;
        $this->sort = $sort;
    }

    /**
     * @return array<string, mixed>
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array<string, mixed>
     */
    public function getSort(): array
    {
        return $this->sort;
    }
}
