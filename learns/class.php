<?php
class Person
{
    var $name = "John Doe";
    var $birthdate = "30/12/1990";
    var $tel = "12345678";

    function sayHello()
    {
        echo "Hello, my name is " . $this->name . "<br>";
    }

    function getAge()
    {
        $dateParts = explode('/', $this->birthdate);
        $day = abs($dateParts[0] - date('d'));
        $month = abs($dateParts[1] - date('m'));
        $year = abs($dateParts[2] - date('Y'));
        return array($year, $month, $day);
    }

    function getBirthday()
    {
        return $this->birthdate;
    }

    function getTel()
    {
        return $this->tel;
    }
}

$aMan = new Person();
$aMan->sayHello();
printf("Age: %d years %d months %d days <br>", $aMan->getAge()[0], $aMan->getAge()[1], $aMan->getAge()[2]);
echo "Birthday: " . $aMan->getBirthday() . "<br>";
echo "Telephone: " . $aMan->getTel() . "<br>";
