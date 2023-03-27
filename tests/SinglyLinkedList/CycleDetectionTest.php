<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\CycleDetection;
use PHPUnit\Framework\TestCase;

class CycleDetectionTest extends TestCase
{
    private CycleDetection $cycleDetection;

    public function setUp(): void
    {
        $this->cycleDetection = new CycleDetection();
    }

    public function testNoCycle(): void
    {
        self::assertFalse($this->cycleDetection->hasCycle(ListNode::fromArray([1, 2, 3])));
    }

    public function testNoList(): void
    {
        self::assertFalse($this->cycleDetection->hasCycle(null));
    }

    public function testRing(): void
    {
        $head = ListNode::fromArray([1, 2, 3]);
        // @phpstan-ignore-next-line
        $head->next->next->next = $head;

        self::assertTrue($this->cycleDetection->hasCycle($head));
    }

    public function testGenericCycle(): void
    {
        $head = ListNode::fromArray([3, 2, 0, -4]);
        // @phpstan-ignore-next-line
        $head->next->next->next = $head->next;

        self::assertTrue($this->cycleDetection->hasCycle($head));
    }

    public function testSingleElementWithoutCycle(): void
    {
        self::assertFalse($this->cycleDetection->hasCycle(new ListNode(1)));
    }

    public function testSingleElementWithCycle(): void
    {
        $head = new ListNode(1);
        $head->next = $head;

        self::assertTrue($this->cycleDetection->hasCycle($head));
    }
}
