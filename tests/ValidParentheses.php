<?php

use DataStructures\Stack\ArrayStack;

require __DIR__ . '../../vendor/autoload.php';

/**
 * leetCode题目第20题 验证括号
 * https://leetcode-cn.com/problems/valid-parentheses/comments/
 * @param string $s
 * @return bool
 */
function isValid(string $s)
{
    $stack = new ArrayStack(strlen($s));
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if ($char == '{' || $char == '(' || $char == '[') {
            $stack->push($char);
        } else {
            if ($stack->isEmpty()) {
                return false;
            }

            $topChar = $stack->pop();

            if ($char == ')' && $topChar != '(')
                return false;
            if ($char == '}' && $topChar != '{')
                return false;
            if ($char == ']' && $topChar != '[')
                return false;
        }
    }
    return $stack->isEmpty();
}

$str = '({})[]';

var_dump(isValid($str));
