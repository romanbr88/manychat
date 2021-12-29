<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'manychat' => 
  array (
    0 => '\\app\\models\\Map\\DepartmentTableMap',
    1 => '\\app\\models\\Map\\EmployeeTableMap',
    2 => '\\app\\models\\Map\\ProjectEmployeeTableMap',
    3 => '\\app\\models\\Map\\ProjectTableMap',
  ),
));
