<?php

// Class name Parent is reserved
class Parentt {
    public function setValues($values){
        foreach($values as $key => $value){
            $this->$key = $value;
        }
    }
}

class Child extends Parentt{
    protected $id;
    protected $name;
    protected $foreignKey;
}

$data = array(
    "id" => 1,
    "name" => "foo",
    "foreignKey" => 1
);

$example = new Child();

$example->setValues($data);

print_r($example);