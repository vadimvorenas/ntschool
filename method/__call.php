<?php

class A
{
    private $a = 'aaaaa';
    public function __call($name, $arguments)
    {
        if (strpos($name, 'findBy') !== false){

            $name = strtolower(str_replace('findBy', '', $name));
            $this->find($name, $arguments);
        }
    }

    private function find($column, $values)
    {
        $sql = sprintf("SELECT * FROM user WHERE %s='%s'", $column, $values[0]);
        if (strpos($column, 'orfail')){
            throw new Exception('Rocod not found');
        }
//        echo $sql;
    }

    public function __debugInfo()
    {
        return [
            'a' => $this->a
        ];
        // TODO: Implement __debugInfo() method.
    }
}

$a = new A();

$a->findByStatus('vadya@super.com');

var_dump($a);



