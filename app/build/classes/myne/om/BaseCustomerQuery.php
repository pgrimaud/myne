<?php


/**
 * Base class that represents a query for the 'customer' table.
 *
 *
 *
 * @method CustomerQuery orderByIdCustomer($order = Criteria::ASC) Order by the id_customer column
 * @method CustomerQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CustomerQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method CustomerQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method CustomerQuery orderByApiToken($order = Criteria::ASC) Order by the api_token column
 *
 * @method CustomerQuery groupByIdCustomer() Group by the id_customer column
 * @method CustomerQuery groupByName() Group by the name column
 * @method CustomerQuery groupByEmail() Group by the email column
 * @method CustomerQuery groupByPassword() Group by the password column
 * @method CustomerQuery groupByApiToken() Group by the api_token column
 *
 * @method CustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CustomerQuery leftJoinCustomerProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerProduct relation
 * @method CustomerQuery rightJoinCustomerProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerProduct relation
 * @method CustomerQuery innerJoinCustomerProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerProduct relation
 *
 * @method Customer findOne(PropelPDO $con = null) Return the first Customer matching the query
 * @method Customer findOneOrCreate(PropelPDO $con = null) Return the first Customer matching the query, or a new Customer object populated from the query conditions when no match is found
 *
 * @method Customer findOneByName(string $name) Return the first Customer filtered by the name column
 * @method Customer findOneByEmail(string $email) Return the first Customer filtered by the email column
 * @method Customer findOneByPassword(string $password) Return the first Customer filtered by the password column
 * @method Customer findOneByApiToken(string $api_token) Return the first Customer filtered by the api_token column
 *
 * @method array findByIdCustomer(int $id_customer) Return Customer objects filtered by the id_customer column
 * @method array findByName(string $name) Return Customer objects filtered by the name column
 * @method array findByEmail(string $email) Return Customer objects filtered by the email column
 * @method array findByPassword(string $password) Return Customer objects filtered by the password column
 * @method array findByApiToken(string $api_token) Return Customer objects filtered by the api_token column
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseCustomerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCustomerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'myne', $modelName = 'Customer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CustomerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CustomerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CustomerQuery) {
            return $criteria;
        }
        $query = new CustomerQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Customer|Customer[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CustomerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Customer A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCustomer($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Customer A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_customer`, `name`, `email`, `password`, `api_token` FROM `customer` WHERE `id_customer` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Customer();
            $obj->hydrate($row);
            CustomerPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Customer|Customer[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Customer[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomer(1234); // WHERE id_customer = 1234
     * $query->filterByIdCustomer(array(12, 34)); // WHERE id_customer IN (12, 34)
     * $query->filterByIdCustomer(array('min' => 12)); // WHERE id_customer >= 12
     * $query->filterByIdCustomer(array('max' => 12)); // WHERE id_customer <= 12
     * </code>
     *
     * @param     mixed $idCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByIdCustomer($idCustomer = null, $comparison = null)
    {
        if (is_array($idCustomer)) {
            $useMinMax = false;
            if (isset($idCustomer['min'])) {
                $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $idCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomer['max'])) {
                $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $idCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $idCustomer, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the api_token column
     *
     * Example usage:
     * <code>
     * $query->filterByApiToken('fooValue');   // WHERE api_token = 'fooValue'
     * $query->filterByApiToken('%fooValue%'); // WHERE api_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apiToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByApiToken($apiToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apiToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apiToken)) {
                $apiToken = str_replace('*', '%', $apiToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerPeer::API_TOKEN, $apiToken, $comparison);
    }

    /**
     * Filter the query by a related CustomerProduct object
     *
     * @param   CustomerProduct|PropelObjectCollection $customerProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerProduct($customerProduct, $comparison = null)
    {
        if ($customerProduct instanceof CustomerProduct) {
            return $this
                ->addUsingAlias(CustomerPeer::ID_CUSTOMER, $customerProduct->getIdCustomer(), $comparison);
        } elseif ($customerProduct instanceof PropelObjectCollection) {
            return $this
                ->useCustomerProductQuery()
                ->filterByPrimaryKeys($customerProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerProduct() only accepts arguments of type CustomerProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function joinCustomerProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerProduct');

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
            $this->addJoinObject($join, 'CustomerProduct');
        }

        return $this;
    }

    /**
     * Use the CustomerProduct relation CustomerProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CustomerProductQuery A secondary query class using the current class as primary query
     */
    public function useCustomerProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerProduct', 'CustomerProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Customer $customer Object to remove from the list of results
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function prune($customer = null)
    {
        if ($customer) {
            $this->addUsingAlias(CustomerPeer::ID_CUSTOMER, $customer->getIdCustomer(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
