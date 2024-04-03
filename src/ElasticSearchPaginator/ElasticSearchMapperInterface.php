<?php

namespace BayWaReLusy\ElasticSearchPaginator;

interface ElasticSearchMapperInterface
{
    /**
     * @param array $query
     * @param int $size
     * @param int $page
     * @param array $sort
     * @return ElasticSearchEntityInterface[]
     */
    public function searchIndex(array $query, int $size = 5000, int $page = 1, array $sort = []): array;

    /**
     * @param array $query
     * @return int
     */
    public function resultCount(array $query): int;
}
