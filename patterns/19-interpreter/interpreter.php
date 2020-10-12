<?php

abstract class Expression
{
    public abstract function interpreter(array $vars);
}

class VarExpression extends Expression
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function interpreter(array $vars)
    {
        return $vars[$this->key] ?? '';
    }
}

abstract class SymbolExpression extends Expression
{
    protected $left;
    protected $right;

    public function __construct(Expression $left, Expression $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class SubExpression extends SymbolExpression
{
    public function __construct(Expression $left, Expression $right)
    {
        parent::__construct($left, $right);
    }

    public function interpreter(array $vars)
    {
        return $this->left->interpreter($vars) - $this->right->interpreter($vars);
    }
}

class AddExpression extends SymbolExpression
{
    public function __construct(Expression $left, Expression $right)
    {
        parent::__construct($left, $right);
    }

    public function interpreter(array $var)
    {
        return $this->left->interpreter($var) + $this->right->interpreter($var);
    }
}

class Calculator
{
    private $expression;

    public function __construct($expStr)
    {
        $stack = new SplStack();
        $chars = $this->strsplit($expStr);
        $charsLen = count($chars);

        for ($i = 0; $i < $charsLen; $i++) {
            switch ($chars[$i]) {
                case '+':
                    $left = $stack->pop();
                    $right = new VarExpression($chars[++$i]);
                    $stack->push(new AddExpression($left, $right));
                    break;
                case '-':
                    $left = $stack->pop();
                    $right = new VarExpression($chars[++$i]);
                    $stack->push(new SubExpression($left, $right));
                    break;
                default:
                    $stack->push(new VarExpression($chars[$i]));
                    break;
            }
        }

        $this->expression = $stack->pop();
    }

    private function strsplit($expStr)
    {
        $retv = [];
        foreach (str_split($expStr) as $v) {
            $v = trim($v);
            if (!$v) {
                continue;
            }
            $retv[] = $v;
        }
        return $retv;
    }

    public function run(array $vars)
    {
        return $this->expression->interpreter($vars);
    }
}

$expStr = 'a + b - c';
$calc = new Calculator($expStr);
echo '1 + 2 - 3 = '.$calc->run(['a' => 1, 'b' => 2, 'c' => 3]).PHP_EOL;
echo '4 + 5 - 6 = '.$calc->run(['a' => 4, 'b' => 5, 'c' => 6]).PHP_EOL;