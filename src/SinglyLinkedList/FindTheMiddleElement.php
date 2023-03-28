<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

final class FindTheMiddleElement
{
    public function getTheMiddle(ListNode $head): ListNode
    {
        [$slow, $fast] = [$head, $head->next];
        while ($fast !== null && $fast->next !== null) {
            /** @var ListNode $slow */
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        if ($fast === null) {
            return $slow;
        }

        // @phpstan-ignore-next-line
        return $slow->next;
    }
}
