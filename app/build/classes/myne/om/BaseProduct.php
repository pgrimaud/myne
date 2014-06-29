<?php


/**
 * Base class that represents a row from the 'product' table.
 *
 *
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseProduct extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_product field.
     * @var        int
     */
    protected $id_product;

    /**
     * The value for the ean_code field.
     * @var        string
     */
    protected $ean_code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the id_categorie field.
     * @var        int
     */
    protected $id_categorie;

    /**
     * The value for the brand field.
     * @var        string
     */
    protected $brand;

    /**
     * The value for the link_image field.
     * @var        string
     */
    protected $link_image;

    /**
     * @var        Categorie
     */
    protected $aCategorie;

    /**
     * @var        PropelObjectCollection|Review[] Collection to store aggregation of Review objects.
     */
    protected $collReviews;
    protected $collReviewsPartial;

    /**
     * @var        PropelObjectCollection|CustomerProduct[] Collection to store aggregation of CustomerProduct objects.
     */
    protected $collCustomerProducts;
    protected $collCustomerProductsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $reviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $customerProductsScheduledForDeletion = null;

    /**
     * Get the [id_product] column value.
     *
     * @return int
     */
    public function getIdProduct()
    {

        return $this->id_product;
    }

    /**
     * Get the [ean_code] column value.
     *
     * @return string
     */
    public function getEanCode()
    {

        return $this->ean_code;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [id_categorie] column value.
     *
     * @return int
     */
    public function getIdCategorie()
    {

        return $this->id_categorie;
    }

    /**
     * Get the [brand] column value.
     *
     * @return string
     */
    public function getBrand()
    {

        return $this->brand;
    }

    /**
     * Get the [link_image] column value.
     *
     * @return string
     */
    public function getLinkImage()
    {

        return $this->link_image;
    }

    /**
     * Set the value of [id_product] column.
     *
     * @param  int $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setIdProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_product !== $v) {
            $this->id_product = $v;
            $this->modifiedColumns[] = ProductPeer::ID_PRODUCT;
        }


        return $this;
    } // setIdProduct()

    /**
     * Set the value of [ean_code] column.
     *
     * @param  string $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setEanCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ean_code !== $v) {
            $this->ean_code = $v;
            $this->modifiedColumns[] = ProductPeer::EAN_CODE;
        }


        return $this;
    } // setEanCode()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProductPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [id_categorie] column.
     *
     * @param  int $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setIdCategorie($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_categorie !== $v) {
            $this->id_categorie = $v;
            $this->modifiedColumns[] = ProductPeer::ID_CATEGORIE;
        }

        if ($this->aCategorie !== null && $this->aCategorie->getIdCategorie() !== $v) {
            $this->aCategorie = null;
        }


        return $this;
    } // setIdCategorie()

    /**
     * Set the value of [brand] column.
     *
     * @param  string $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setBrand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->brand !== $v) {
            $this->brand = $v;
            $this->modifiedColumns[] = ProductPeer::BRAND;
        }


        return $this;
    } // setBrand()

    /**
     * Set the value of [link_image] column.
     *
     * @param  string $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setLinkImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->link_image !== $v) {
            $this->link_image = $v;
            $this->modifiedColumns[] = ProductPeer::LINK_IMAGE;
        }


        return $this;
    } // setLinkImage()

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
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_product = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->ean_code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->id_categorie = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->brand = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->link_image = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = ProductPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Product object", $e);
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

        if ($this->aCategorie !== null && $this->id_categorie !== $this->aCategorie->getIdCategorie()) {
            $this->aCategorie = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategorie = null;
            $this->collReviews = null;

            $this->collCustomerProducts = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
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
                ProductPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategorie !== null) {
                if ($this->aCategorie->isModified() || $this->aCategorie->isNew()) {
                    $affectedRows += $this->aCategorie->save($con);
                }
                $this->setCategorie($this->aCategorie);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->reviewsScheduledForDeletion !== null) {
                if (!$this->reviewsScheduledForDeletion->isEmpty()) {
                    ReviewQuery::create()
                        ->filterByPrimaryKeys($this->reviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->reviewsScheduledForDeletion = null;
                }
            }

            if ($this->collReviews !== null) {
                foreach ($this->collReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->customerProductsScheduledForDeletion !== null) {
                if (!$this->customerProductsScheduledForDeletion->isEmpty()) {
                    CustomerProductQuery::create()
                        ->filterByPrimaryKeys($this->customerProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->customerProductsScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerProducts !== null) {
                foreach ($this->collCustomerProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ProductPeer::ID_PRODUCT;
        if (null !== $this->id_product) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductPeer::ID_PRODUCT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductPeer::ID_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_product`';
        }
        if ($this->isColumnModified(ProductPeer::EAN_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`ean_code`';
        }
        if ($this->isColumnModified(ProductPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProductPeer::ID_CATEGORIE)) {
            $modifiedColumns[':p' . $index++]  = '`id_categorie`';
        }
        if ($this->isColumnModified(ProductPeer::BRAND)) {
            $modifiedColumns[':p' . $index++]  = '`brand`';
        }
        if ($this->isColumnModified(ProductPeer::LINK_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = '`link_image`';
        }

        $sql = sprintf(
            'INSERT INTO `product` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_product`':
                        $stmt->bindValue($identifier, $this->id_product, PDO::PARAM_INT);
                        break;
                    case '`ean_code`':
                        $stmt->bindValue($identifier, $this->ean_code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`id_categorie`':
                        $stmt->bindValue($identifier, $this->id_categorie, PDO::PARAM_INT);
                        break;
                    case '`brand`':
                        $stmt->bindValue($identifier, $this->brand, PDO::PARAM_STR);
                        break;
                    case '`link_image`':
                        $stmt->bindValue($identifier, $this->link_image, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdProduct($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategorie !== null) {
                if (!$this->aCategorie->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategorie->getValidationFailures());
                }
            }


            if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collReviews !== null) {
                    foreach ($this->collReviews as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCustomerProducts !== null) {
                    foreach ($this->collCustomerProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdProduct();
                break;
            case 1:
                return $this->getEanCode();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getIdCategorie();
                break;
            case 4:
                return $this->getBrand();
                break;
            case 5:
                return $this->getLinkImage();
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Product'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Product'][$this->getPrimaryKey()] = true;
        $keys = ProductPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProduct(),
            $keys[1] => $this->getEanCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getIdCategorie(),
            $keys[4] => $this->getBrand(),
            $keys[5] => $this->getLinkImage(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCategorie) {
                $result['Categorie'] = $this->aCategorie->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collReviews) {
                $result['Reviews'] = $this->collReviews->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCustomerProducts) {
                $result['CustomerProducts'] = $this->collCustomerProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProduct($value);
                break;
            case 1:
                $this->setEanCode($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setIdCategorie($value);
                break;
            case 4:
                $this->setBrand($value);
                break;
            case 5:
                $this->setLinkImage($value);
                break;
        } // switch()
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
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ProductPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdProduct($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEanCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdCategorie($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBrand($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLinkImage($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductPeer::ID_PRODUCT)) $criteria->add(ProductPeer::ID_PRODUCT, $this->id_product);
        if ($this->isColumnModified(ProductPeer::EAN_CODE)) $criteria->add(ProductPeer::EAN_CODE, $this->ean_code);
        if ($this->isColumnModified(ProductPeer::NAME)) $criteria->add(ProductPeer::NAME, $this->name);
        if ($this->isColumnModified(ProductPeer::ID_CATEGORIE)) $criteria->add(ProductPeer::ID_CATEGORIE, $this->id_categorie);
        if ($this->isColumnModified(ProductPeer::BRAND)) $criteria->add(ProductPeer::BRAND, $this->brand);
        if ($this->isColumnModified(ProductPeer::LINK_IMAGE)) $criteria->add(ProductPeer::LINK_IMAGE, $this->link_image);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ProductPeer::DATABASE_NAME);
        $criteria->add(ProductPeer::ID_PRODUCT, $this->id_product);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdProduct();
    }

    /**
     * Generic method to set the primary key (id_product column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProduct($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdProduct();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Product (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEanCode($this->getEanCode());
        $copyObj->setName($this->getName());
        $copyObj->setIdCategorie($this->getIdCategorie());
        $copyObj->setBrand($this->getBrand());
        $copyObj->setLinkImage($this->getLinkImage());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCustomerProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerProduct($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProduct(NULL); // this is a auto-increment column, so set to default value
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Product Clone of current object.
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
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ProductPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Categorie object.
     *
     * @param                  Categorie $v
     * @return Product The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategorie(Categorie $v = null)
    {
        if ($v === null) {
            $this->setIdCategorie(NULL);
        } else {
            $this->setIdCategorie($v->getIdCategorie());
        }

        $this->aCategorie = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Categorie object, it will not be re-added.
        if ($v !== null) {
            $v->addProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated Categorie object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Categorie The associated Categorie object.
     * @throws PropelException
     */
    public function getCategorie(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCategorie === null && ($this->id_categorie !== null) && $doQuery) {
            $this->aCategorie = CategorieQuery::create()->findPk($this->id_categorie, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategorie->addProducts($this);
             */
        }

        return $this->aCategorie;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Review' == $relationName) {
            $this->initReviews();
        }
        if ('CustomerProduct' == $relationName) {
            $this->initCustomerProducts();
        }
    }

    /**
     * Clears out the collReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Product The current object (for fluent API support)
     * @see        addReviews()
     */
    public function clearReviews()
    {
        $this->collReviews = null; // important to set this to null since that means it is uninitialized
        $this->collReviewsPartial = null;

        return $this;
    }

    /**
     * reset is the collReviews collection loaded partially
     *
     * @return void
     */
    public function resetPartialReviews($v = true)
    {
        $this->collReviewsPartial = $v;
    }

    /**
     * Initializes the collReviews collection.
     *
     * By default this just sets the collReviews collection to an empty array (like clearcollReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initReviews($overrideExisting = true)
    {
        if (null !== $this->collReviews && !$overrideExisting) {
            return;
        }
        $this->collReviews = new PropelObjectCollection();
        $this->collReviews->setModel('Review');
    }

    /**
     * Gets an array of Review objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Product is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Review[] List of Review objects
     * @throws PropelException
     */
    public function getReviews($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collReviewsPartial && !$this->isNew();
        if (null === $this->collReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collReviews) {
                // return empty collection
                $this->initReviews();
            } else {
                $collReviews = ReviewQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collReviewsPartial && count($collReviews)) {
                      $this->initReviews(false);

                      foreach ($collReviews as $obj) {
                        if (false == $this->collReviews->contains($obj)) {
                          $this->collReviews->append($obj);
                        }
                      }

                      $this->collReviewsPartial = true;
                    }

                    $collReviews->getInternalIterator()->rewind();

                    return $collReviews;
                }

                if ($partial && $this->collReviews) {
                    foreach ($this->collReviews as $obj) {
                        if ($obj->isNew()) {
                            $collReviews[] = $obj;
                        }
                    }
                }

                $this->collReviews = $collReviews;
                $this->collReviewsPartial = false;
            }
        }

        return $this->collReviews;
    }

    /**
     * Sets a collection of Review objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $reviews A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Product The current object (for fluent API support)
     */
    public function setReviews(PropelCollection $reviews, PropelPDO $con = null)
    {
        $reviewsToDelete = $this->getReviews(new Criteria(), $con)->diff($reviews);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->reviewsScheduledForDeletion = clone $reviewsToDelete;

        foreach ($reviewsToDelete as $reviewRemoved) {
            $reviewRemoved->setProduct(null);
        }

        $this->collReviews = null;
        foreach ($reviews as $review) {
            $this->addReview($review);
        }

        $this->collReviews = $reviews;
        $this->collReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Review objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Review objects.
     * @throws PropelException
     */
    public function countReviews(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collReviewsPartial && !$this->isNew();
        if (null === $this->collReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getReviews());
            }
            $query = ReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collReviews);
    }

    /**
     * Method called to associate a Review object to this object
     * through the Review foreign key attribute.
     *
     * @param    Review $l Review
     * @return Product The current object (for fluent API support)
     */
    public function addReview(Review $l)
    {
        if ($this->collReviews === null) {
            $this->initReviews();
            $this->collReviewsPartial = true;
        }

        if (!in_array($l, $this->collReviews->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddReview($l);

            if ($this->reviewsScheduledForDeletion and $this->reviewsScheduledForDeletion->contains($l)) {
                $this->reviewsScheduledForDeletion->remove($this->reviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Review $review The review object to add.
     */
    protected function doAddReview($review)
    {
        $this->collReviews[]= $review;
        $review->setProduct($this);
    }

    /**
     * @param	Review $review The review object to remove.
     * @return Product The current object (for fluent API support)
     */
    public function removeReview($review)
    {
        if ($this->getReviews()->contains($review)) {
            $this->collReviews->remove($this->collReviews->search($review));
            if (null === $this->reviewsScheduledForDeletion) {
                $this->reviewsScheduledForDeletion = clone $this->collReviews;
                $this->reviewsScheduledForDeletion->clear();
            }
            $this->reviewsScheduledForDeletion[]= clone $review;
            $review->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Product is new, it will return
     * an empty collection; or if this Product has previously
     * been saved, it will retrieve related Reviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Product.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Review[] List of Review objects
     */
    public function getReviewsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ReviewQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getReviews($query, $con);
    }

    /**
     * Clears out the collCustomerProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Product The current object (for fluent API support)
     * @see        addCustomerProducts()
     */
    public function clearCustomerProducts()
    {
        $this->collCustomerProducts = null; // important to set this to null since that means it is uninitialized
        $this->collCustomerProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomerProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomerProducts($v = true)
    {
        $this->collCustomerProductsPartial = $v;
    }

    /**
     * Initializes the collCustomerProducts collection.
     *
     * By default this just sets the collCustomerProducts collection to an empty array (like clearcollCustomerProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerProducts($overrideExisting = true)
    {
        if (null !== $this->collCustomerProducts && !$overrideExisting) {
            return;
        }
        $this->collCustomerProducts = new PropelObjectCollection();
        $this->collCustomerProducts->setModel('CustomerProduct');
    }

    /**
     * Gets an array of CustomerProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Product is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CustomerProduct[] List of CustomerProduct objects
     * @throws PropelException
     */
    public function getCustomerProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomerProductsPartial && !$this->isNew();
        if (null === $this->collCustomerProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerProducts) {
                // return empty collection
                $this->initCustomerProducts();
            } else {
                $collCustomerProducts = CustomerProductQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerProductsPartial && count($collCustomerProducts)) {
                      $this->initCustomerProducts(false);

                      foreach ($collCustomerProducts as $obj) {
                        if (false == $this->collCustomerProducts->contains($obj)) {
                          $this->collCustomerProducts->append($obj);
                        }
                      }

                      $this->collCustomerProductsPartial = true;
                    }

                    $collCustomerProducts->getInternalIterator()->rewind();

                    return $collCustomerProducts;
                }

                if ($partial && $this->collCustomerProducts) {
                    foreach ($this->collCustomerProducts as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerProducts[] = $obj;
                        }
                    }
                }

                $this->collCustomerProducts = $collCustomerProducts;
                $this->collCustomerProductsPartial = false;
            }
        }

        return $this->collCustomerProducts;
    }

    /**
     * Sets a collection of CustomerProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customerProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Product The current object (for fluent API support)
     */
    public function setCustomerProducts(PropelCollection $customerProducts, PropelPDO $con = null)
    {
        $customerProductsToDelete = $this->getCustomerProducts(new Criteria(), $con)->diff($customerProducts);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->customerProductsScheduledForDeletion = clone $customerProductsToDelete;

        foreach ($customerProductsToDelete as $customerProductRemoved) {
            $customerProductRemoved->setProduct(null);
        }

        $this->collCustomerProducts = null;
        foreach ($customerProducts as $customerProduct) {
            $this->addCustomerProduct($customerProduct);
        }

        $this->collCustomerProducts = $customerProducts;
        $this->collCustomerProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CustomerProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CustomerProduct objects.
     * @throws PropelException
     */
    public function countCustomerProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerProductsPartial && !$this->isNew();
        if (null === $this->collCustomerProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerProducts());
            }
            $query = CustomerProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collCustomerProducts);
    }

    /**
     * Method called to associate a CustomerProduct object to this object
     * through the CustomerProduct foreign key attribute.
     *
     * @param    CustomerProduct $l CustomerProduct
     * @return Product The current object (for fluent API support)
     */
    public function addCustomerProduct(CustomerProduct $l)
    {
        if ($this->collCustomerProducts === null) {
            $this->initCustomerProducts();
            $this->collCustomerProductsPartial = true;
        }

        if (!in_array($l, $this->collCustomerProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerProduct($l);

            if ($this->customerProductsScheduledForDeletion and $this->customerProductsScheduledForDeletion->contains($l)) {
                $this->customerProductsScheduledForDeletion->remove($this->customerProductsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CustomerProduct $customerProduct The customerProduct object to add.
     */
    protected function doAddCustomerProduct($customerProduct)
    {
        $this->collCustomerProducts[]= $customerProduct;
        $customerProduct->setProduct($this);
    }

    /**
     * @param	CustomerProduct $customerProduct The customerProduct object to remove.
     * @return Product The current object (for fluent API support)
     */
    public function removeCustomerProduct($customerProduct)
    {
        if ($this->getCustomerProducts()->contains($customerProduct)) {
            $this->collCustomerProducts->remove($this->collCustomerProducts->search($customerProduct));
            if (null === $this->customerProductsScheduledForDeletion) {
                $this->customerProductsScheduledForDeletion = clone $this->collCustomerProducts;
                $this->customerProductsScheduledForDeletion->clear();
            }
            $this->customerProductsScheduledForDeletion[]= clone $customerProduct;
            $customerProduct->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Product is new, it will return
     * an empty collection; or if this Product has previously
     * been saved, it will retrieve related CustomerProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Product.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CustomerProduct[] List of CustomerProduct objects
     */
    public function getCustomerProductsJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CustomerProductQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getCustomerProducts($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_product = null;
        $this->ean_code = null;
        $this->name = null;
        $this->id_categorie = null;
        $this->brand = null;
        $this->link_image = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collReviews) {
                foreach ($this->collReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomerProducts) {
                foreach ($this->collCustomerProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCategorie instanceof Persistent) {
              $this->aCategorie->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collReviews instanceof PropelCollection) {
            $this->collReviews->clearIterator();
        }
        $this->collReviews = null;
        if ($this->collCustomerProducts instanceof PropelCollection) {
            $this->collCustomerProducts->clearIterator();
        }
        $this->collCustomerProducts = null;
        $this->aCategorie = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
