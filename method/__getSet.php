<?php


class A
{
    private $userName;
    private $userText;

    public function __set($name, $value)
    {
        if (property_exists($this, $name)){
            $method = 'set' . ucfirst($name);
            if (method_exists($this, $method)){
                $this->$method($value);
            }

//           var_dump($this);
//           echo "<br>";
        }
        // TODO: Implement __set() method.
    }


    public function __get($name)
    {
        if (property_exists($this, $name)){
            $method = 'get' . ucfirst($name);
            if (method_exists($this, $method)){
                return $this->$method();
            }
        }
        // TODO: Implement __get() method.
    }


    public function __toString()
    {

        return sprintf("%s <br> %s", $this->userName, $this->userText);

        // TODO: Implement __toString() method.
    }


    private function getUserName()
    {
        return $this->userName;
    }

    private function getUserText()
    {
        return $this->userText;
    }

    private function setUserName($value)
    {
        $this->userName = $value;
    }

    private function setUserText($value)
    {
        $this->userText = $value;
    }
}

$a = new A();

$a->userName = 'Nam2e';
$a->userText = 'Tex2t';

echo $a->userName;