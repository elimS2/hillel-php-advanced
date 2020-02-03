<?php

class Worker implements EmployeeInterface
{
    protected $position = 'Worker';
    protected $name;
    protected $salary;
    protected $startDate;

    public function __construct(string $name, int $salary, string $startDate)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->startDate = new DateTime($startDate);
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
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
        $currentYearSalary = $this->salary * (1 + $yearsWithSalaryBonus*0.05);
        return floor($currentYearSalary);
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }
}
