<?php

namespace Base;

use \AssetUser as ChildAssetUser;
use \AssetUserQuery as ChildAssetUserQuery;
use \Exception;
use \PDO;
use Map\AssetUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'asset_user' table.
 *
 *
 *
 * @method     ChildAssetUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAssetUserQuery orderByTagNum($order = Criteria::ASC) Order by the tag_num column
 * @method     ChildAssetUserQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildAssetUserQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildAssetUserQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 *
 * @method     ChildAssetUserQuery groupById() Group by the id column
 * @method     ChildAssetUserQuery groupByTagNum() Group by the tag_num column
 * @method     ChildAssetUserQuery groupByUserId() Group by the user_id column
 * @method     ChildAssetUserQuery groupByStartDate() Group by the start_date column
 * @method     ChildAssetUserQuery groupByEndDate() Group by the end_date column
 *
 * @method     ChildAssetUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAssetUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAssetUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAssetUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAssetUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAssetUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAssetUser findOne(ConnectionInterface $con = null) Return the first ChildAssetUser matching the query
 * @method     ChildAssetUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAssetUser matching the query, or a new ChildAssetUser object populated from the query conditions when no match is found
 *
 * @method     ChildAssetUser findOneById(int $id) Return the first ChildAssetUser filtered by the id column
 * @method     ChildAssetUser findOneByTagNum(int $tag_num) Return the first ChildAssetUser filtered by the tag_num column
 * @method     ChildAssetUser findOneByUserId(int $user_id) Return the first ChildAssetUser filtered by the user_id column
 * @method     ChildAssetUser findOneByStartDate(string $start_date) Return the first ChildAssetUser filtered by the start_date column
 * @method     ChildAssetUser findOneByEndDate(string $end_date) Return the first ChildAssetUser filtered by the end_date column *

 * @method     ChildAssetUser requirePk($key, ConnectionInterface $con = null) Return the ChildAssetUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssetUser requireOne(ConnectionInterface $con = null) Return the first ChildAssetUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAssetUser requireOneById(int $id) Return the first ChildAssetUser filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssetUser requireOneByTagNum(int $tag_num) Return the first ChildAssetUser filtered by the tag_num column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssetUser requireOneByUserId(int $user_id) Return the first ChildAssetUser filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssetUser requireOneByStartDate(string $start_date) Return the first ChildAssetUser filtered by the start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssetUser requireOneByEndDate(string $end_date) Return the first ChildAssetUser filtered by the end_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAssetUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAssetUser objects based on current ModelCriteria
 * @method     ChildAssetUser[]|ObjectCollection findById(int $id) Return ChildAssetUser objects filtered by the id column
 * @method     ChildAssetUser[]|ObjectCollection findByTagNum(int $tag_num) Return ChildAssetUser objects filtered by the tag_num column
 * @method     ChildAssetUser[]|ObjectCollection findByUserId(int $user_id) Return ChildAssetUser objects filtered by the user_id column
 * @method     ChildAssetUser[]|ObjectCollection findByStartDate(string $start_date) Return ChildAssetUser objects filtered by the start_date column
 * @method     ChildAssetUser[]|ObjectCollection findByEndDate(string $end_date) Return ChildAssetUser objects filtered by the end_date column
 * @method     ChildAssetUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AssetUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AssetUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AssetUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAssetUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAssetUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAssetUserQuery) {
            return $criteria;
        }
        $query = new ChildAssetUserQuery();
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
     * @return ChildAssetUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AssetUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AssetUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAssetUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tag_num, user_id, start_date, end_date FROM asset_user WHERE id = :p0';
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
            /** @var ChildAssetUser $obj */
            $obj = new ChildAssetUser();
            $obj->hydrate($row);
            AssetUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAssetUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AssetUserTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AssetUserTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssetUserTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tag_num column
     *
     * Example usage:
     * <code>
     * $query->filterByTagNum(1234); // WHERE tag_num = 1234
     * $query->filterByTagNum(array(12, 34)); // WHERE tag_num IN (12, 34)
     * $query->filterByTagNum(array('min' => 12)); // WHERE tag_num > 12
     * </code>
     *
     * @param     mixed $tagNum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByTagNum($tagNum = null, $comparison = null)
    {
        if (is_array($tagNum)) {
            $useMinMax = false;
            if (isset($tagNum['min'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_TAG_NUM, $tagNum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tagNum['max'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_TAG_NUM, $tagNum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssetUserTableMap::COL_TAG_NUM, $tagNum, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssetUserTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('2011-03-14'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate('now'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate(array('max' => 'yesterday')); // WHERE start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $startDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssetUserTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $endDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(AssetUserTableMap::COL_END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssetUserTableMap::COL_END_DATE, $endDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAssetUser $assetUser Object to remove from the list of results
     *
     * @return $this|ChildAssetUserQuery The current query, for fluid interface
     */
    public function prune($assetUser = null)
    {
        if ($assetUser) {
            $this->addUsingAlias(AssetUserTableMap::COL_ID, $assetUser->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the asset_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AssetUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AssetUserTableMap::clearInstancePool();
            AssetUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AssetUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AssetUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AssetUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AssetUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AssetUserQuery
