<?php

namespace vBulletin\Search;

class RequestHandler
{
    private $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function get($key)
    {
        return isset($this->request[$key]) ? $this->request[$key] : null;
    }
}
