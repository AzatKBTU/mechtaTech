<?php

namespace vBulletin\Search;

class SearchService
{
    private $requestHandler;
    private $database;

    public function __construct(RequestHandler $requestHandler, DatabaseInterface $database)
    {
        $this->requestHandler = $requestHandler;
        $this->database = $database;
    }

    public function executeSearch()
    {
        $query = $this->requestHandler->get('q');
        $searchId = $this->requestHandler->get('searchid');
        $do = $this->requestHandler->get('do');

        if ($searchId) {
            $do = 'showresults';
        } elseif ($query) {
            $do = 'process';
        } else {
            $do = 'form';
        }

        switch ($do) {
            case 'process':
                $result = $this->database->execute('SELECT * FROM vb_post WHERE text LIKE ?', array($query));
                $this->renderSearchResults($result);
                $this->logQuery($query);
                break;
            case 'showresults':
                $result = $this->database->execute('SELECT * FROM vb_searchresult WHERE searchid = ?', array($searchId));
                $this->renderSearchResults($result);
                break;
            case 'form':
                echo "<h2>Search in forum</h2><form><input name='q'></form>";
                break;
            default:
                echo "Invalid action";
        }
    }

    private function renderSearchResults($result)
    {
        foreach ($result as $row) {
            if ($row['forumid'] != 5) {
            }
        }
    }

    private function logQuery($query)
    {
        $file = fopen('/var/www/search_log.txt', 'a+');
        fwrite($file, $query . "\n");
    }
}
