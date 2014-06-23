<?php


/**
 * Base class that represents a row from the 'review' table.
 *
 *
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseReview extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ReviewPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ReviewPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_review field.
     * @var        int
     */
    protected $id_review;

    /**
     * The value for the id_user field.
     * @var        int
     */
    protected $id_user;

    /**
     * The value for the id_product field.
     * @var        int
     */
    protected $id_product;

    /**
     * The value for the content field.
     * @var        string
     */
    protected $content;

    /**
     * The value for the rate field.
     * @var        int
     */
    protected $rate;

    /**
     * The value for the publication field.
     * @var        int
     */
    protected $publication;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * @var        User
     */
    protected $aUser;

    /**
     * @var        Product
     */
    protected $aProduct;

    /**
     * @var        PropelObjectCollection|Comment[] Collection to store aggregation of Comment objects.
     */
    protected $collComments;
    protected $collCommentsPartial;

    /**
     * @var        PropelObjectCollection|Edition[] Collection to store aggregation of Edition objects.
     */
    protected $collEditions;
    protected $collEditionsPartial;

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
    protected $commentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $editionsScheduledForDeletion = null;

    /**
     * Get the [id_review] column value.
     *
     * @return int
     */
    public function getIdReview()
    {
        return $this->id_review;
    }

    /**
     * Get the [id_user] column value.
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

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
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the [rate] column value.
     *
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get the [publication] column value.
     * 1: only the user can see his reviews 2: only user's friends can see his reviews 3: everyone can see his reviews
     * @return int
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = 'Y-m-d H:i:s')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_review] column.
     *
     * @param int $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setIdReview($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_review !== $v) {
            $this->id_review = $v;
            $this->modifiedColumns[] = ReviewPeer::ID_REVIEW;
        }


        return $this;
    } // setIdReview()

    /**
     * Set the value of [id_user] column.
     *
     * @param int $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setIdUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_user !== $v) {
            $this->id_user = $v;
            $this->modifiedColumns[] = ReviewPeer::ID_USER;
        }

        if ($this->aUser !== null && $this->aUser->getIdUser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIdUser()

    /**
     * Set the value of [id_product] column.
     *
     * @param int $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setIdProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_product !== $v) {
            $this->id_product = $v;
            $this->modifiedColumns[] = ReviewPeer::ID_PRODUCT;
        }

        if ($this->aProduct !== null && $this->aProduct->getIdProduct() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setIdProduct()

    /**
     * Set the value of [content] column.
     *
     * @param string $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[] = ReviewPeer::CONTENT;
        }


        return $this;
    } // setContent()

    /**
     * Set the value of [rate] column.
     *
     * @param int $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setRate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rate !== $v) {
            $this->rate = $v;
            $this->modifiedColumns[] = ReviewPeer::RATE;
        }


        return $this;
    } // setRate()

    /**
     * Set the value of [publication] column.
     * 1: only the user can see his reviews 2: only user's friends can see his reviews 3: everyone can see his reviews
     * @param int $v new value
     * @return Review The current object (for fluent API support)
     */
    public function setPublication($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->publication !== $v) {
            $this->publication = $v;
            $this->modifiedColumns[] = ReviewPeer::PUBLICATION;
        }


        return $this;
    } // setPublication()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Review The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = ReviewPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_review = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->id_user = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->id_product = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->content = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->rate = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->publication = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = ReviewPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Review object", $e);
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

        if ($this->aUser !== null && $this->id_user !== $this->aUser->getIdUser()) {
            $this->aUser = null;
        }
        if ($this->aProduct !== null && $this->id_product !== $this->aProduct->getIdProduct()) {
            $this->aProduct = null;
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
            $con = Propel::getConnection(ReviewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ReviewPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->aProduct = null;
            $this->collComments = null;

            $this->collEditions = null;

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
            $con = Propel::getConnection(ReviewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ReviewQuery::create()
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
            $con = Propel::getConnection(ReviewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ReviewPeer::addInstanceToPool($this);
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
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

            if ($this->aProduct !== null) {
                if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
                    $affectedRows += $this->aProduct->save($con);
                }
                $this->setProduct($this->aProduct);
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

            if ($this->commentsScheduledForDeletion !== null) {
                if (!$this->commentsScheduledForDeletion->isEmpty()) {
                    CommentQuery::create()
                        ->filterByPrimaryKeys($this->commentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->commentsScheduledForDeletion = null;
                }
            }

            if ($this->collComments !== null) {
                foreach ($this->collComments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->editionsScheduledForDeletion !== null) {
                if (!$this->editionsScheduledForDeletion->isEmpty()) {
                    EditionQuery::create()
                        ->filterByPrimaryKeys($this->editionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->editionsScheduledForDeletion = null;
                }
            }

            if ($this->collEditions !== null) {
                foreach ($this->collEditions as $referrerFK) {
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

        $this->modifiedColumns[] = ReviewPeer::ID_REVIEW;
        if (null !== $this->id_review) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ReviewPeer::ID_REVIEW . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ReviewPeer::ID_REVIEW)) {
            $modifiedColumns[':p' . $index++]  = '`id_review`';
        }
        if ($this->isColumnModified(ReviewPeer::ID_USER)) {
            $modifiedColumns[':p' . $index++]  = '`id_user`';
        }
        if ($this->isColumnModified(ReviewPeer::ID_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_product`';
        }
        if ($this->isColumnModified(ReviewPeer::CONTENT)) {
            $modifiedColumns[':p' . $index++]  = '`content`';
        }
        if ($this->isColumnModified(ReviewPeer::RATE)) {
            $modifiedColumns[':p' . $index++]  = '`rate`';
        }
        if ($this->isColumnModified(ReviewPeer::PUBLICATION)) {
            $modifiedColumns[':p' . $index++]  = '`publication`';
        }
        if ($this->isColumnModified(ReviewPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`date`';
        }

        $sql = sprintf(
            'INSERT INTO `review` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_review`':
                        $stmt->bindValue($identifier, $this->id_review, PDO::PARAM_INT);
                        break;
                    case '`id_user`':
                        $stmt->bindValue($identifier, $this->id_user, PDO::PARAM_INT);
                        break;
                    case '`id_product`':
                        $stmt->bindValue($identifier, $this->id_product, PDO::PARAM_INT);
                        break;
                    case '`content`':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
                        break;
                    case '`rate`':
                        $stmt->bindValue($identifier, $this->rate, PDO::PARAM_INT);
                        break;
                    case '`publication`':
                        $stmt->bindValue($identifier, $this->publication, PDO::PARAM_INT);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
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
        $this->setIdReview($pk);

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
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }

            if ($this->aProduct !== null) {
                if (!$this->aProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
                }
            }


            if (($retval = ReviewPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collComments !== null) {
                    foreach ($this->collComments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEditions !== null) {
                    foreach ($this->collEditions as $referrerFK) {
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
        $pos = ReviewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdReview();
                break;
            case 1:
                return $this->getIdUser();
                break;
            case 2:
                return $this->getIdProduct();
                break;
            case 3:
                return $this->getContent();
                break;
            case 4:
                return $this->getRate();
                break;
            case 5:
                return $this->getPublication();
                break;
            case 6:
                return $this->getDate();
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
        if (isset($alreadyDumpedObjects['Review'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Review'][serialize($this->getPrimaryKey())] = true;
        $keys = ReviewPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdReview(),
            $keys[1] => $this->getIdUser(),
            $keys[2] => $this->getIdProduct(),
            $keys[3] => $this->getContent(),
            $keys[4] => $this->getRate(),
            $keys[5] => $this->getPublication(),
            $keys[6] => $this->getDate(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProduct) {
                $result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collComments) {
                $result['Comments'] = $this->collComments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEditions) {
                $result['Editions'] = $this->collEditions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ReviewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdReview($value);
                break;
            case 1:
                $this->setIdUser($value);
                break;
            case 2:
                $this->setIdProduct($value);
                break;
            case 3:
                $this->setContent($value);
                break;
            case 4:
                $this->setRate($value);
                break;
            case 5:
                $this->setPublication($value);
                break;
            case 6:
                $this->setDate($value);
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
        $keys = ReviewPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdReview($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdUser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdProduct($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setContent($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPublication($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDate($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ReviewPeer::DATABASE_NAME);

        if ($this->isColumnModified(ReviewPeer::ID_REVIEW)) $criteria->add(ReviewPeer::ID_REVIEW, $this->id_review);
        if ($this->isColumnModified(ReviewPeer::ID_USER)) $criteria->add(ReviewPeer::ID_USER, $this->id_user);
        if ($this->isColumnModified(ReviewPeer::ID_PRODUCT)) $criteria->add(ReviewPeer::ID_PRODUCT, $this->id_product);
        if ($this->isColumnModified(ReviewPeer::CONTENT)) $criteria->add(ReviewPeer::CONTENT, $this->content);
        if ($this->isColumnModified(ReviewPeer::RATE)) $criteria->add(ReviewPeer::RATE, $this->rate);
        if ($this->isColumnModified(ReviewPeer::PUBLICATION)) $criteria->add(ReviewPeer::PUBLICATION, $this->publication);
        if ($this->isColumnModified(ReviewPeer::DATE)) $criteria->add(ReviewPeer::DATE, $this->date);

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
        $criteria = new Criteria(ReviewPeer::DATABASE_NAME);
        $criteria->add(ReviewPeer::ID_REVIEW, $this->id_review);
        $criteria->add(ReviewPeer::ID_USER, $this->id_user);
        $criteria->add(ReviewPeer::ID_PRODUCT, $this->id_product);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getIdReview();
        $pks[1] = $this->getIdUser();
        $pks[2] = $this->getIdProduct();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setIdReview($keys[0]);
        $this->setIdUser($keys[1]);
        $this->setIdProduct($keys[2]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdReview()) && (null === $this->getIdUser()) && (null === $this->getIdProduct());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Review (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdUser($this->getIdUser());
        $copyObj->setIdProduct($this->getIdProduct());
        $copyObj->setContent($this->getContent());
        $copyObj->setRate($this->getRate());
        $copyObj->setPublication($this->getPublication());
        $copyObj->setDate($this->getDate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getComments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addComment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEditions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEdition($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdReview(NULL); // this is a auto-increment column, so set to default value
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
     * @return Review Clone of current object.
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
     * @return ReviewPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ReviewPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return Review The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setIdUser(NULL);
        } else {
            $this->setIdUser($v->getIdUser());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addReview($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && ($this->id_user !== null) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->id_user, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addReviews($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Declares an association between this object and a Product object.
     *
     * @param             Product $v
     * @return Review The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduct(Product $v = null)
    {
        if ($v === null) {
            $this->setIdProduct(NULL);
        } else {
            $this->setIdProduct($v->getIdProduct());
        }

        $this->aProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Product object, it will not be re-added.
        if ($v !== null) {
            $v->addReview($this);
        }


        return $this;
    }


    /**
     * Get the associated Product object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Product The associated Product object.
     * @throws PropelException
     */
    public function getProduct(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProduct === null && ($this->id_product !== null) && $doQuery) {
            $this->aProduct = ProductQuery::create()->findPk($this->id_product, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProduct->addReviews($this);
             */
        }

        return $this->aProduct;
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
        if ('Comment' == $relationName) {
            $this->initComments();
        }
        if ('Edition' == $relationName) {
            $this->initEditions();
        }
    }

    /**
     * Clears out the collComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Review The current object (for fluent API support)
     * @see        addComments()
     */
    public function clearComments()
    {
        $this->collComments = null; // important to set this to null since that means it is uninitialized
        $this->collCommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collComments collection loaded partially
     *
     * @return void
     */
    public function resetPartialComments($v = true)
    {
        $this->collCommentsPartial = $v;
    }

    /**
     * Initializes the collComments collection.
     *
     * By default this just sets the collComments collection to an empty array (like clearcollComments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initComments($overrideExisting = true)
    {
        if (null !== $this->collComments && !$overrideExisting) {
            return;
        }
        $this->collComments = new PropelObjectCollection();
        $this->collComments->setModel('Comment');
    }

    /**
     * Gets an array of Comment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Review is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Comment[] List of Comment objects
     * @throws PropelException
     */
    public function getComments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCommentsPartial && !$this->isNew();
        if (null === $this->collComments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collComments) {
                // return empty collection
                $this->initComments();
            } else {
                $collComments = CommentQuery::create(null, $criteria)
                    ->filterByReview($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCommentsPartial && count($collComments)) {
                      $this->initComments(false);

                      foreach($collComments as $obj) {
                        if (false == $this->collComments->contains($obj)) {
                          $this->collComments->append($obj);
                        }
                      }

                      $this->collCommentsPartial = true;
                    }

                    $collComments->getInternalIterator()->rewind();
                    return $collComments;
                }

                if($partial && $this->collComments) {
                    foreach($this->collComments as $obj) {
                        if($obj->isNew()) {
                            $collComments[] = $obj;
                        }
                    }
                }

                $this->collComments = $collComments;
                $this->collCommentsPartial = false;
            }
        }

        return $this->collComments;
    }

    /**
     * Sets a collection of Comment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $comments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Review The current object (for fluent API support)
     */
    public function setComments(PropelCollection $comments, PropelPDO $con = null)
    {
        $commentsToDelete = $this->getComments(new Criteria(), $con)->diff($comments);

        $this->commentsScheduledForDeletion = unserialize(serialize($commentsToDelete));

        foreach ($commentsToDelete as $commentRemoved) {
            $commentRemoved->setReview(null);
        }

        $this->collComments = null;
        foreach ($comments as $comment) {
            $this->addComment($comment);
        }

        $this->collComments = $comments;
        $this->collCommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Comment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Comment objects.
     * @throws PropelException
     */
    public function countComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCommentsPartial && !$this->isNew();
        if (null === $this->collComments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collComments) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getComments());
            }
            $query = CommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByReview($this)
                ->count($con);
        }

        return count($this->collComments);
    }

    /**
     * Method called to associate a Comment object to this object
     * through the Comment foreign key attribute.
     *
     * @param    Comment $l Comment
     * @return Review The current object (for fluent API support)
     */
    public function addComment(Comment $l)
    {
        if ($this->collComments === null) {
            $this->initComments();
            $this->collCommentsPartial = true;
        }
        if (!in_array($l, $this->collComments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddComment($l);
        }

        return $this;
    }

    /**
     * @param	Comment $comment The comment object to add.
     */
    protected function doAddComment($comment)
    {
        $this->collComments[]= $comment;
        $comment->setReview($this);
    }

    /**
     * @param	Comment $comment The comment object to remove.
     * @return Review The current object (for fluent API support)
     */
    public function removeComment($comment)
    {
        if ($this->getComments()->contains($comment)) {
            $this->collComments->remove($this->collComments->search($comment));
            if (null === $this->commentsScheduledForDeletion) {
                $this->commentsScheduledForDeletion = clone $this->collComments;
                $this->commentsScheduledForDeletion->clear();
            }
            $this->commentsScheduledForDeletion[]= clone $comment;
            $comment->setReview(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Review is new, it will return
     * an empty collection; or if this Review has previously
     * been saved, it will retrieve related Comments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Review.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comment[] List of Comment objects
     */
    public function getCommentsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CommentQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getComments($query, $con);
    }

    /**
     * Clears out the collEditions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Review The current object (for fluent API support)
     * @see        addEditions()
     */
    public function clearEditions()
    {
        $this->collEditions = null; // important to set this to null since that means it is uninitialized
        $this->collEditionsPartial = null;

        return $this;
    }

    /**
     * reset is the collEditions collection loaded partially
     *
     * @return void
     */
    public function resetPartialEditions($v = true)
    {
        $this->collEditionsPartial = $v;
    }

    /**
     * Initializes the collEditions collection.
     *
     * By default this just sets the collEditions collection to an empty array (like clearcollEditions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEditions($overrideExisting = true)
    {
        if (null !== $this->collEditions && !$overrideExisting) {
            return;
        }
        $this->collEditions = new PropelObjectCollection();
        $this->collEditions->setModel('Edition');
    }

    /**
     * Gets an array of Edition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Review is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Edition[] List of Edition objects
     * @throws PropelException
     */
    public function getEditions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEditionsPartial && !$this->isNew();
        if (null === $this->collEditions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEditions) {
                // return empty collection
                $this->initEditions();
            } else {
                $collEditions = EditionQuery::create(null, $criteria)
                    ->filterByReview($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEditionsPartial && count($collEditions)) {
                      $this->initEditions(false);

                      foreach($collEditions as $obj) {
                        if (false == $this->collEditions->contains($obj)) {
                          $this->collEditions->append($obj);
                        }
                      }

                      $this->collEditionsPartial = true;
                    }

                    $collEditions->getInternalIterator()->rewind();
                    return $collEditions;
                }

                if($partial && $this->collEditions) {
                    foreach($this->collEditions as $obj) {
                        if($obj->isNew()) {
                            $collEditions[] = $obj;
                        }
                    }
                }

                $this->collEditions = $collEditions;
                $this->collEditionsPartial = false;
            }
        }

        return $this->collEditions;
    }

    /**
     * Sets a collection of Edition objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $editions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Review The current object (for fluent API support)
     */
    public function setEditions(PropelCollection $editions, PropelPDO $con = null)
    {
        $editionsToDelete = $this->getEditions(new Criteria(), $con)->diff($editions);

        $this->editionsScheduledForDeletion = unserialize(serialize($editionsToDelete));

        foreach ($editionsToDelete as $editionRemoved) {
            $editionRemoved->setReview(null);
        }

        $this->collEditions = null;
        foreach ($editions as $edition) {
            $this->addEdition($edition);
        }

        $this->collEditions = $editions;
        $this->collEditionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Edition objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Edition objects.
     * @throws PropelException
     */
    public function countEditions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEditionsPartial && !$this->isNew();
        if (null === $this->collEditions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEditions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getEditions());
            }
            $query = EditionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByReview($this)
                ->count($con);
        }

        return count($this->collEditions);
    }

    /**
     * Method called to associate a Edition object to this object
     * through the Edition foreign key attribute.
     *
     * @param    Edition $l Edition
     * @return Review The current object (for fluent API support)
     */
    public function addEdition(Edition $l)
    {
        if ($this->collEditions === null) {
            $this->initEditions();
            $this->collEditionsPartial = true;
        }
        if (!in_array($l, $this->collEditions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEdition($l);
        }

        return $this;
    }

    /**
     * @param	Edition $edition The edition object to add.
     */
    protected function doAddEdition($edition)
    {
        $this->collEditions[]= $edition;
        $edition->setReview($this);
    }

    /**
     * @param	Edition $edition The edition object to remove.
     * @return Review The current object (for fluent API support)
     */
    public function removeEdition($edition)
    {
        if ($this->getEditions()->contains($edition)) {
            $this->collEditions->remove($this->collEditions->search($edition));
            if (null === $this->editionsScheduledForDeletion) {
                $this->editionsScheduledForDeletion = clone $this->collEditions;
                $this->editionsScheduledForDeletion->clear();
            }
            $this->editionsScheduledForDeletion[]= clone $edition;
            $edition->setReview(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_review = null;
        $this->id_user = null;
        $this->id_product = null;
        $this->content = null;
        $this->rate = null;
        $this->publication = null;
        $this->date = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collComments) {
                foreach ($this->collComments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEditions) {
                foreach ($this->collEditions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }
            if ($this->aProduct instanceof Persistent) {
              $this->aProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collComments instanceof PropelCollection) {
            $this->collComments->clearIterator();
        }
        $this->collComments = null;
        if ($this->collEditions instanceof PropelCollection) {
            $this->collEditions->clearIterator();
        }
        $this->collEditions = null;
        $this->aUser = null;
        $this->aProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ReviewPeer::DEFAULT_STRING_FORMAT);
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
