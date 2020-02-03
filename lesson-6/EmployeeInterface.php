<?php

interface EmployeeInterface
{
    public function getName(): string;

    public function getSalary(): int;

    public function getPosition(): string;

    public function getStartDate(): DateTimeInterface;

}