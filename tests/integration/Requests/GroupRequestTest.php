<?php


namespace Tests\Integration\Requests;


use CTApi\Models\Group;
use CTApi\Requests\GroupRequest;
use CTApi\Requests\GroupRequestBuilder;
use Tests\Integration\TestCaseAuthenticated;
use Tests\Integration\TestData;

class GroupRequestTest extends TestCaseAuthenticated
{

    private string $groupId = "";
    private string $groupName = "";

    protected function setUp(): void
    {
        if(!TestData::getValue("GROUP_SHOULD_TEST") == "YES"){
            $this->markTestSkipped("Test suite is disabled in testdata.ini");
        }else{
            $this->groupId = TestData::getValue("GROUP_ID") ?? "";
            $this->groupName = TestData::getValue("GROUP_NAME") ?? "";
        }
    }

    public function testGetAllGroups()
    {
        $allGroups = GroupRequest::all();

        $this->assertIsArray($allGroups);
        $foundMyGroup = false;
        foreach($allGroups as $group){
            $this->assertInstanceOf(Group::class, $group);
            if($group->getId() == $this->groupId){
                $foundMyGroup = true;
            }
        }
        $this->assertTrue($foundMyGroup);
    }

    public function testGetGroup()
    {
        $myGroup = GroupRequest::find( (int) $this->groupId);
        $this->assertNotNull($myGroup);
        $this->assertInstanceOf(Group::class, $myGroup);
        $this->assertEquals($myGroup->getName(), $this->groupName);
    }

}