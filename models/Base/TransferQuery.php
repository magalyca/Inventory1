<?php

namespace Base;

use \Transfer as ChildTransfer;
use \TransferQuery as ChildTransferQuery;
use \Exception;
use \PDO;
use Map\TransferTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'transfer' table.
 *
 *
 *
 * @method     ChildTransferQuery orderByTagNumber($order = Criteria::ASC) Order by the tag_number column
 * @method     ChildTransferQuery orderByDateTransfered($order = Criteria::ASC) Order by the date_transfered column
 * @method     ChildTransferQuery orderByTransferFrom($order = Criteria::ASC) Order by the transfer_from column
 * @method     ChildTransferQuery orderByTransferTo($order = Criteria::ASC) Order by the transfer_to column
 *
 * @method     ChildTransferQuery groupByTagNumber() Group by the tag_number column
 * @method     ChildTransferQuery groupByDateTransfered() Group by the date_transfered column
 * @method     ChildTransferQuery groupByTransferFrom() Group by the transfer_from column
 * @method     ChildTransferQuery groupByTransferTo() Group by the transfer_to column
 *
 * @method     ChildTransferQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTransferQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTransferQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTransferQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTransferQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTransferQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTransfer findOne(ConnectionInterface $con = null) Return the first ChildTransfer matching the query
 * @method     ChildTransfer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTransfer matching the query, or a new ChildTransfer object populated from the query conditions when no match is found
 *
 * @method     ChildTransfer findOneByTagNumber(int $tag_number) Return the first ChildTransfer filtered by the tag_number column
 * @method     ChildTransfer findOneByDateTransfered(string $date_transfered) Return the first ChildTransfer filtered by the date_transfered column
 * @method     ChildTransfer findOneByTransferFrom(string $transfer_from) Return the first ChildTransfer filtered by the transfer_from column
 * @method     ChildTransfer findOneByTransferTo(string $transfer_to) Return the first ChildTransfer filtered by the transfer_to column *

 * @method     ChildTransfer requirePk($key, ConnectionInterface $con = null) Return the ChildTransfer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransfer requireOne(ConnectionInterface $con = null) Return the first ChildTransfer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTransfer requireOneByTagNumber(int $tag_number) Return the first ChildTransfer filtered by the tag_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransfer requireOneByDateTransfered(string $date_transfered) Return the first ChildTransfer filtered by the date_transfered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransfer requireOneByTransferFrom(string $transfer_from) Return the first ChildTransfer filtered by the transfer_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransfer requireOneByTransferTo(string $transfer_to) Return the first ChildTransfer filtered by the transfer_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTransfer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTransfer objects based on current ModelCriteria
 * @method     ChildTransfer[]|ObjectCollection findByTagNumber(int $tag_number) Return ChildTransfer objects filtered by the tag_number column
 * @method     ChildTransfer[]|ObjectCollection findByDateTransfered(string $date_transfered) Return ChildTransfer objects filtered by the date_transfered column
 * @method     ChildTransfer[]|ObjectCollection findByTransferFrom(string $transfer_from) Return ChildTransfer objects filtered by the transfer_from column
 * @method     ChildTransfer[]|ObjectCollection findByTransferTo(string $transfer_to) Return ChildTransfer objects filtered by the transfer_to column
 * @method     ChildTransfer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TransferQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TransferQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Transfer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTransferQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTransferQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTransferQuery) {
            return $criteria;
        }
        $query = new ChildTransferQuery();
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
     * @return ChildTransfer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TransferTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TransferTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTransfer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tag_number, date_transfered, transfer_from, transfer_to FROM transfer WHERE tag_number = :p0';
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
            /** @var ChildTransfer $obj */
            $obj = new ChildTransfer();
            $obj->hydrate($row);
            TransferTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTransfer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $keys, Criteria::IN);
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
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByTagNumber($tagNumber = null, $comparison = null)
    {
        if (is_array($tagNumber)) {
            $useMinMax = false;
            if (isset($tagNumber['min'])) {
                $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $tagNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tagNumber['max'])) {
                $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $tagNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $tagNumber, $comparison);
    }

    /**
     * Filter the query on the date_transfered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTransfered('2011-03-14'); // WHERE date_transfered = '2011-03-14'
     * $query->filterByDateTransfered('now'); // WHERE date_transfered = '2011-03-14'
     * $query->filterByDateTransfered(array('max' => 'yesterday')); // WHERE date_transfered > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTransfered The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByDateTransfered($dateTransfered = null, $comparison = null)
    {
        if (is_array($dateTransfered)) {
            $useMinMax = false;
            if (isset($dateTransfered['min'])) {
                $this->addUsingAlias(TransferTableMap::COL_DATE_TRANSFERED, $dateTransfered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTransfered['max'])) {
                $this->addUsingAlias(TransferTableMap::COL_DATE_TRANSFERED, $dateTransfered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransferTableMap::COL_DATE_TRANSFERED, $dateTransfered, $comparison);
    }

    /**
     * Filter the query on the transfer_from column
     *
     * Example usage:
     * <code>
     * $query->filterByTransferFrom('fooValue');   // WHERE transfer_from = 'fooValue'
     * $query->filterByTransferFrom('%fooValue%', Criteria::LIKE); // WHERE transfer_from LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transferFrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByTransferFrom($transferFrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transferFrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransferTableMap::COL_TRANSFER_FROM, $transferFrom, $comparison);
    }

    /**
     * Filter the query on the transfer_to column
     *
     * Example usage:
     * <code>
     * $query->filterByTransferTo('fooValue');   // WHERE transfer_to = 'fooValue'
     * $query->filterByTransferTo('%fooValue%', Criteria::LIKE); // WHERE transfer_to LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transferTo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function filterByTransferTo($transferTo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transferTo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransferTableMap::COL_TRANSFER_TO, $transferTo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTransfer $transfer Object to remove from the list of results
     *
     * @return $this|ChildTransferQuery The current query, for fluid interface
     */
    public function prune($transfer = null)
    {
        if ($transfer) {
            $this->addUsingAlias(TransferTableMap::COL_TAG_NUMBER, $transfer->getTagNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the transfer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TransferTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TransferTableMap::clearInstancePool();
            TransferTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TransferTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TransferTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TransferTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TransferTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TransferQuery
