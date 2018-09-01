<?php

namespace Base;

use \AllInventory as ChildAllInventory;
use \AllInventoryQuery as ChildAllInventoryQuery;
use \Exception;
use \PDO;
use Map\AllInventoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'all_inventory' table.
 *
 *
 *
 * @method     ChildAllInventoryQuery orderByAccountManager($order = Criteria::ASC) Order by the account_manager column
 * @method     ChildAllInventoryQuery orderByTagNumber($order = Criteria::ASC) Order by the tag_number column
 * @method     ChildAllInventoryQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildAllInventoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildAllInventoryQuery orderByBuildingNum($order = Criteria::ASC) Order by the building_num column
 * @method     ChildAllInventoryQuery orderByBuildingName($order = Criteria::ASC) Order by the building_name column
 * @method     ChildAllInventoryQuery orderByRoomNum($order = Criteria::ASC) Order by the room_num column
 * @method     ChildAllInventoryQuery orderByAssetKey($order = Criteria::ASC) Order by the asset_key column
 * @method     ChildAllInventoryQuery orderByAssetDescription($order = Criteria::ASC) Order by the asset_description column
 * @method     ChildAllInventoryQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildAllInventoryQuery orderBySerialNum($order = Criteria::ASC) Order by the serial_num column
 * @method     ChildAllInventoryQuery orderByInvoice($order = Criteria::ASC) Order by the invoice column
 * @method     ChildAllInventoryQuery orderByPoNum($order = Criteria::ASC) Order by the po_num column
 * @method     ChildAllInventoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAllInventoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildAllInventoryQuery groupByAccountManager() Group by the account_manager column
 * @method     ChildAllInventoryQuery groupByTagNumber() Group by the tag_number column
 * @method     ChildAllInventoryQuery groupByDate() Group by the date column
 * @method     ChildAllInventoryQuery groupByDescription() Group by the description column
 * @method     ChildAllInventoryQuery groupByBuildingNum() Group by the building_num column
 * @method     ChildAllInventoryQuery groupByBuildingName() Group by the building_name column
 * @method     ChildAllInventoryQuery groupByRoomNum() Group by the room_num column
 * @method     ChildAllInventoryQuery groupByAssetKey() Group by the asset_key column
 * @method     ChildAllInventoryQuery groupByAssetDescription() Group by the asset_description column
 * @method     ChildAllInventoryQuery groupByCost() Group by the cost column
 * @method     ChildAllInventoryQuery groupBySerialNum() Group by the serial_num column
 * @method     ChildAllInventoryQuery groupByInvoice() Group by the invoice column
 * @method     ChildAllInventoryQuery groupByPoNum() Group by the po_num column
 * @method     ChildAllInventoryQuery groupByStatus() Group by the status column
 * @method     ChildAllInventoryQuery groupByComment() Group by the comment column
 *
 * @method     ChildAllInventoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAllInventoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAllInventoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAllInventoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAllInventoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAllInventoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAllInventory findOne(ConnectionInterface $con = null) Return the first ChildAllInventory matching the query
 * @method     ChildAllInventory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAllInventory matching the query, or a new ChildAllInventory object populated from the query conditions when no match is found
 *
 * @method     ChildAllInventory findOneByAccountManager(string $account_manager) Return the first ChildAllInventory filtered by the account_manager column
 * @method     ChildAllInventory findOneByTagNumber(int $tag_number) Return the first ChildAllInventory filtered by the tag_number column
 * @method     ChildAllInventory findOneByDate(string $date) Return the first ChildAllInventory filtered by the date column
 * @method     ChildAllInventory findOneByDescription(string $description) Return the first ChildAllInventory filtered by the description column
 * @method     ChildAllInventory findOneByBuildingNum(int $building_num) Return the first ChildAllInventory filtered by the building_num column
 * @method     ChildAllInventory findOneByBuildingName(string $building_name) Return the first ChildAllInventory filtered by the building_name column
 * @method     ChildAllInventory findOneByRoomNum(string $room_num) Return the first ChildAllInventory filtered by the room_num column
 * @method     ChildAllInventory findOneByAssetKey(int $asset_key) Return the first ChildAllInventory filtered by the asset_key column
 * @method     ChildAllInventory findOneByAssetDescription(string $asset_description) Return the first ChildAllInventory filtered by the asset_description column
 * @method     ChildAllInventory findOneByCost(int $cost) Return the first ChildAllInventory filtered by the cost column
 * @method     ChildAllInventory findOneBySerialNum(string $serial_num) Return the first ChildAllInventory filtered by the serial_num column
 * @method     ChildAllInventory findOneByInvoice(string $invoice) Return the first ChildAllInventory filtered by the invoice column
 * @method     ChildAllInventory findOneByPoNum(string $po_num) Return the first ChildAllInventory filtered by the po_num column
 * @method     ChildAllInventory findOneByStatus(string $status) Return the first ChildAllInventory filtered by the status column
 * @method     ChildAllInventory findOneByComment(string $comment) Return the first ChildAllInventory filtered by the comment column *

 * @method     ChildAllInventory requirePk($key, ConnectionInterface $con = null) Return the ChildAllInventory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOne(ConnectionInterface $con = null) Return the first ChildAllInventory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAllInventory requireOneByAccountManager(string $account_manager) Return the first ChildAllInventory filtered by the account_manager column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByTagNumber(int $tag_number) Return the first ChildAllInventory filtered by the tag_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByDate(string $date) Return the first ChildAllInventory filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByDescription(string $description) Return the first ChildAllInventory filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByBuildingNum(int $building_num) Return the first ChildAllInventory filtered by the building_num column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByBuildingName(string $building_name) Return the first ChildAllInventory filtered by the building_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByRoomNum(string $room_num) Return the first ChildAllInventory filtered by the room_num column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByAssetKey(int $asset_key) Return the first ChildAllInventory filtered by the asset_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByAssetDescription(string $asset_description) Return the first ChildAllInventory filtered by the asset_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByCost(int $cost) Return the first ChildAllInventory filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneBySerialNum(string $serial_num) Return the first ChildAllInventory filtered by the serial_num column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByInvoice(string $invoice) Return the first ChildAllInventory filtered by the invoice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByPoNum(string $po_num) Return the first ChildAllInventory filtered by the po_num column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByStatus(string $status) Return the first ChildAllInventory filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAllInventory requireOneByComment(string $comment) Return the first ChildAllInventory filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAllInventory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAllInventory objects based on current ModelCriteria
 * @method     ChildAllInventory[]|ObjectCollection findByAccountManager(string $account_manager) Return ChildAllInventory objects filtered by the account_manager column
 * @method     ChildAllInventory[]|ObjectCollection findByTagNumber(int $tag_number) Return ChildAllInventory objects filtered by the tag_number column
 * @method     ChildAllInventory[]|ObjectCollection findByDate(string $date) Return ChildAllInventory objects filtered by the date column
 * @method     ChildAllInventory[]|ObjectCollection findByDescription(string $description) Return ChildAllInventory objects filtered by the description column
 * @method     ChildAllInventory[]|ObjectCollection findByBuildingNum(int $building_num) Return ChildAllInventory objects filtered by the building_num column
 * @method     ChildAllInventory[]|ObjectCollection findByBuildingName(string $building_name) Return ChildAllInventory objects filtered by the building_name column
 * @method     ChildAllInventory[]|ObjectCollection findByRoomNum(string $room_num) Return ChildAllInventory objects filtered by the room_num column
 * @method     ChildAllInventory[]|ObjectCollection findByAssetKey(int $asset_key) Return ChildAllInventory objects filtered by the asset_key column
 * @method     ChildAllInventory[]|ObjectCollection findByAssetDescription(string $asset_description) Return ChildAllInventory objects filtered by the asset_description column
 * @method     ChildAllInventory[]|ObjectCollection findByCost(int $cost) Return ChildAllInventory objects filtered by the cost column
 * @method     ChildAllInventory[]|ObjectCollection findBySerialNum(string $serial_num) Return ChildAllInventory objects filtered by the serial_num column
 * @method     ChildAllInventory[]|ObjectCollection findByInvoice(string $invoice) Return ChildAllInventory objects filtered by the invoice column
 * @method     ChildAllInventory[]|ObjectCollection findByPoNum(string $po_num) Return ChildAllInventory objects filtered by the po_num column
 * @method     ChildAllInventory[]|ObjectCollection findByStatus(string $status) Return ChildAllInventory objects filtered by the status column
 * @method     ChildAllInventory[]|ObjectCollection findByComment(string $comment) Return ChildAllInventory objects filtered by the comment column
 * @method     ChildAllInventory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AllInventoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AllInventoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AllInventory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAllInventoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAllInventoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAllInventoryQuery) {
            return $criteria;
        }
        $query = new ChildAllInventoryQuery();
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
     * @return ChildAllInventory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AllInventoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAllInventory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT account_manager, tag_number, date, description, building_num, building_name, room_num, asset_key, asset_description, cost, serial_num, invoice, po_num, status, comment FROM all_inventory WHERE tag_number = :p0';
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
            /** @var ChildAllInventory $obj */
            $obj = new ChildAllInventory();
            $obj->hydrate($row);
            AllInventoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAllInventory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the account_manager column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountManager('fooValue');   // WHERE account_manager = 'fooValue'
     * $query->filterByAccountManager('%fooValue%', Criteria::LIKE); // WHERE account_manager LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountManager The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByAccountManager($accountManager = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountManager)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_ACCOUNT_MANAGER, $accountManager, $comparison);
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
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByTagNumber($tagNumber = null, $comparison = null)
    {
        if (is_array($tagNumber)) {
            $useMinMax = false;
            if (isset($tagNumber['min'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $tagNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tagNumber['max'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $tagNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $tagNumber, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the building_num column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingNum(1234); // WHERE building_num = 1234
     * $query->filterByBuildingNum(array(12, 34)); // WHERE building_num IN (12, 34)
     * $query->filterByBuildingNum(array('min' => 12)); // WHERE building_num > 12
     * </code>
     *
     * @param     mixed $buildingNum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByBuildingNum($buildingNum = null, $comparison = null)
    {
        if (is_array($buildingNum)) {
            $useMinMax = false;
            if (isset($buildingNum['min'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_BUILDING_NUM, $buildingNum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($buildingNum['max'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_BUILDING_NUM, $buildingNum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_BUILDING_NUM, $buildingNum, $comparison);
    }

    /**
     * Filter the query on the building_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingName('fooValue');   // WHERE building_name = 'fooValue'
     * $query->filterByBuildingName('%fooValue%', Criteria::LIKE); // WHERE building_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $buildingName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByBuildingName($buildingName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($buildingName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_BUILDING_NAME, $buildingName, $comparison);
    }

    /**
     * Filter the query on the room_num column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomNum('fooValue');   // WHERE room_num = 'fooValue'
     * $query->filterByRoomNum('%fooValue%', Criteria::LIKE); // WHERE room_num LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roomNum The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByRoomNum($roomNum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roomNum)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_ROOM_NUM, $roomNum, $comparison);
    }

    /**
     * Filter the query on the asset_key column
     *
     * Example usage:
     * <code>
     * $query->filterByAssetKey(1234); // WHERE asset_key = 1234
     * $query->filterByAssetKey(array(12, 34)); // WHERE asset_key IN (12, 34)
     * $query->filterByAssetKey(array('min' => 12)); // WHERE asset_key > 12
     * </code>
     *
     * @param     mixed $assetKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByAssetKey($assetKey = null, $comparison = null)
    {
        if (is_array($assetKey)) {
            $useMinMax = false;
            if (isset($assetKey['min'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_ASSET_KEY, $assetKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assetKey['max'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_ASSET_KEY, $assetKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_ASSET_KEY, $assetKey, $comparison);
    }

    /**
     * Filter the query on the asset_description column
     *
     * Example usage:
     * <code>
     * $query->filterByAssetDescription('fooValue');   // WHERE asset_description = 'fooValue'
     * $query->filterByAssetDescription('%fooValue%', Criteria::LIKE); // WHERE asset_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assetDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByAssetDescription($assetDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assetDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_ASSET_DESCRIPTION, $assetDescription, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(AllInventoryTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query on the serial_num column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialNum('fooValue');   // WHERE serial_num = 'fooValue'
     * $query->filterBySerialNum('%fooValue%', Criteria::LIKE); // WHERE serial_num LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serialNum The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterBySerialNum($serialNum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serialNum)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_SERIAL_NUM, $serialNum, $comparison);
    }

    /**
     * Filter the query on the invoice column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoice('fooValue');   // WHERE invoice = 'fooValue'
     * $query->filterByInvoice('%fooValue%', Criteria::LIKE); // WHERE invoice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invoice The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByInvoice($invoice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invoice)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_INVOICE, $invoice, $comparison);
    }

    /**
     * Filter the query on the po_num column
     *
     * Example usage:
     * <code>
     * $query->filterByPoNum('fooValue');   // WHERE po_num = 'fooValue'
     * $query->filterByPoNum('%fooValue%', Criteria::LIKE); // WHERE po_num LIKE '%fooValue%'
     * </code>
     *
     * @param     string $poNum The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByPoNum($poNum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poNum)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_PO_NUM, $poNum, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AllInventoryTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAllInventory $allInventory Object to remove from the list of results
     *
     * @return $this|ChildAllInventoryQuery The current query, for fluid interface
     */
    public function prune($allInventory = null)
    {
        if ($allInventory) {
            $this->addUsingAlias(AllInventoryTableMap::COL_TAG_NUMBER, $allInventory->getTagNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the all_inventory table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AllInventoryTableMap::clearInstancePool();
            AllInventoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AllInventoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AllInventoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AllInventoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AllInventoryQuery
