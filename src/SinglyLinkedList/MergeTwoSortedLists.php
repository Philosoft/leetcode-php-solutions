<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

final class MergeTwoSortedLists
{
    public function merge(?ListNode $head1, ?ListNode $head2): ?ListNode
    {
        if ($head1 === null && $head2 === null) {
            return null;
        }

        if ($head1 === null || $head2 === null) {
            return $head1 === null ? $head2 : $head1;
        }

        $dummy = new ListNode(666);
        $head = $dummy;
        while ($head1 !== null && $head2 !== null) {
            if ($head1->val <= $head2->val) {
                $head->next = $head1;
                $head1 = $head1->next;
            } else {
                $head->next = $head2;
                $head2 = $head2->next;
            }

            $head = $head->next;
        }

        if ($head1 !== null) {
            $head->next = $head1;
        }

        if ($head2 !== null) {
            $head->next = $head2;
        }

        return $dummy->next;
    }
}
