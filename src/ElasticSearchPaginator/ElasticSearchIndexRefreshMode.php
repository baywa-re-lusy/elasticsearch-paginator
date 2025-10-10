<?php

namespace BayWaReLusy\ElasticSearchPaginator;

enum ElasticSearchIndexRefreshMode
{
    case true;
    case false;
    case waitFor;

    public function toElasticValue(): bool|string
    {
        return match ($this) {
            self::true    => true,
            self::false   => false,
            self::waitFor => 'wait_for',
        };
    }
}
