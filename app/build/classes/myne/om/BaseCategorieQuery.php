<?php


/**
 * Base class that represents a query for the 'categorie' table.
 *
 *
 *
 * @method CategorieQuery orderByIdCategorie($order = Criteria::ASC) Order by the id_categorie column
 * @method CategorieQuery orderByNameCategorie($order = Criteria::ASC) Order by the name_categorie column
 *
 * @method CategorieQuery groupByIdCategorie() Group by the id_categorie column
 * @method CategorieQuery groupByNameCategorie() Group by the name_categorie column
 *
 * @method CategorieQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CategorieQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CategorieQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CategorieQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method CategorieQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method CategorieQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method Categorie findOne(PropelPDO $con = null) Return the first Categorie matching the query
 * @method Categorie findOneOrCreate(PropelPDO $con = null) Return the first Categorie matching the query, or a new Categorie object populated from the query conditions when no match is found
 *
 * @method Categorie findOneByNameCategorie(string $name_categorie) Return the first Categorie filtered by the name_categorie column
 *
 * @method array findByIdCategorie(int $id_categorie) Return Categorie objects filtered by the id_categorie column
 * @method array findByNameCategorie(string $name_categorie) Return Categorie objects filtered by the name_categorie column
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseCategorieQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCategorieQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'Categorie';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategorieQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CategorieQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategorieQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategorieQuery) {
            return $criteria;
        }
        $query = new CategorieQuery(null, null, $modelAlias);

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
     * @return   Categorie|Categorie[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoriePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoriePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Categorie A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategorie($key, $con = null)
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
     * @return                 Categorie A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_categorie`, `name_categorie` FROM `categorie` WHERE `id_categorie` = :p0';
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
            $obj = new Categorie();
            $obj->hydrate($row);
            CategoriePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Categorie|Categorie[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Categorie[]|mixed the list of results, formatted by the current formatter
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
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_categorie column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategorie(1234); // WHERE id_categorie = 1234
     * $query->filterByIdCategorie(array(12, 34)); // WHERE id_categorie IN (12, 34)
     * $query->filterByIdCategorie(array('min' => 12)); // WHERE id_categorie >= 12
     * $query->filterByIdCategorie(array('max' => 12)); // WHERE id_categorie <= 12
     * </code>
     *
     * @param     mixed $idCategorie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByIdCategorie($idCategorie = null, $comparison = null)
    {
        if (is_array($idCategorie)) {
            $useMinMax = false;
            if (isset($idCategorie['min'])) {
                $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $idCategorie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategorie['max'])) {
                $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $idCategorie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $idCategorie, $comparison);
    }

    /**
     * Filter the query on the name_categorie column
     *
     * Example usage:
     * <code>
     * $query->filterByNameCategorie('fooValue');   // WHERE name_categorie = 'fooValue'
     * $query->filterByNameCategorie('%fooValue%'); // WHERE name_categorie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameCategorie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByNameCategorie($nameCategorie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameCategorie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nameCategorie)) {
                $nameCategorie = str_replace('*', '%', $nameCategorie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriePeer::NAME_CATEGORIE, $nameCategorie, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CategorieQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(CategoriePeer::ID_CATEGORIE, $product->getIdCategorie(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            return $this
                ->useProductQuery()
                ->filterByPrimaryKeys($product->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Categorie $categorie Object to remove from the list of results
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function prune($categorie = null)
    {
        if ($categorie) {
            $this->addUsingAlias(CategoriePeer::ID_CATEGORIE, $categorie->getIdCategorie(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
