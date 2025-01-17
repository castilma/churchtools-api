<?php


namespace Tests\Integration\Requests;


use CTApi\Requests\GroupRequest;
use Tests\Integration\TestCaseAuthenticated;
use Tests\Integration\TestData;

class GroupHierarchieRequestTest extends TestCaseAuthenticated
{

    private $groupId = "";
    private $groupName = "";
    private $groupParentId = "";
    private $groupParentName = "";
    private $groupChildId = "";
    private $groupChildName = "";

    protected function setUp(): void
    {
        if (!TestData::getValue("GROUP_HIERARCHIE_SHOULD_TEST") == "YES") {
            $this->markTestSkipped("Test suite is disabled in testdata.ini");
        } else {
            $this->groupId = TestData::getValue("GROUP_HIERARCHIE_ID");
            $this->groupName = TestData::getValue("GROUP_HIERARCHIE_NAME");
            $this->groupParentId = TestData::getValue("GROUP_HIERARCHIE_PARENT_ID");
            $this->groupParentName = TestData::getValue("GROUP_HIERARCHIE_PARENT_NAME");
            $this->groupChildId = TestData::getValue("GROUP_HIERARCHIE_CHILD_ID");
            $this->groupChildName = TestData::getValue("GROUP_HIERARCHIE_CHILD_NAME");
        }
    }

    public function testRequestGroup()
    {
        $group = GroupRequest::findOrFail($this->groupId);
        $this->assertEquals($this->groupName, $group->getName());
    }

    public function testRequestGroupParents()
    {
        $group = GroupRequest::findOrFail($this->groupId);

        $parents = $group->requestGroupParents()?->get();
        $this->assertNotNull($parents);

        $foundParent = null;
        foreach ($parents as $parent) {
            if ($parent->getId() == $this->groupParentId) {
                $foundParent = $parent;
            }
        }

        $this->assertNotNull($foundParent);
        $this->assertEquals($this->groupParentName, $foundParent->getName());
    }

    public function testRequestGroupChildren()
    {
        $group = GroupRequest::findOrFail($this->groupId);

        $children = $group->requestGroupChildren()?->get();
        $this->assertNotNull($children);

        $foundChild = null;
        foreach ($children as $child) {
            if ($child->getId() == $this->groupChildId) {
                $foundChild = $child;
            }
        }

        $this->assertNotNull($foundChild);
        $this->assertEquals($this->groupChildName, $foundChild->getName());
    }

}