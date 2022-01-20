<?php


namespace App\Service;


use App\Entity\Category;

class CategoryManager extends AbstractManager
{

    /**
     * @param Category $category
     */
    public function saveCategory(Category $category): void
    {
        $this->saveEntity($category);
    }
}