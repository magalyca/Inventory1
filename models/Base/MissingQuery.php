<?php

namespace Base;

use \Missing as ChildMissing;
use \MissingQuery as ChildMissingQuery;
use \Exception;
use \PDO;
use Map\MissingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'missing' table.
 *
 *
 *
 * @method     ChildMissingQuery orderByTagNumber($order = Criteria::ASC) Order by the tag_number column
 * @method     ChildMissingQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMissingQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildMissingQuery groupByTagNumber() Group by the tag_number column
 * @method     ChildMissingQuery groupByDescription() Group by the description column
 * @method     ChildMissingQuery groupByComment() Group by the comment column
 *
 * @method     ChildMissingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMissingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMissingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMissingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMissingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMissingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMissing findOne(ConnectionInterface $con = null) Return the first ChildMissing matching the query
 * @method     ChildMissing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMissing matching the query, or a new ChildMissing object populated from the query conditions when no match is found
 *
 * @method     ChildMissing findOneByTagNumber(int $tag_number) Return the first ChildMissing filtered by the tag_number column
 * @method     ChildMissing findOneByDescription(string $description) Return the first ChildMissing filtered by the description column
 * @method     ChildMissing findOneByComment(string $comment) Return the first ChildMissing filtered by the comment column *

 * @method     ChildMissing requirePk($key, ConnectionInterface $con = null) Return the ChildMissing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMissing requireOne(ConnectionInterface $con = null) Return the first ChildMissing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMissing requireOneByTagNumber(int $tag_number) Return the first ChildMissing filtered by the tag_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMissing requireOneByDescription(string $description) Return the first ChildMissing filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMissing requireOneByComment(string $comment) Return the first ChildMissing filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMissing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMissing objects based on current ModelCriteria
 * @method     ChildMissing[]|ObjectCollection findByTagNumber(int $tag_number) Return ChildMissing objects filtered by the tag_number column
 * @method     ChildMissing[]|ObjectCollection findByDescription(string $description) Return ChildMissing objects filtered by the description column
 * @method     ChildMissing[]|ObjectCollection findByComment(string $comment) Return ChildMissing objects filtered by the comment column
 * @method     ChildMissing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MissingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MissingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Missing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMissingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMissingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMissingQuery) {
            return $criteria;
        }
        $query = new ChildMissingQuery();
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
     * @return ChildMissing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MissingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MissingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMissing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tag_number, description, comment FROM missing WHERE tag_number = :p0';
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
            /** @var ChildMissing $obj */
            $obj = new ChildMissing();
            $obj->hydrate($row);
            MissingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMissing|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tag_number column
     *
     * Example usage:
     * <code>
     * $query->filterByTagNumber(1234); // WHERE tag_number = 1234
     * $query->filterByTagNumber(array(12, 34)); // WHERE tag_number IN (12, 34)
     * $query->filterByTagNumber(array('min' => 12)); // WHERE tag_number > 12
     * </code>
     *
     * @param     mixed $tagNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function filterByTagNumber($tagNumber = null, $comparison = null)
    {
        if (is_array($tagNumber)) {
            $useMinMax = false;
            if (isset($tagNumber['min'])) {
                $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $tagNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tagNumber['max'])) {
                $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $tagNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $tagNumber, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MissingTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MissingTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMissing $missing Object to remove from the list of results
     *
     * @return $this|ChildMissingQuery The current query, for fluid interface
     */
    public function prune($missing = null)
    {
        if ($missing) {
            $this->addUsingAlias(MissingTableMap::COL_TAG_NUMBER, $missing->getTagNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the missing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MissingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MissingTableMap::clearInstancePool();
            MissingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MissingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MissingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MissingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MissingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MissingQuery
