<?php

namespace BayWaReLusy\ElasticSearchPaginator;

interface ElasticSearchMapperInterface
{
    /**
     * Search the index with the given query.
     *
     * @param array<string, mixed> $query
     * @param int $size
     * @param int $page
     * @param array<string, mixed> $sort
     * @return ElasticSearchEntityInterface[]
     */
    public function searchIndex(array $query, int $size = 5000, int $page = 1, array $sort = []): array;

    /**
     * Get the number of results for the given query.
     *
     * @param array<string, mixed> $query
     * @return int
     */
    public function resultCount(array $query): int;

    /**
     * Get the name of the ElasticSearch index.
     *
     * @return string
     */
    public function getIndexName(): string;

    /**
     * Create/Replace the given entities.
     *
     * @param ElasticSearchEntityInterface[] $entities
     * @param ElasticSearchIndexRefreshMode $refreshMode If 'true', refresh index immediately. If 'false', return
     *                                                   without refreshing. If 'waitFor', wait for next refresh before
     *                                                   returning.
     * @return ElasticSearchEntityInterface
     */
    public function createOrReplaceInIndex(
        array $entities,
        ElasticSearchIndexRefreshMode $refreshMode = ElasticSearchIndexRefreshMode::false
    ): ElasticSearchEntityInterface;
}
