<?php

namespace Map;

use \AllInventory;
use \AllInventoryQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'all_inventory' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AllInventoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AllInventoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'all_inventory';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AllInventory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AllInventory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the account_manager field
     */
    const COL_ACCOUNT_MANAGER = 'all_inventory.account_manager';

    /**
     * the column name for the tag_number field
     */
    const COL_TAG_NUMBER = 'all_inventory.tag_number';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'all_inventory.date';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'all_inventory.description';

    /**
     * the column name for the building_num field
     */
    const COL_BUILDING_NUM = 'all_inventory.building_num';

    /**
     * the column name for the building_name field
     */
    const COL_BUILDING_NAME = 'all_inventory.building_name';

    /**
     * the column name for the room_num field
     */
    const COL_ROOM_NUM = 'all_inventory.room_num';

    /**
     * the column name for the asset_key field
     */
    const COL_ASSET_KEY = 'all_inventory.asset_key';

    /**
     * the column name for the asset_description field
     */
    const COL_ASSET_DESCRIPTION = 'all_inventory.asset_description';

    /**
     * the column name for the cost field
     */
    const COL_COST = 'all_inventory.cost';

    /**
     * the column name for the serial_num field
     */
    const COL_SERIAL_NUM = 'all_inventory.serial_num';

    /**
     * the column name for the invoice field
     */
    const COL_INVOICE = 'all_inventory.invoice';

    /**
     * the column name for the po_num field
     */
    const COL_PO_NUM = 'all_inventory.po_num';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'all_inventory.status';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'all_inventory.comment';

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
        self::TYPE_PHPNAME       => array('AccountManager', 'TagNumber', 'Date', 'Description', 'BuildingNum', 'BuildingName', 'RoomNum', 'AssetKey', 'AssetDescription', 'Cost', 'SerialNum', 'Invoice', 'PoNum', 'Status', 'Comment', ),
        self::TYPE_CAMELNAME     => array('accountManager', 'tagNumber', 'date', 'description', 'buildingNum', 'buildingName', 'roomNum', 'assetKey', 'assetDescription', 'cost', 'serialNum', 'invoice', 'poNum', 'status', 'comment', ),
        self::TYPE_COLNAME       => array(AllInventoryTableMap::COL_ACCOUNT_MANAGER, AllInventoryTableMap::COL_TAG_NUMBER, AllInventoryTableMap::COL_DATE, AllInventoryTableMap::COL_DESCRIPTION, AllInventoryTableMap::COL_BUILDING_NUM, AllInventoryTableMap::COL_BUILDING_NAME, AllInventoryTableMap::COL_ROOM_NUM, AllInventoryTableMap::COL_ASSET_KEY, AllInventoryTableMap::COL_ASSET_DESCRIPTION, AllInventoryTableMap::COL_COST, AllInventoryTableMap::COL_SERIAL_NUM, AllInventoryTableMap::COL_INVOICE, AllInventoryTableMap::COL_PO_NUM, AllInventoryTableMap::COL_STATUS, AllInventoryTableMap::COL_COMMENT, ),
        self::TYPE_FIELDNAME     => array('account_manager', 'tag_number', 'date', 'description', 'building_num', 'building_name', 'room_num', 'asset_key', 'asset_description', 'cost', 'serial_num', 'invoice', 'po_num', 'status', 'comment', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AccountManager' => 0, 'TagNumber' => 1, 'Date' => 2, 'Description' => 3, 'BuildingNum' => 4, 'BuildingName' => 5, 'RoomNum' => 6, 'AssetKey' => 7, 'AssetDescription' => 8, 'Cost' => 9, 'SerialNum' => 10, 'Invoice' => 11, 'PoNum' => 12, 'Status' => 13, 'Comment' => 14, ),
        self::TYPE_CAMELNAME     => array('accountManager' => 0, 'tagNumber' => 1, 'date' => 2, 'description' => 3, 'buildingNum' => 4, 'buildingName' => 5, 'roomNum' => 6, 'assetKey' => 7, 'assetDescription' => 8, 'cost' => 9, 'serialNum' => 10, 'invoice' => 11, 'poNum' => 12, 'status' => 13, 'comment' => 14, ),
        self::TYPE_COLNAME       => array(AllInventoryTableMap::COL_ACCOUNT_MANAGER => 0, AllInventoryTableMap::COL_TAG_NUMBER => 1, AllInventoryTableMap::COL_DATE => 2, AllInventoryTableMap::COL_DESCRIPTION => 3, AllInventoryTableMap::COL_BUILDING_NUM => 4, AllInventoryTableMap::COL_BUILDING_NAME => 5, AllInventoryTableMap::COL_ROOM_NUM => 6, AllInventoryTableMap::COL_ASSET_KEY => 7, AllInventoryTableMap::COL_ASSET_DESCRIPTION => 8, AllInventoryTableMap::COL_COST => 9, AllInventoryTableMap::COL_SERIAL_NUM => 10, AllInventoryTableMap::COL_INVOICE => 11, AllInventoryTableMap::COL_PO_NUM => 12, AllInventoryTableMap::COL_STATUS => 13, AllInventoryTableMap::COL_COMMENT => 14, ),
        self::TYPE_FIELDNAME     => array('account_manager' => 0, 'tag_number' => 1, 'date' => 2, 'description' => 3, 'building_num' => 4, 'building_name' => 5, 'room_num' => 6, 'asset_key' => 7, 'asset_description' => 8, 'cost' => 9, 'serial_num' => 10, 'invoice' => 11, 'po_num' => 12, 'status' => 13, 'comment' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

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
        $this->setName('all_inventory');
        $this->setPhpName('AllInventory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AllInventory');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('account_manager', 'AccountManager', 'VARCHAR', true, 32, null);
        $this->addPrimaryKey('tag_number', 'TagNumber', 'INTEGER', true, 16, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 64, null);
        $this->addColumn('building_num', 'BuildingNum', 'INTEGER', true, null, null);
        $this->addColumn('building_name', 'BuildingName', 'VARCHAR', true, 32, null);
        $this->addColumn('room_num', 'RoomNum', 'VARCHAR', true, 8, null);
        $this->addColumn('asset_key', 'AssetKey', 'INTEGER', true, null, null);
        $this->addColumn('asset_description', 'AssetDescription', 'VARCHAR', true, 64, null);
        $this->addColumn('cost', 'Cost', 'INTEGER', true, null, null);
        $this->addColumn('serial_num', 'SerialNum', 'VARCHAR', true, 8, null);
        $this->addColumn('invoice', 'Invoice', 'VARCHAR', true, 8, null);
        $this->addColumn('po_num', 'PoNum', 'VARCHAR', true, 8, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 16, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', true, 64, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 1 + $offset
                : self::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)
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
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AllInventoryTableMap::CLASS_DEFAULT : AllInventoryTableMap::OM_CLASS;
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
     * @return array           (AllInventory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AllInventoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AllInventoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AllInventoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AllInventoryTableMap::OM_CLASS;
            /** @var AllInventory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AllInventoryTableMap::addInstanceToPool($obj, $key);
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
            $key = AllInventoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AllInventoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AllInventory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AllInventoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AllInventoryTableMap::COL_ACCOUNT_MANAGER);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_TAG_NUMBER);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_DATE);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_BUILDING_NUM);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_BUILDING_NAME);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_ROOM_NUM);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_ASSET_KEY);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_ASSET_DESCRIPTION);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_COST);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_SERIAL_NUM);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_INVOICE);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_PO_NUM);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_STATUS);
            $criteria->addSelectColumn(AllInventoryTableMap::COL_COMMENT);
        } else {
            $criteria->addSelectColumn($alias . '.account_manager');
            $criteria->addSelectColumn($alias . '.tag_number');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.building_num');
            $criteria->addSelectColumn($alias . '.building_name');
            $criteria->addSelectColumn($alias . '.room_num');
            $criteria->addSelectColumn($alias . '.asset_key');
            $criteria->addSelectColumn($alias . '.asset_description');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.serial_num');
            $criteria->addSelectColumn($alias . '.invoice');
            $criteria->addSelectColumn($alias . '.po_num');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.comment');
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
        return Propel::getServiceContainer()->getDatabaseMap(AllInventoryTableMap::DATABASE_NAME)->getTable(AllInventoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AllInventoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AllInventoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AllInventoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AllInventory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AllInventory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AllInventory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AllInventoryTableMap::DATABASE_NAME);
            $criteria->add(AllInventoryTableMap::COL_TAG_NUMBER, (array) $values, Criteria::IN);
        }

        $query = AllInventoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AllInventoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AllInventoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the all_inventory table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AllInventoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AllInventory or Criteria object.
     *
     * @param mixed               $criteria Criteria or AllInventory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AllInventory object
        }


        // Set the correct dbName
        $query = AllInventoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AllInventoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AllInventoryTableMap::buildTableMap();
