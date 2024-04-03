<?php

namespace BayWaReLusy\ElasticSearchPaginator;

interface ElasticSearchMapperInterface
{
    /**
     * Search the index with the given query.
     *
     * @param array $query
     * @param int $size
     * @param int $page
     * @param array $sort
     * @return ElasticSearchEntityInterface[]
     */
    public function searchIndex(array $query, int $size = 5000, int $page = 1, array $sort = []): array;

    /**
     * Get the number of results for the given query.
     *
     * @param array $query
     * @return int
     */
    public function resultCount(array $query): int;

    /**
     * Get the name of the ElasticSearch index.
     *
     * @return string
     */
    public function getIndexName(): string;
}
