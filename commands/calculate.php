<?php
$expression = substr($text, strlen('/calc'));

$expression = preg_replace('/[^0-9+\-.*\/()%]/', '', $expression);

$result = eval("return $expression;");

if ($result !== false) {
    $msg = "-> result: $result";
} else {
    $msg = "-> error evaluating the expression.";
}
?>