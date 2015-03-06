<?php

/*
 * This file is part of Laravel Throttle.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Throttle;

/**
 * This is the data class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class Data
{
    /**
     * The ip.
     *
     * @var string
     */
    protected $ip;

    /**
     * The route.
     *
     * @var string
     */
    protected $route;

    /**
     * The route key.
     *
     * @var string
     */
    protected $routeKey;

    /**
     * The request limit.
     *
     * @var int
     */
    protected $limit;

    /**
     * The expiration time.
     *
     * @var int
     */
    protected $time;

    /**
     * The unique key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new instance.
     *
     * @param string $ip
     * @param string $route
     * @param int    $limit
     * @param int    $time
     *
     * @return void
     */
    public function __construct($ip, $route, $limit = 10, $time = 60)
    {
        $this->ip = $ip;
        $this->route = $route;
        $this->limit = $limit;
        $this->time = $time;
    }

    /**
     * Get the ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the route.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the route key.
     *
     * @return string
     */
    public function getRouteKey()
    {
        if (!$this->routeKey) {
            $this->routeKey = md5($this->route);
        }

        return $this->routeKey;
    }

    /**
     * Get the request limit.
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Get the expiration time.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the unique key.
     *
     * This key is used to identify the data between requests.
     *
     * @var string
     */
    public function getKey()
    {
        if (!$this->key) {
            $this->key = md5($this->ip.$this->route.$this->limit.$this->time);
        }

        return $this->key;
    }
}
