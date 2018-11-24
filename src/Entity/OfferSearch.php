<?php

namespace App\Entity;

class OfferSearch
{

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return OfferSearch
     */
    public function setMaxPrice(int $maxPrice): OfferSearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

}