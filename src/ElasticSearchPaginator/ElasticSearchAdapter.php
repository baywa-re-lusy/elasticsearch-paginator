<?php

namespace BayWaReLusy\ElasticSearchPaginator;

use Laminas\Paginator\Adapter\AdapterInterface;

/**
 * @template T
 * @implements AdapterInterface<int, T>
 */
class ElasticSearchAdapter implements AdapterInterface
{
    protected ElasticSearchMapperInterface $mapper;
    protected ElasticSearchQuery $query;

    public function __construct(ElasticSearchMapperInterface $mapper, ElasticSearchQuery $query)
    {
        $this->mapper = $mapper;
        $this->query  = $query;
    }

    /**
     * @param ElasticSearchMapperInterface $mapper
     * @return ElasticSearchAdapter<T>
     */
    public function setMapper(ElasticSearchMapperInterface $mapper): ElasticSearchAdapter
    {
        $this->mapper = $mapper;
        return $this;
    }

    /**
     * @param ElasticSearchQuery $query
     * @return ElasticSearchAdapter<T>
     */
    public function setQuery(ElasticSearchQuery $query): ElasticSearchAdapter
    {
        $this->query = $query;
        return $this;
    }

    public function getItems($offset, $itemCountPerPage): array
    {
        $page = ($offset / $itemCountPerPage) + 1;
        return $this->mapper->searchIndex($this->query->getQuery(), $itemCountPerPage, $page, $this->query->getSort());
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->mapper->resultCount($this->query->getQuery());
    }
}
