<?php

namespace App\Service;

use App\Entity\Product;

class ProductManager extends AbstractManager
{

    /**
     * @param Product $category
     */
    public function saveProduct(Product $category): void
    {
        $this->saveEntity($category);
    }
}