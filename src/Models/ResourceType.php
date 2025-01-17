<?php


namespace CTApi\Models;


use CTApi\Models\Traits\FillWithData;

class ResourceType
{
    use FillWithData;

    protected ?string $id = null;
    protected ?string $name = null;
    protected ?string $nameTranslated = null;
    protected ?string $sortKey = null;
    protected ?string $campusId = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return ResourceType
     */
    public function setId(?string $id): ResourceType
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ResourceType
     */
    public function setName(?string $name): ResourceType
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameTranslated(): ?string
    {
        return $this->nameTranslated;
    }

    /**
     * @param string|null $nameTranslated
     * @return ResourceType
     */
    public function setNameTranslated(?string $nameTranslated): ResourceType
    {
        $this->nameTranslated = $nameTranslated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSortKey(): ?string
    {
        return $this->sortKey;
    }

    /**
     * @param string|null $sortKey
     * @return ResourceType
     */
    public function setSortKey(?string $sortKey): ResourceType
    {
        $this->sortKey = $sortKey;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCampusId(): ?string
    {
        return $this->campusId;
    }

    /**
     * @param string|null $campusId
     * @return ResourceType
     */
    public function setCampusId(?string $campusId): ResourceType
    {
        $this->campusId = $campusId;
        return $this;
    }
}