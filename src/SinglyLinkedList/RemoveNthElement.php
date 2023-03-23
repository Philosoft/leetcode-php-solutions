<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

final class RemoveNthElement
{
    public function remove(?ListNode $head, int $n): ?ListNode
    {
        if ($head === null) {
            return null;
        }

        $dummy = new ListNode(666, $head);
        [$slow, $fast] = [$dummy, $head];
        while ($n > 0 && $fast !== null) {
            $fast = $fast->next;
            $n--;
        }

        // not enough elements in a list
        if ($n > 0) {
            return $head;
        }

        // $slow is exactly $n - 1 elements behind $fast
        // now just move them simultaneously, until we reach the end of list with $fast
        // then $slow will be 1 element behind target node
        while ($fast !== null) {
            $slow = $slow?->next;
            $fast = $fast->next;
        }

        if ($slow === null) {
            return $dummy->next;
        }

        $slow->next = $slow->next?->next;

        return $dummy->next;
    }
}
