<?php


/**
 * Base class that represents a query for the 'review' table.
 *
 *
 *
 * @method ReviewQuery orderByIdReview($order = Criteria::ASC) Order by the id_review column
 * @method ReviewQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method ReviewQuery orderByIdProduct($order = Criteria::ASC) Order by the id_product column
 * @method ReviewQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method ReviewQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ReviewQuery orderByRate($order = Criteria::ASC) Order by the rate column
 * @method ReviewQuery orderByPublication($order = Criteria::ASC) Order by the publication column
 * @method ReviewQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method ReviewQuery groupByIdReview() Group by the id_review column
 * @method ReviewQuery groupByIdUser() Group by the id_user column
 * @method ReviewQuery groupByIdProduct() Group by the id_product column
 * @method ReviewQuery groupByTitle() Group by the title column
 * @method ReviewQuery groupByContent() Group by the content column
 * @method ReviewQuery groupByRate() Group by the rate column
 * @method ReviewQuery groupByPublication() Group by the publication column
 * @method ReviewQuery groupByDate() Group by the date column
 *
 * @method ReviewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ReviewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ReviewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ReviewQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ReviewQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ReviewQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method ReviewQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ReviewQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ReviewQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ReviewQuery leftJoinComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comment relation
 * @method ReviewQuery rightJoinComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comment relation
 * @method ReviewQuery innerJoinComment($relationAlias = null) Adds a INNER JOIN clause to the query using the Comment relation
 *
 * @method ReviewQuery leftJoinEdition($relationAlias = null) Adds a LEFT JOIN clause to the query using the Edition relation
 * @method ReviewQuery rightJoinEdition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Edition relation
 * @method ReviewQuery innerJoinEdition($relationAlias = null) Adds a INNER JOIN clause to the query using the Edition relation
 *
 * @method Review findOne(PropelPDO $con = null) Return the first Review matching the query
 * @method Review findOneOrCreate(PropelPDO $con = null) Return the first Review matching the query, or a new Review object populated from the query conditions when no match is found
 *
 * @method Review findOneByIdReview(int $id_review) Return the first Review filtered by the id_review column
 * @method Review findOneByIdUser(int $id_user) Return the first Review filtered by the id_user column
 * @method Review findOneByIdProduct(int $id_product) Return the first Review filtered by the id_product column
 * @method Review findOneByTitle(string $title) Return the first Review filtered by the title column
 * @method Review findOneByContent(string $content) Return the first Review filtered by the content column
 * @method Review findOneByRate(int $rate) Return the first Review filtered by the rate column
 * @method Review findOneByPublication(int $publication) Return the first Review filtered by the publication column
 * @method Review findOneByDate(string $date) Return the first Review filtered by the date column
 *
 * @method array findByIdReview(int $id_review) Return Review objects filtered by the id_review column
 * @method array findByIdUser(int $id_user) Return Review objects filtered by the id_user column
 * @method array findByIdProduct(int $id_product) Return Review objects filtered by the id_product column
 * @method array findByTitle(string $title) Return Review objects filtered by the title column
 * @method array findByContent(string $content) Return Review objects filtered by the content column
 * @method array findByRate(int $rate) Return Review objects filtered by the rate column
 * @method array findByPublication(int $publication) Return Review objects filtered by the publication column
 * @method array findByDate(string $date) Return Review objects filtered by the date column
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseReviewQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseReviewQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'myne', $modelName = 'Review', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ReviewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ReviewQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ReviewQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ReviewQuery) {
            return $criteria;
        }
        $query = new ReviewQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id_review, $id_user, $id_product]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Review|Review[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ReviewPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ReviewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Review A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_review`, `id_user`, `id_product`, `title`, `content`, `rate`, `publication`, `date` FROM `review` WHERE `id_review` = :p0 AND `id_user` = :p1 AND `id_product` = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Review();
            $obj->hydrate($row);
            ReviewPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return Review|Review[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Review[]|mixed the list of results, formatted by the current formatter
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
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ReviewPeer::ID_REVIEW, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ReviewPeer::ID_USER, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(ReviewPeer::ID_PRODUCT, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ReviewPeer::ID_REVIEW, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ReviewPeer::ID_USER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(ReviewPeer::ID_PRODUCT, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_review column
     *
     * Example usage:
     * <code>
     * $query->filterByIdReview(1234); // WHERE id_review = 1234
     * $query->filterByIdReview(array(12, 34)); // WHERE id_review IN (12, 34)
     * $query->filterByIdReview(array('min' => 12)); // WHERE id_review >= 12
     * $query->filterByIdReview(array('max' => 12)); // WHERE id_review <= 12
     * </code>
     *
     * @param     mixed $idReview The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByIdReview($idReview = null, $comparison = null)
    {
        if (is_array($idReview)) {
            $useMinMax = false;
            if (isset($idReview['min'])) {
                $this->addUsingAlias(ReviewPeer::ID_REVIEW, $idReview['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idReview['max'])) {
                $this->addUsingAlias(ReviewPeer::ID_REVIEW, $idReview['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::ID_REVIEW, $idReview, $comparison);
    }

    /**
     * Filter the query on the id_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUser(1234); // WHERE id_user = 1234
     * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
     * $query->filterByIdUser(array('min' => 12)); // WHERE id_user >= 12
     * $query->filterByIdUser(array('max' => 12)); // WHERE id_user <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(ReviewPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(ReviewPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::ID_USER, $idUser, $comparison);
    }

    /**
     * Filter the query on the id_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProduct(1234); // WHERE id_product = 1234
     * $query->filterByIdProduct(array(12, 34)); // WHERE id_product IN (12, 34)
     * $query->filterByIdProduct(array('min' => 12)); // WHERE id_product >= 12
     * $query->filterByIdProduct(array('max' => 12)); // WHERE id_product <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $idProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByIdProduct($idProduct = null, $comparison = null)
    {
        if (is_array($idProduct)) {
            $useMinMax = false;
            if (isset($idProduct['min'])) {
                $this->addUsingAlias(ReviewPeer::ID_PRODUCT, $idProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduct['max'])) {
                $this->addUsingAlias(ReviewPeer::ID_PRODUCT, $idProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::ID_PRODUCT, $idProduct, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReviewPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReviewPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate(1234); // WHERE rate = 1234
     * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
     * $query->filterByRate(array('min' => 12)); // WHERE rate >= 12
     * $query->filterByRate(array('max' => 12)); // WHERE rate <= 12
     * </code>
     *
     * @param     mixed $rate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (is_array($rate)) {
            $useMinMax = false;
            if (isset($rate['min'])) {
                $this->addUsingAlias(ReviewPeer::RATE, $rate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rate['max'])) {
                $this->addUsingAlias(ReviewPeer::RATE, $rate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::RATE, $rate, $comparison);
    }

    /**
     * Filter the query on the publication column
     *
     * Example usage:
     * <code>
     * $query->filterByPublication(1234); // WHERE publication = 1234
     * $query->filterByPublication(array(12, 34)); // WHERE publication IN (12, 34)
     * $query->filterByPublication(array('min' => 12)); // WHERE publication >= 12
     * $query->filterByPublication(array('max' => 12)); // WHERE publication <= 12
     * </code>
     *
     * @param     mixed $publication The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByPublication($publication = null, $comparison = null)
    {
        if (is_array($publication)) {
            $useMinMax = false;
            if (isset($publication['min'])) {
                $this->addUsingAlias(ReviewPeer::PUBLICATION, $publication['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publication['max'])) {
                $this->addUsingAlias(ReviewPeer::PUBLICATION, $publication['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::PUBLICATION, $publication, $comparison);
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
     * @return ReviewQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ReviewPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ReviewPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReviewPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReviewQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ReviewPeer::ID_USER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReviewPeer::ID_USER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReviewQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(ReviewPeer::ID_PRODUCT, $product->getIdProduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReviewPeer::ID_PRODUCT, $product->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
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
     * @return ReviewQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Filter the query by a related Comment object
     *
     * @param   Comment|PropelObjectCollection $comment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReviewQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByComment($comment, $comparison = null)
    {
        if ($comment instanceof Comment) {
            return $this
                ->addUsingAlias(ReviewPeer::ID_REVIEW, $comment->getIdReview(), $comparison);
        } elseif ($comment instanceof PropelObjectCollection) {
            return $this
                ->useCommentQuery()
                ->filterByPrimaryKeys($comment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComment() only accepts arguments of type Comment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function joinComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comment');

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
            $this->addJoinObject($join, 'Comment');
        }

        return $this;
    }

    /**
     * Use the Comment relation Comment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommentQuery A secondary query class using the current class as primary query
     */
    public function useCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comment', 'CommentQuery');
    }

    /**
     * Filter the query by a related Edition object
     *
     * @param   Edition|PropelObjectCollection $edition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ReviewQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEdition($edition, $comparison = null)
    {
        if ($edition instanceof Edition) {
            return $this
                ->addUsingAlias(ReviewPeer::ID_REVIEW, $edition->getIdReview(), $comparison);
        } elseif ($edition instanceof PropelObjectCollection) {
            return $this
                ->useEditionQuery()
                ->filterByPrimaryKeys($edition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEdition() only accepts arguments of type Edition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Edition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function joinEdition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Edition');

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
            $this->addJoinObject($join, 'Edition');
        }

        return $this;
    }

    /**
     * Use the Edition relation Edition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EditionQuery A secondary query class using the current class as primary query
     */
    public function useEditionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEdition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Edition', 'EditionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Review $review Object to remove from the list of results
     *
     * @return ReviewQuery The current query, for fluid interface
     */
    public function prune($review = null)
    {
        if ($review) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ReviewPeer::ID_REVIEW), $review->getIdReview(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ReviewPeer::ID_USER), $review->getIdUser(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(ReviewPeer::ID_PRODUCT), $review->getIdProduct(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
