<?php

namespace Base;

use \AllInventoryQuery as ChildAllInventoryQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\AllInventoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'all_inventory' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class AllInventory implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AllInventoryTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the account_manager field.
     *
     * @var        string
     */
    protected $account_manager;

    /**
     * The value for the tag_number field.
     *
     * @var        int
     */
    protected $tag_number;

    /**
     * The value for the date field.
     *
     * @var        DateTime
     */
    protected $date;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the building_num field.
     *
     * @var        int
     */
    protected $building_num;

    /**
     * The value for the building_name field.
     *
     * @var        string
     */
    protected $building_name;

    /**
     * The value for the room_num field.
     *
     * @var        string
     */
    protected $room_num;

    /**
     * The value for the asset_key field.
     *
     * @var        int
     */
    protected $asset_key;

    /**
     * The value for the asset_description field.
     *
     * @var        string
     */
    protected $asset_description;

    /**
     * The value for the cost field.
     *
     * @var        int
     */
    protected $cost;

    /**
     * The value for the serial_num field.
     *
     * @var        string
     */
    protected $serial_num;

    /**
     * The value for the invoice field.
     *
     * @var        string
     */
    protected $invoice;

    /**
     * The value for the po_num field.
     *
     * @var        string
     */
    protected $po_num;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the comment field.
     *
     * @var        string
     */
    protected $comment;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\AllInventory object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>AllInventory</code> instance.  If
     * <code>obj</code> is an instance of <code>AllInventory</code>, delegates to
     * <code>equals(AllInventory)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|AllInventory The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [account_manager] column value.
     *
     * @return string
     */
    public function getAccountManager()
    {
        return $this->account_manager;
    }

    /**
     * Get the [tag_number] column value.
     *
     * @return int
     */
    public function getTagNumber()
    {
        return $this->tag_number;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = NULL)
    {
        if ($format === null) {
            return $this->date;
        } else {
            return $this->date instanceof \DateTimeInterface ? $this->date->format($format) : null;
        }
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [building_num] column value.
     *
     * @return int
     */
    public function getBuildingNum()
    {
        return $this->building_num;
    }

    /**
     * Get the [building_name] column value.
     *
     * @return string
     */
    public function getBuildingName()
    {
        return $this->building_name;
    }

    /**
     * Get the [room_num] column value.
     *
     * @return string
     */
    public function getRoomNum()
    {
        return $this->room_num;
    }

    /**
     * Get the [asset_key] column value.
     *
     * @return int
     */
    public function getAssetKey()
    {
        return $this->asset_key;
    }

    /**
     * Get the [asset_description] column value.
     *
     * @return string
     */
    public function getAssetDescription()
    {
        return $this->asset_description;
    }

    /**
     * Get the [cost] column value.
     *
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get the [serial_num] column value.
     *
     * @return string
     */
    public function getSerialNum()
    {
        return $this->serial_num;
    }

    /**
     * Get the [invoice] column value.
     *
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Get the [po_num] column value.
     *
     * @return string
     */
    public function getPoNum()
    {
        return $this->po_num;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of [account_manager] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setAccountManager($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->account_manager !== $v) {
            $this->account_manager = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_ACCOUNT_MANAGER] = true;
        }

        return $this;
    } // setAccountManager()

    /**
     * Set the value of [tag_number] column.
     *
     * @param int $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setTagNumber($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tag_number !== $v) {
            $this->tag_number = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_TAG_NUMBER] = true;
        }

        return $this;
    } // setTagNumber()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            if ($this->date === null || $dt === null || $dt->format("Y-m-d") !== $this->date->format("Y-m-d")) {
                $this->date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AllInventoryTableMap::COL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDate()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [building_num] column.
     *
     * @param int $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setBuildingNum($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->building_num !== $v) {
            $this->building_num = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_BUILDING_NUM] = true;
        }

        return $this;
    } // setBuildingNum()

    /**
     * Set the value of [building_name] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setBuildingName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->building_name !== $v) {
            $this->building_name = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_BUILDING_NAME] = true;
        }

        return $this;
    } // setBuildingName()

    /**
     * Set the value of [room_num] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setRoomNum($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->room_num !== $v) {
            $this->room_num = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_ROOM_NUM] = true;
        }

        return $this;
    } // setRoomNum()

    /**
     * Set the value of [asset_key] column.
     *
     * @param int $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setAssetKey($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->asset_key !== $v) {
            $this->asset_key = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_ASSET_KEY] = true;
        }

        return $this;
    } // setAssetKey()

    /**
     * Set the value of [asset_description] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setAssetDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->asset_description !== $v) {
            $this->asset_description = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_ASSET_DESCRIPTION] = true;
        }

        return $this;
    } // setAssetDescription()

    /**
     * Set the value of [cost] column.
     *
     * @param int $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_COST] = true;
        }

        return $this;
    } // setCost()

    /**
     * Set the value of [serial_num] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setSerialNum($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->serial_num !== $v) {
            $this->serial_num = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_SERIAL_NUM] = true;
        }

        return $this;
    } // setSerialNum()

    /**
     * Set the value of [invoice] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setInvoice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invoice !== $v) {
            $this->invoice = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_INVOICE] = true;
        }

        return $this;
    } // setInvoice()

    /**
     * Set the value of [po_num] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setPoNum($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->po_num !== $v) {
            $this->po_num = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_PO_NUM] = true;
        }

        return $this;
    } // setPoNum()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\AllInventory The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[AllInventoryTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AllInventoryTableMap::translateFieldName('AccountManager', TableMap::TYPE_PHPNAME, $indexType)];
            $this->account_manager = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AllInventoryTableMap::translateFieldName('TagNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tag_number = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AllInventoryTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AllInventoryTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AllInventoryTableMap::translateFieldName('BuildingNum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->building_num = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AllInventoryTableMap::translateFieldName('BuildingName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->building_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AllInventoryTableMap::translateFieldName('RoomNum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->room_num = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AllInventoryTableMap::translateFieldName('AssetKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->asset_key = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AllInventoryTableMap::translateFieldName('AssetDescription', TableMap::TYPE_PHPNAME, $indexType)];
            $this->asset_description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AllInventoryTableMap::translateFieldName('Cost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AllInventoryTableMap::translateFieldName('SerialNum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->serial_num = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AllInventoryTableMap::translateFieldName('Invoice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AllInventoryTableMap::translateFieldName('PoNum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->po_num = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AllInventoryTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AllInventoryTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = AllInventoryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\AllInventory'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAllInventoryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AllInventory::setDeleted()
     * @see AllInventory::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAllInventoryQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AllInventoryTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AllInventoryTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AllInventoryTableMap::COL_ACCOUNT_MANAGER)) {
            $modifiedColumns[':p' . $index++]  = 'account_manager';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_TAG_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'tag_number';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_BUILDING_NUM)) {
            $modifiedColumns[':p' . $index++]  = 'building_num';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_BUILDING_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'building_name';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ROOM_NUM)) {
            $modifiedColumns[':p' . $index++]  = 'room_num';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ASSET_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'asset_key';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ASSET_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'asset_description';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'cost';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_SERIAL_NUM)) {
            $modifiedColumns[':p' . $index++]  = 'serial_num';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_INVOICE)) {
            $modifiedColumns[':p' . $index++]  = 'invoice';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_PO_NUM)) {
            $modifiedColumns[':p' . $index++]  = 'po_num';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }

        $sql = sprintf(
            'INSERT INTO all_inventory (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'account_manager':
                        $stmt->bindValue($identifier, $this->account_manager, PDO::PARAM_STR);
                        break;
                    case 'tag_number':
                        $stmt->bindValue($identifier, $this->tag_number, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date ? $this->date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'building_num':
                        $stmt->bindValue($identifier, $this->building_num, PDO::PARAM_INT);
                        break;
                    case 'building_name':
                        $stmt->bindValue($identifier, $this->building_name, PDO::PARAM_STR);
                        break;
                    case 'room_num':
                        $stmt->bindValue($identifier, $this->room_num, PDO::PARAM_STR);
                        break;
                    case 'asset_key':
                        $stmt->bindValue($identifier, $this->asset_key, PDO::PARAM_INT);
                        break;
                    case 'asset_description':
                        $stmt->bindValue($identifier, $this->asset_description, PDO::PARAM_STR);
                        break;
                    case 'cost':
                        $stmt->bindValue($identifier, $this->cost, PDO::PARAM_INT);
                        break;
                    case 'serial_num':
                        $stmt->bindValue($identifier, $this->serial_num, PDO::PARAM_STR);
                        break;
                    case 'invoice':
                        $stmt->bindValue($identifier, $this->invoice, PDO::PARAM_STR);
                        break;
                    case 'po_num':
                        $stmt->bindValue($identifier, $this->po_num, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AllInventoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getAccountManager();
                break;
            case 1:
                return $this->getTagNumber();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getBuildingNum();
                break;
            case 5:
                return $this->getBuildingName();
                break;
            case 6:
                return $this->getRoomNum();
                break;
            case 7:
                return $this->getAssetKey();
                break;
            case 8:
                return $this->getAssetDescription();
                break;
            case 9:
                return $this->getCost();
                break;
            case 10:
                return $this->getSerialNum();
                break;
            case 11:
                return $this->getInvoice();
                break;
            case 12:
                return $this->getPoNum();
                break;
            case 13:
                return $this->getStatus();
                break;
            case 14:
                return $this->getComment();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['AllInventory'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AllInventory'][$this->hashCode()] = true;
        $keys = AllInventoryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAccountManager(),
            $keys[1] => $this->getTagNumber(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getBuildingNum(),
            $keys[5] => $this->getBuildingName(),
            $keys[6] => $this->getRoomNum(),
            $keys[7] => $this->getAssetKey(),
            $keys[8] => $this->getAssetDescription(),
            $keys[9] => $this->getCost(),
            $keys[10] => $this->getSerialNum(),
            $keys[11] => $this->getInvoice(),
            $keys[12] => $this->getPoNum(),
            $keys[13] => $this->getStatus(),
            $keys[14] => $this->getComment(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\AllInventory
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AllInventoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\AllInventory
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setAccountManager($value);
                break;
            case 1:
                $this->setTagNumber($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setBuildingNum($value);
                break;
            case 5:
                $this->setBuildingName($value);
                break;
            case 6:
                $this->setRoomNum($value);
                break;
            case 7:
                $this->setAssetKey($value);
                break;
            case 8:
                $this->setAssetDescription($value);
                break;
            case 9:
                $this->setCost($value);
                break;
            case 10:
                $this->setSerialNum($value);
                break;
            case 11:
                $this->setInvoice($value);
                break;
            case 12:
                $this->setPoNum($value);
                break;
            case 13:
                $this->setStatus($value);
                break;
            case 14:
                $this->setComment($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AllInventoryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setAccountManager($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTagNumber($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setBuildingNum($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBuildingName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRoomNum($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAssetKey($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAssetDescription($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCost($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSerialNum($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setInvoice($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPoNum($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setStatus($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setComment($arr[$keys[14]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\AllInventory The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AllInventoryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AllInventoryTableMap::COL_ACCOUNT_MANAGER)) {
            $criteria->add(AllInventoryTableMap::COL_ACCOUNT_MANAGER, $this->account_manager);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_TAG_NUMBER)) {
            $criteria->add(AllInventoryTableMap::COL_TAG_NUMBER, $this->tag_number);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_DATE)) {
            $criteria->add(AllInventoryTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_DESCRIPTION)) {
            $criteria->add(AllInventoryTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_BUILDING_NUM)) {
            $criteria->add(AllInventoryTableMap::COL_BUILDING_NUM, $this->building_num);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_BUILDING_NAME)) {
            $criteria->add(AllInventoryTableMap::COL_BUILDING_NAME, $this->building_name);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ROOM_NUM)) {
            $criteria->add(AllInventoryTableMap::COL_ROOM_NUM, $this->room_num);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ASSET_KEY)) {
            $criteria->add(AllInventoryTableMap::COL_ASSET_KEY, $this->asset_key);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_ASSET_DESCRIPTION)) {
            $criteria->add(AllInventoryTableMap::COL_ASSET_DESCRIPTION, $this->asset_description);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_COST)) {
            $criteria->add(AllInventoryTableMap::COL_COST, $this->cost);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_SERIAL_NUM)) {
            $criteria->add(AllInventoryTableMap::COL_SERIAL_NUM, $this->serial_num);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_INVOICE)) {
            $criteria->add(AllInventoryTableMap::COL_INVOICE, $this->invoice);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_PO_NUM)) {
            $criteria->add(AllInventoryTableMap::COL_PO_NUM, $this->po_num);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_STATUS)) {
            $criteria->add(AllInventoryTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AllInventoryTableMap::COL_COMMENT)) {
            $criteria->add(AllInventoryTableMap::COL_COMMENT, $this->comment);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAllInventoryQuery::create();
        $criteria->add(AllInventoryTableMap::COL_TAG_NUMBER, $this->tag_number);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getTagNumber();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTagNumber();
    }

    /**
     * Generic method to set the primary key (tag_number column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTagNumber($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTagNumber();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \AllInventory (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAccountManager($this->getAccountManager());
        $copyObj->setTagNumber($this->getTagNumber());
        $copyObj->setDate($this->getDate());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setBuildingNum($this->getBuildingNum());
        $copyObj->setBuildingName($this->getBuildingName());
        $copyObj->setRoomNum($this->getRoomNum());
        $copyObj->setAssetKey($this->getAssetKey());
        $copyObj->setAssetDescription($this->getAssetDescription());
        $copyObj->setCost($this->getCost());
        $copyObj->setSerialNum($this->getSerialNum());
        $copyObj->setInvoice($this->getInvoice());
        $copyObj->setPoNum($this->getPoNum());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setComment($this->getComment());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \AllInventory Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->account_manager = null;
        $this->tag_number = null;
        $this->date = null;
        $this->description = null;
        $this->building_num = null;
        $this->building_name = null;
        $this->room_num = null;
        $this->asset_key = null;
        $this->asset_description = null;
        $this->cost = null;
        $this->serial_num = null;
        $this->invoice = null;
        $this->po_num = null;
        $this->status = null;
        $this->comment = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AllInventoryTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
