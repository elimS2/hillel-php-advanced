<?php

require_once ("EmployeeInterface.php");
require_once ("ManagerInterface.php");
require_once ("Worker.php");
require_once ("Manager.php");

$managers = [
    'manager1' => new Manager('Lobanov David',1000,'2010-05-15'),
    'manager2' => new Manager('Serova Klavdia',1000,'2017-06-30')
];

$worker1 = new Worker('Pasternak Valentin',500,'2011-05-15');
$worker2 = new Worker('Karchagin Pavel',500,'2012-05-15');
$worker3 = new Worker('Pelevin Sergey',500,'2013-05-15');
$worker4 = new Worker('Panarina Violetta',500,'2017-07-30');
$worker5 = new Worker('Shishova Aleksandra',500,'2018-07-30');
$worker6 = new Worker('Starodubova Snezana',500,'2019-07-30');

$managers['manager1']->addEmployee($worker1);
$managers['manager1']->addEmployee($worker2);
$managers['manager1']->addEmployee($worker3);
$managers['manager2']->addEmployee($worker4);
$managers['manager2']->addEmployee($worker5);
$managers['manager2']->addEmployee($worker6);

$printData = [];
foreach($managers as $manager) {
    $printData[] = [
        "name"=>$manager->getName(),
        "salary"=>$manager->getSalary(),
        "employeesCount"=>$manager->getCountEmployees()
    ];
}

switch(strtolower($_GET["type"])) {
    case NULL:
    case "html":
        header('Content-Type: text/html; charset=UTF-8');
        echo generateHtml($printData);
        break;
    case "json":
        header('Content-Type: application/json');
        echo json_encode($printData);
        break;
    case "xml":
        header('Content-type: text/xml');
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        arrayToXml($printData,"manager",$xmlData);
        print $xmlData->asXML();
        break;
    default: echo "Unknown Type!";
}


function arrayToXml( $data, $keyName, &$Xmldata ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = $keyName.$key; //dealing with <0/>..<n/> issues
            }
            $subnode = $Xmldata->addChild($key);
            arrayToXml($value, $keyName, $subnode);
        } else {
            $Xmldata->addChild("$key",htmlspecialchars("$value"));
        }
    }
}

function generateHtml($printData) {
    $html = "
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }
                                th, td {
                                  padding: 8px;
                                  text-align: left;
                                  border-bottom: 1px solid #ddd;
                                }                        
                                tr:hover {background-color:#f5f5f5;}
                            </style>
                        </head>
                        <body>
                            <table><thead><tr><td>Name</td><td>Salary</td><td>Employees Count</td></tr></thead>
        ";
    foreach ($printData as $row) {
        $html .= "<tr>";
        foreach ($row as $cell) {
            $html .= "<td>" . $cell . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</tbody></table</body></html>";
    return $html;
}





