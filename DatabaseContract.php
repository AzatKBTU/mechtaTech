<?php

namespace vBulletin\Search;

interface DatabaseContract
{
    public function execute($query, $params);
}