<?php

namespace BayWaReLusy\ElasticSearchPaginator;

class ElasticSearchQuery
{
    protected array $query = [];
    protected array $sort = [];

    public function __construct(array $query, array $sort = [])
    {
        $this->query = $query;
        $this->sort = $sort;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getSort(): array
    {
        return $this->sort;
    }
}
