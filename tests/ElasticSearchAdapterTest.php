<?php

namespace BayWaReLusy\ElasticSearchPaginator\Test;

use BayWaReLusy\ElasticSearchPaginator\ElasticSearchAdapter;
use BayWaReLusy\ElasticSearchPaginator\ElasticSearchMapperInterface;
use BayWaReLusy\ElasticSearchPaginator\ElasticSearchQuery;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ElasticSearchAdapterTest extends TestCase
{
    protected ElasticSearchAdapter $instance;

    /** @var MockObject|ElasticSearchAdapter */
    protected MockObject $mapperMock;
    protected array $query;

    protected function setUp(): void
    {
        $this->mapperMock = $this->createMock(ElasticSearchMapperInterface::class);
        $this->query      = ['bool' => ['must' => []]];

        $this->instance = new ElasticSearchAdapter(
            $this->mapperMock,
            new ElasticSearchQuery($this->query)
        );
    }

    public function dataProvider_testGetItems(): array
    {
        return
            [
                [0, 20, 1, []],
                [10, 20, 1, []],
                [19, 20, 1, []],
                [20, 20, 2, []],
                [100, 20, 6, []],
            ];
    }

    /** @dataProvider dataProvider_testGetItems */
    public function testGetItems(int $offset, int $pageSize, int $page, array $sort)
    {
        $this->mapperMock
            ->expects($this->once())
            ->method('searchIndex')
            ->with(
                $this->query,
                $pageSize,
                $page,
                $sort
            )
            ->will($this->returnValue(['1', '2', '3']));

        $this->assertEquals(['1', '2', '3'], $this->instance->getItems($offset, $pageSize));
    }
}
