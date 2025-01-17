<?php


namespace CTApi\Requests;


use CTApi\Models\Group;

class GroupRequestBuilder extends AbstractRequestBuilder
{

    protected function getApiEndpoint(): string
    {
        return '/api/groups';
    }

    protected function getModelClass(): string
    {
        return Group::class;
    }
}