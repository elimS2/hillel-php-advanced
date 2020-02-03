<?php

class Manager extends Worker implements ManagerInterface
{
    protected $position = 'Manager';
    protected $employees = [];    

    public function getCountEmployees(): int
    {
        return count($this->employees);
    }

    public function addEmployee(EmployeeInterface $employee): void        
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function getSalary(): int
    {
        $nowDatetime = new DateTime();
        $interval = $this->startDate->diff($nowDatetime);
        $seniorityYears = $interval->format("%y");
        if($seniorityYears >= 2) {
            $yearsWithSalaryBonus = $seniorityYears - 1;
        } else {
            $yearsWithSalaryBonus = 0;        
        }        
        $currentSalaryWithEmployeeBonus = $this->salary * (1 + $yearsWithSalaryBonus*0.05 + $this->getCountEmployees()*0.02);
        return floor($currentSalaryWithEmployeeBonus);
    }
}
