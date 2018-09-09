<?php declare(strict_types=1);

namespace Faker;

/**
 * User: Reindert Vetter
 * Date: 02/09/2018
 */
class Request extends \Illuminate\Http\Request
{
    /**
     * @param string $url
     * @param string $query
     * @return $this
     */
    public function setPath($url = 'pet', $query = ''): self
    {
        $this->server->set('SERVER_NAME', 'api.shop.nl');
        $this->server->set('REQUEST_URI', '/' . $url);
        $this->server->set('QUERY_STRING', $query);

        return $this;
    }

    /**
     * @param $data
     * @return Request
     */
    public function setContent($data): self
    {
        $this->content = $data;

        return $this;
    }
}