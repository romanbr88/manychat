<?php

namespace app\models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use app\models\Employee;
use app\models\EmployeeQuery;


/**
 * This class defines the structure of the 'employee' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class EmployeeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'app.models.Map.EmployeeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'manychat';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'employee';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\app\\models\\Employee';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'app.models.Employee';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'employee.id';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'employee.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'employee.last_name';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'employee.gender';

    /**
     * the column name for the birthday field
     */
    const COL_BIRTHDAY = 'employee.birthday';

    /**
     * the column name for the salary field
     */
    const COL_SALARY = 'employee.salary';

    /**
     * the column name for the department_id field
     */
    const COL_DEPARTMENT_ID = 'employee.department_id';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'employee.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'employee.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'FirstName', 'LastName', 'Gender', 'Birthday', 'Salary', 'DepartmentId', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'firstName', 'lastName', 'gender', 'birthday', 'salary', 'departmentId', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(EmployeeTableMap::COL_ID, EmployeeTableMap::COL_FIRST_NAME, EmployeeTableMap::COL_LAST_NAME, EmployeeTableMap::COL_GENDER, EmployeeTableMap::COL_BIRTHDAY, EmployeeTableMap::COL_SALARY, EmployeeTableMap::COL_DEPARTMENT_ID, EmployeeTableMap::COL_CREATED_AT, EmployeeTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'first_name', 'last_name', 'gender', 'birthday', 'salary', 'department_id', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'FirstName' => 1, 'LastName' => 2, 'Gender' => 3, 'Birthday' => 4, 'Salary' => 5, 'DepartmentId' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'firstName' => 1, 'lastName' => 2, 'gender' => 3, 'birthday' => 4, 'salary' => 5, 'departmentId' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(EmployeeTableMap::COL_ID => 0, EmployeeTableMap::COL_FIRST_NAME => 1, EmployeeTableMap::COL_LAST_NAME => 2, EmployeeTableMap::COL_GENDER => 3, EmployeeTableMap::COL_BIRTHDAY => 4, EmployeeTableMap::COL_SALARY => 5, EmployeeTableMap::COL_DEPARTMENT_ID => 6, EmployeeTableMap::COL_CREATED_AT => 7, EmployeeTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'first_name' => 1, 'last_name' => 2, 'gender' => 3, 'birthday' => 4, 'salary' => 5, 'department_id' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Employee.Id' => 'ID',
        'id' => 'ID',
        'employee.id' => 'ID',
        'EmployeeTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'FirstName' => 'FIRST_NAME',
        'Employee.FirstName' => 'FIRST_NAME',
        'firstName' => 'FIRST_NAME',
        'employee.firstName' => 'FIRST_NAME',
        'EmployeeTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
        'COL_FIRST_NAME' => 'FIRST_NAME',
        'first_name' => 'FIRST_NAME',
        'employee.first_name' => 'FIRST_NAME',
        'LastName' => 'LAST_NAME',
        'Employee.LastName' => 'LAST_NAME',
        'lastName' => 'LAST_NAME',
        'employee.lastName' => 'LAST_NAME',
        'EmployeeTableMap::COL_LAST_NAME' => 'LAST_NAME',
        'COL_LAST_NAME' => 'LAST_NAME',
        'last_name' => 'LAST_NAME',
        'employee.last_name' => 'LAST_NAME',
        'Gender' => 'GENDER',
        'Employee.Gender' => 'GENDER',
        'gender' => 'GENDER',
        'employee.gender' => 'GENDER',
        'EmployeeTableMap::COL_GENDER' => 'GENDER',
        'COL_GENDER' => 'GENDER',
        'Birthday' => 'BIRTHDAY',
        'Employee.Birthday' => 'BIRTHDAY',
        'birthday' => 'BIRTHDAY',
        'employee.birthday' => 'BIRTHDAY',
        'EmployeeTableMap::COL_BIRTHDAY' => 'BIRTHDAY',
        'COL_BIRTHDAY' => 'BIRTHDAY',
        'Salary' => 'SALARY',
        'Employee.Salary' => 'SALARY',
        'salary' => 'SALARY',
        'employee.salary' => 'SALARY',
        'EmployeeTableMap::COL_SALARY' => 'SALARY',
        'COL_SALARY' => 'SALARY',
        'DepartmentId' => 'DEPARTMENT_ID',
        'Employee.DepartmentId' => 'DEPARTMENT_ID',
        'departmentId' => 'DEPARTMENT_ID',
        'employee.departmentId' => 'DEPARTMENT_ID',
        'EmployeeTableMap::COL_DEPARTMENT_ID' => 'DEPARTMENT_ID',
        'COL_DEPARTMENT_ID' => 'DEPARTMENT_ID',
        'department_id' => 'DEPARTMENT_ID',
        'employee.department_id' => 'DEPARTMENT_ID',
        'CreatedAt' => 'CREATED_AT',
        'Employee.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'employee.createdAt' => 'CREATED_AT',
        'EmployeeTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'employee.created_at' => 'CREATED_AT',
        'UpdatedAt' => 'UPDATED_AT',
        'Employee.UpdatedAt' => 'UPDATED_AT',
        'updatedAt' => 'UPDATED_AT',
        'employee.updatedAt' => 'UPDATED_AT',
        'EmployeeTableMap::COL_UPDATED_AT' => 'UPDATED_AT',
        'COL_UPDATED_AT' => 'UPDATED_AT',
        'updated_at' => 'UPDATED_AT',
        'employee.updated_at' => 'UPDATED_AT',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('employee');
        $this->setPhpName('Employee');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\app\\models\\Employee');
        $this->setPackage('app.models');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('employee_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 255, null);
        $this->addColumn('gender', 'Gender', 'CHAR', true, null, null);
        $this->addColumn('birthday', 'Birthday', 'DATE', false, null, null);
        $this->addColumn('salary', 'Salary', 'FLOAT', false, null, null);
        $this->addForeignKey('department_id', 'DepartmentId', 'INTEGER', 'department', 'id', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations()
    {
        $this->addRelation('Department', '\\app\\models\\Department', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':department_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('ProjectEmployee', '\\app\\models\\ProjectEmployee', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':employee_id',
    1 => ':id',
  ),
), null, null, 'ProjectEmployees', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => ['create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false'],
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? EmployeeTableMap::CLASS_DEFAULT : EmployeeTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Employee object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EmployeeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EmployeeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EmployeeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EmployeeTableMap::OM_CLASS;
            /** @var Employee $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EmployeeTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = EmployeeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EmployeeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Employee $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EmployeeTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(EmployeeTableMap::COL_ID);
            $criteria->addSelectColumn(EmployeeTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(EmployeeTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(EmployeeTableMap::COL_GENDER);
            $criteria->addSelectColumn(EmployeeTableMap::COL_BIRTHDAY);
            $criteria->addSelectColumn(EmployeeTableMap::COL_SALARY);
            $criteria->addSelectColumn(EmployeeTableMap::COL_DEPARTMENT_ID);
            $criteria->addSelectColumn(EmployeeTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(EmployeeTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.birthday');
            $criteria->addSelectColumn($alias . '.salary');
            $criteria->addSelectColumn($alias . '.department_id');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(EmployeeTableMap::COL_ID);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_FIRST_NAME);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_LAST_NAME);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_GENDER);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_BIRTHDAY);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_SALARY);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_DEPARTMENT_ID);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_CREATED_AT);
            $criteria->removeSelectColumn(EmployeeTableMap::COL_UPDATED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.first_name');
            $criteria->removeSelectColumn($alias . '.last_name');
            $criteria->removeSelectColumn($alias . '.gender');
            $criteria->removeSelectColumn($alias . '.birthday');
            $criteria->removeSelectColumn($alias . '.salary');
            $criteria->removeSelectColumn($alias . '.department_id');
            $criteria->removeSelectColumn($alias . '.created_at');
            $criteria->removeSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(EmployeeTableMap::DATABASE_NAME)->getTable(EmployeeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Employee or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Employee object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \app\models\Employee) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EmployeeTableMap::DATABASE_NAME);
            $criteria->add(EmployeeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = EmployeeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EmployeeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EmployeeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the employee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EmployeeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Employee or Criteria object.
     *
     * @param mixed               $criteria Criteria or Employee object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Employee object
        }

        if ($criteria->containsKey(EmployeeTableMap::COL_ID) && $criteria->keyContainsValue(EmployeeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EmployeeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = EmployeeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EmployeeTableMap
