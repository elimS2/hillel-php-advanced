<?php

class Worker {
    private $name;
    private $age;
    private $salary;
    
    public function setName(string $name) {
        $this->name = $name;
    }
    
    public function setAge(int $age) {
        if($this->checkAge($age)) {
            $this->age = $age;
            return true;
        } else return false;
    }
    
    public function setSalary(int $salary) {
        $this->salary = $salary;
    }    
    
    public function getName(): ?string {
        return $this->name;
    }
    
    public function getAge(): ?int {
        return $this->age;
    }
    
    public function getSalary(): ?int {
        return $this->salary;
    }   

    private function checkAge(int $age) {        
        return (($age > 0)and($age < 101)) ? true : false;        
    }

}

$worker1 = new Worker();
$worker1->setName('Ivan');
$worker1->setAge(25);
$worker1->setSalary(1000);

$worker2 = new Worker();
$worker2->setName('Vasya');
$worker2->setAge(26);
$worker2->setSalary(2000);

echo "The sum of the salaries of {$worker1->getName()} and {$worker2->getName()}: ". ($worker1->getSalary() + $worker2->getSalary()) . "." . newline();
echo "The sum of the ages of {$worker1->getName()} and {$worker2->getName()}: " . ($worker1->getAge() + $worker2->getAge()) . "." . newline();
echo_name_age($worker1);
echo_name_age($worker2);

function echo_name_age($worker) {
    echo "{$worker->getName()} is {$worker->getAge()} years old." . newline();
}

function newline() {
    return(PHP_SAPI === 'cli') ? PHP_EOL : "<br />";
}


