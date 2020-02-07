<?php

namespace Mauqah\Utils;

use Illuminate\Support\Collection;
use League\Fractal\Pagination\PaginatorInterface;

class Paginator implements PaginatorInterface
{
    private $items;
    private $total;
    private $perPage;
    private $currentPage;

    public function __construct(Collection $items, $total, $perPage, $currentPage = null, array $options = [])
    {
        $this->items = $items;
        $this->total = $total;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getLastPage()
    {
        // TODO: Implement getLastPage() method.
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getCount()
    {
        return $this->items->count();
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getUrl($page)
    {
        // TODO: Implement getUrl() method.
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
