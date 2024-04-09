<?php

namespace BayWaReLusy\ElasticSearchPaginator;

enum ElasticSearchIndexRefreshMode
{
    case true;
    case false;
    case waitFor;
}
