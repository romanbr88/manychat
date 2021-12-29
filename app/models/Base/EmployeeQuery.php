<?php

namespace app\models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use app\models\Employee as ChildEmployee;
use app\models\EmployeeQuery as ChildEmployeeQuery;
use app\models\Map\EmployeeTableMap;

/**
 * Base class that represents a query for the 'employee' table.
 *
 *
 *
 * @method     ChildEmployeeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEmployeeQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildEmployeeQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildEmployeeQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildEmployeeQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     ChildEmployeeQuery orderBySalary($order = Criteria::ASC) Order by the salary column
 * @method     ChildEmployeeQuery orderByDepartmentId($order = Criteria::ASC) Order by the department_id column
 * @method     ChildEmployeeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildEmployeeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildEmployeeQuery groupById() Group by the id column
 * @method     ChildEmployeeQuery groupByFirstName() Group by the first_name column
 * @method     ChildEmployeeQuery groupByLastName() Group by the last_name column
 * @method     ChildEmployeeQuery groupByGender() Group by the gender column
 * @method     ChildEmployeeQuery groupByBirthday() Group by the birthday column
 * @method     ChildEmployeeQuery groupBySalary() Group by the salary column
 * @method     ChildEmployeeQuery groupByDepartmentId() Group by the department_id column
 * @method     ChildEmployeeQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildEmployeeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildEmployeeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployeeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEmployeeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEmployeeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEmployeeQuery leftJoinDepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Department relation
 * @method     ChildEmployeeQuery rightJoinDepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Department relation
 * @method     ChildEmployeeQuery innerJoinDepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Department relation
 *
 * @method     ChildEmployeeQuery joinWithDepartment($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Department relation
 *
 * @method     ChildEmployeeQuery leftJoinWithDepartment() Adds a LEFT JOIN clause and with to the query using the Department relation
 * @method     ChildEmployeeQuery rightJoinWithDepartment() Adds a RIGHT JOIN clause and with to the query using the Department relation
 * @method     ChildEmployeeQuery innerJoinWithDepartment() Adds a INNER JOIN clause and with to the query using the Department relation
 *
 * @method     ChildEmployeeQuery leftJoinProjectEmployee($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectEmployee relation
 * @method     ChildEmployeeQuery rightJoinProjectEmployee($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectEmployee relation
 * @method     ChildEmployeeQuery innerJoinProjectEmployee($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectEmployee relation
 *
 * @method     ChildEmployeeQuery joinWithProjectEmployee($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectEmployee relation
 *
 * @method     ChildEmployeeQuery leftJoinWithProjectEmployee() Adds a LEFT JOIN clause and with to the query using the ProjectEmployee relation
 * @method     ChildEmployeeQuery rightJoinWithProjectEmployee() Adds a RIGHT JOIN clause and with to the query using the ProjectEmployee relation
 * @method     ChildEmployeeQuery innerJoinWithProjectEmployee() Adds a INNER JOIN clause and with to the query using the ProjectEmployee relation
 *
 * @method     \app\models\DepartmentQuery|\app\models\ProjectEmployeeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEmployee|null findOne(ConnectionInterface $con = null) Return the first ChildEmployee matching the query
 * @method     ChildEmployee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEmployee matching the query, or a new ChildEmployee object populated from the query conditions when no match is found
 *
 * @method     ChildEmployee|null findOneById(int $id) Return the first ChildEmployee filtered by the id column
 * @method     ChildEmployee|null findOneByFirstName(string $first_name) Return the first ChildEmployee filtered by the first_name column
 * @method     ChildEmployee|null findOneByLastName(string $last_name) Return the first ChildEmployee filtered by the last_name column
 * @method     ChildEmployee|null findOneByGender(string $gender) Return the first ChildEmployee filtered by the gender column
 * @method     ChildEmployee|null findOneByBirthday(string $birthday) Return the first ChildEmployee filtered by the birthday column
 * @method     ChildEmployee|null findOneBySalary(double $salary) Return the first ChildEmployee filtered by the salary column
 * @method     ChildEmployee|null findOneByDepartmentId(int $department_id) Return the first ChildEmployee filtered by the department_id column
 * @method     ChildEmployee|null findOneByCreatedAt(string $created_at) Return the first ChildEmployee filtered by the created_at column
 * @method     ChildEmployee|null findOneByUpdatedAt(string $updated_at) Return the first ChildEmployee filtered by the updated_at column *

 * @method     ChildEmployee requirePk($key, ConnectionInterface $con = null) Return the ChildEmployee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOne(ConnectionInterface $con = null) Return the first ChildEmployee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployee requireOneById(int $id) Return the first ChildEmployee filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByFirstName(string $first_name) Return the first ChildEmployee filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByLastName(string $last_name) Return the first ChildEmployee filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByGender(string $gender) Return the first ChildEmployee filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByBirthday(string $birthday) Return the first ChildEmployee filtered by the birthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneBySalary(double $salary) Return the first ChildEmployee filtered by the salary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByDepartmentId(int $department_id) Return the first ChildEmployee filtered by the department_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByCreatedAt(string $created_at) Return the first ChildEmployee filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByUpdatedAt(string $updated_at) Return the first ChildEmployee filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEmployee objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> find(ConnectionInterface $con = null) Return ChildEmployee objects based on current ModelCriteria
 * @method     ChildEmployee[]|ObjectCollection findById(int $id) Return ChildEmployee objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findById(int $id) Return ChildEmployee objects filtered by the id column
 * @method     ChildEmployee[]|ObjectCollection findByFirstName(string $first_name) Return ChildEmployee objects filtered by the first_name column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByFirstName(string $first_name) Return ChildEmployee objects filtered by the first_name column
 * @method     ChildEmployee[]|ObjectCollection findByLastName(string $last_name) Return ChildEmployee objects filtered by the last_name column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByLastName(string $last_name) Return ChildEmployee objects filtered by the last_name column
 * @method     ChildEmployee[]|ObjectCollection findByGender(string $gender) Return ChildEmployee objects filtered by the gender column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByGender(string $gender) Return ChildEmployee objects filtered by the gender column
 * @method     ChildEmployee[]|ObjectCollection findByBirthday(string $birthday) Return ChildEmployee objects filtered by the birthday column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByBirthday(string $birthday) Return ChildEmployee objects filtered by the birthday column
 * @method     ChildEmployee[]|ObjectCollection findBySalary(double $salary) Return ChildEmployee objects filtered by the salary column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findBySalary(double $salary) Return ChildEmployee objects filtered by the salary column
 * @method     ChildEmployee[]|ObjectCollection findByDepartmentId(int $department_id) Return ChildEmployee objects filtered by the department_id column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByDepartmentId(int $department_id) Return ChildEmployee objects filtered by the department_id column
 * @method     ChildEmployee[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildEmployee objects filtered by the created_at column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByCreatedAt(string $created_at) Return ChildEmployee objects filtered by the created_at column
 * @method     ChildEmployee[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildEmployee objects filtered by the updated_at column
 * @psalm-method ObjectCollection&\Traversable<ChildEmployee> findByUpdatedAt(string $updated_at) Return ChildEmployee objects filtered by the updated_at column
 * @method     ChildEmployee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildEmployee> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EmployeeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \app\models\Base\EmployeeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'manychat', $modelName = '\\app\\models\\Employee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEmployeeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEmployeeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEmployeeQuery) {
            return $criteria;
        }
        $query = new ChildEmployeeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEmployee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EmployeeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EmployeeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEmployee A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, first_name, last_name, gender, birthday, salary, department_id, created_at, updated_at FROM employee WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEmployee $obj */
            $obj = new ChildEmployee();
            $obj->hydrate($row);
            EmployeeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEmployee|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmployeeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmployeeTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * $query->filterByFirstName(['foo', 'bar']); // WHERE first_name IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * $query->filterByLastName(['foo', 'bar']); // WHERE last_name IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * Example usage:
     * <code>
     * $query->filterByGender('fooValue');   // WHERE gender = 'fooValue'
     * $query->filterByGender('%fooValue%', Criteria::LIKE); // WHERE gender LIKE '%fooValue%'
     * $query->filterByGender(['foo', 'bar']); // WHERE gender IN ('foo', 'bar')
     * </code>
     *
     * @param     string|string[] $gender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the birthday column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthday('2011-03-14'); // WHERE birthday = '2011-03-14'
     * $query->filterByBirthday('now'); // WHERE birthday = '2011-03-14'
     * $query->filterByBirthday(array('max' => 'yesterday')); // WHERE birthday > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthday The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByBirthday($birthday = null, $comparison = null)
    {
        if (is_array($birthday)) {
            $useMinMax = false;
            if (isset($birthday['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_BIRTHDAY, $birthday['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthday['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_BIRTHDAY, $birthday['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_BIRTHDAY, $birthday, $comparison);
    }

    /**
     * Filter the query on the salary column
     *
     * Example usage:
     * <code>
     * $query->filterBySalary(1234); // WHERE salary = 1234
     * $query->filterBySalary(array(12, 34)); // WHERE salary IN (12, 34)
     * $query->filterBySalary(array('min' => 12)); // WHERE salary > 12
     * </code>
     *
     * @param     mixed $salary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterBySalary($salary = null, $comparison = null)
    {
        if (is_array($salary)) {
            $useMinMax = false;
            if (isset($salary['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_SALARY, $salary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salary['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_SALARY, $salary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_SALARY, $salary, $comparison);
    }

    /**
     * Filter the query on the department_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentId(1234); // WHERE department_id = 1234
     * $query->filterByDepartmentId(array(12, 34)); // WHERE department_id IN (12, 34)
     * $query->filterByDepartmentId(array('min' => 12)); // WHERE department_id > 12
     * </code>
     *
     * @see       filterByDepartment()
     *
     * @param     mixed $departmentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByDepartmentId($departmentId = null, $comparison = null)
    {
        if (is_array($departmentId)) {
            $useMinMax = false;
            if (isset($departmentId['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_DEPARTMENT_ID, $departmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentId['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_DEPARTMENT_ID, $departmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_DEPARTMENT_ID, $departmentId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \app\models\Department object
     *
     * @param \app\models\Department|ObjectCollection $department The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByDepartment($department, $comparison = null)
    {
        if ($department instanceof \app\models\Department) {
            return $this
                ->addUsingAlias(EmployeeTableMap::COL_DEPARTMENT_ID, $department->getId(), $comparison);
        } elseif ($department instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EmployeeTableMap::COL_DEPARTMENT_ID, $department->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDepartment() only accepts arguments of type \app\models\Department or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Department relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function joinDepartment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Department');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Department');
        }

        return $this;
    }

    /**
     * Use the Department relation Department object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \app\models\DepartmentQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDepartment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Department', '\app\models\DepartmentQuery');
    }

    /**
     * Use the Department relation Department object
     *
     * @param callable(\app\models\DepartmentQuery):\app\models\DepartmentQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withDepartmentQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useDepartmentQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Department table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \app\models\DepartmentQuery The inner query object of the EXISTS statement
     */
    public function useDepartmentExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Department', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Department table for a NOT EXISTS query.
     *
     * @see useDepartmentExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \app\models\DepartmentQuery The inner query object of the NOT EXISTS statement
     */
    public function useDepartmentNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Department', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \app\models\ProjectEmployee object
     *
     * @param \app\models\ProjectEmployee|ObjectCollection $projectEmployee the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByProjectEmployee($projectEmployee, $comparison = null)
    {
        if ($projectEmployee instanceof \app\models\ProjectEmployee) {
            return $this
                ->addUsingAlias(EmployeeTableMap::COL_ID, $projectEmployee->getEmployeeId(), $comparison);
        } elseif ($projectEmployee instanceof ObjectCollection) {
            return $this
                ->useProjectEmployeeQuery()
                ->filterByPrimaryKeys($projectEmployee->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectEmployee() only accepts arguments of type \app\models\ProjectEmployee or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectEmployee relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function joinProjectEmployee($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectEmployee');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProjectEmployee');
        }

        return $this;
    }

    /**
     * Use the ProjectEmployee relation ProjectEmployee object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \app\models\ProjectEmployeeQuery A secondary query class using the current class as primary query
     */
    public function useProjectEmployeeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectEmployee($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectEmployee', '\app\models\ProjectEmployeeQuery');
    }

    /**
     * Use the ProjectEmployee relation ProjectEmployee object
     *
     * @param callable(\app\models\ProjectEmployeeQuery):\app\models\ProjectEmployeeQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withProjectEmployeeQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useProjectEmployeeQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to ProjectEmployee table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \app\models\ProjectEmployeeQuery The inner query object of the EXISTS statement
     */
    public function useProjectEmployeeExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('ProjectEmployee', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to ProjectEmployee table for a NOT EXISTS query.
     *
     * @see useProjectEmployeeExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \app\models\ProjectEmployeeQuery The inner query object of the NOT EXISTS statement
     */
    public function useProjectEmployeeNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('ProjectEmployee', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildEmployee $employee Object to remove from the list of results
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function prune($employee = null)
    {
        if ($employee) {
            $this->addUsingAlias(EmployeeTableMap::COL_ID, $employee->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the employee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EmployeeTableMap::clearInstancePool();
            EmployeeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EmployeeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EmployeeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EmployeeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(EmployeeTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(EmployeeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(EmployeeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(EmployeeTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(EmployeeTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(EmployeeTableMap::COL_CREATED_AT);
    }

} // EmployeeQuery
