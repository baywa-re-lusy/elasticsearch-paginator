<?php

namespace BayWaReLusy\ElasticSearchPaginator;

interface ElasticSearchMapperInterface
{
    /**
     * @param array $query
     * @param int $offset
     * @param int $countPerPage
     * @param array $sort
     * @return ElasticSearchEntityInterface[]
     */
    public function searchIndex(array $query, int $offset, int $countPerPage, array $sort): array;

    /**
     * @param array $query
     * @return int
     */
    public function resultCount(array $query): int;
}
