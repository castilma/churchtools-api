<?php


namespace CTApi\Requests;


use CTApi\Exceptions\CTRequestException;
use CTApi\Models\WikiCategory;
use CTApi\Requests\Traits\Pagination;

class WikiCategoryRequestBuilder
{

    use Pagination;

    public function all(): array
    {
        $data = $this->collectDataFromPages('/api/wiki/categories', []);
        return WikiCategory::createModelsFromArray($data);
    }

    public function findOrFail(int $id): WikiCategory
    {
        $category = $this->find($id);
        if ($category != null) {
            return $category;
        } else {
            throw CTRequestException::ofModelNotFound("WikiCategory #" . $id);
        }
    }

    public function find(int $id): ?WikiCategory
    {
        $allCategories = WikiCategoryRequest::all();
        foreach ($allCategories as $category) {
            if ($category->getId() == $id) {
                return $category;
            }
        }
        return null;
    }
}