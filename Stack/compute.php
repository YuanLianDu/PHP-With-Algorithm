<?php

namespace Stack;

require_once '../vendor/autoload.php';

$number  = 3;
$number1 = 1;
$operator = '-';
$expression = '9+(3-1)*3+10/2';
$expression = str_replace(' ','',$expression);
$arrExpression = preg_split('/([\+\-\*\/\(\)])/', $expression, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
$suffixExpression = changeToSuffix($arrExpression);
$result = compute($suffixExpression);
var_dump($result);die();


/**
 * 遍历后缀表达式
 * 遇到数字，压入数字栈
 * 遇到运算符，pop出 两个数字 运算 将（number2  operator number1）结果push数字栈
 * @param array $expression
 *
 * @return void
 * @date 2018/11/05
 * @author yuanliandu <yuanliandu@qq.com>
 */
function compute(array $expression) {
    $numberStack = new ArrayStack(count($expression));
    foreach($expression as $value) {
        if(is_numeric($value)) {
            $numberStack->push($value);
        }else {
            $number1 = $numberStack->pop();
            $number2 = $numberStack->pop();
            switch($value) {
                case '+' : $numberStack->push($number2 + $number1);break;
                case '-' : $numberStack->push($number2 - $number1);break;
                case '*' : $numberStack->push($number2 * $number1);break;
                case '/' : 
                    if($number2 === 0) {
                        printf('The divisor cannot be zero');
                        return flase;
                    }
                    $numberStack->push($number2 / $number1);break;
            }
        }
    }
    return $numberStack->getTop();
}
/**
 * 遇到符号将符号塞入栈
 * 如果遇到“右括号”，将符号栈pop，直到pop出左括号
 * 如果top指针指向的运算符优先级 > 要push的符号，则将栈内<top优先级的符号，全部pop；再push符号
 * @param array $expression
 *
 * @return void
 * @date 2018/11/05
 * @author yuanliandu <yuanliandu@qq.com>
 */
function changeToSuffix(array $expression)
{
    $strStack = new ArrayStack(count($expression));
    $suffixExpression = [];
    foreach ($expression as $key => $value) {
        // 如果是数字，push到后缀表达式栈
        if (is_numeric($value)) {
            $suffixExpression[] = $value;
            continue;
        }

        //如果表达式栈为空，push
        if ($strStack->isEmpty()) {
            $strStack->push($value);
            continue;
        }
        switch ($value) {
            case '+':
                if ($strStack->getTop()== '*' || $strStack->getTop()== '/') {
                    do {
                        $suffixExpression[] = $strStack->pop();
                    } while (!$strStack->isEmpty() && ($strStack->getTop()== '-' || $strStack->getTop()== '+'));
                }
                $strStack->push($value);
                break;
            case '-':
                if ($strStack->getTop()== '*' || $strStack->getTop()== '/') {
                    do {
                        $suffixExpression[] = $strStack->pop();
                    } while (!$strStack->isEmpty() && ($strStack->getTop()== '-' || $strStack->getTop()== '+'));
                }
                $strStack->push($value);
                break;
            case '*':
                $strStack->push($value);
                break;
            case '/':
                $strStack->push($value);
                break;
            case '(':
                $strStack->push($value);
                break;
            case ')':
                do {
                    $suffixExpression[] = $strStack->pop();
                } while ($strStack->getTop() != '(');
                $strStack->pop();
                break;
            default:
                print('operator is error');
                break;
        }
    }
    while (!$strStack->isEmpty()) {
        $suffixExpression[] = $strStack->pop();
    }
    return $suffixExpression;
}
