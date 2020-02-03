<?php

interface ManagerInterface
{
    public function getEmployees(): array;

    public function addEmployee(EmployeeInterface $employee): void;

    public function getCountEmployees(): int;
}