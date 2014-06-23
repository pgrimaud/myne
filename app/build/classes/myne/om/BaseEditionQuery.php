<?php


/**
 * Base class that represents a query for the 'edition' table.
 *
 *
 *
 * @method EditionQuery orderByIdEdition($order = Criteria::ASC) Order by the id_edition column
 * @method EditionQuery orderByIdReview($order = Criteria::ASC) Order by the id_review column
 * @method EditionQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method EditionQuery orderByMood($order = Criteria::ASC) Order by the mood column
 * @method EditionQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method EditionQuery groupByIdEdition() Group by the id_edition column
 * @method EditionQuery groupByIdReview() Group by the id_review column
 * @method EditionQuery groupByContent() Group by the content column
 * @method EditionQuery groupByMood() Group by the mood column
 * @method EditionQuery groupByDate() Group by the date column
 *
 * @method EditionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EditionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EditionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EditionQuery leftJoinReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the Review relation
 * @method EditionQuery rightJoinReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Review relation
 * @method EditionQuery innerJoinReview($relationAlias = null) Adds a INNER JOIN clause to the query using the Review relation
 *
 * @method Edition findOne(PropelPDO $con = null) Return the first Edition matching the query
 * @method Edition findOneOrCreate(PropelPDO $con = null) Return the first Edition matching the query, or a new Edition object populated from the query conditions when no match is found
 *
 * @method Edition findOneByIdEdition(int $id_edition) Return the first Edition filtered by the id_edition column
 * @method Edition findOneByIdReview(int $id_review) Return the first Edition filtered by the id_review column
 * @method Edition findOneByContent(string $content) Return the first Edition filtered by the content column
 * @method Edition findOneByMood(int $mood) Return the first Edition filtered by the mood column
 * @method Edition findOneByDate(string $date) Return the first Edition filtered by the date column
 *
 * @method array findByIdEdition(int $id_edition) Return Edition objects filtered by the id_edition column
 * @method array findByIdReview(int $id_review) Return Edition objects filtered by the id_review column
 * @method array findByContent(string $content) Return Edition objects filtered by the content column
 * @method array findByMood(int $mood) Return Edition objects filtered by the mood column
 * @method array findByDate(string $date) Return Edition objects filtered by the date column
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseEditionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEditionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'myne', $modelName = 'Edition', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EditionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EditionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EditionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EditionQuery) {
            return $criteria;
        }
        $query = new EditionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id_edition, $id_review]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Edition|Edition[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EditionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EditionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Edition A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_edition`, `id_review`, `content`, `mood`, `date` FROM `edition` WHERE `id_edition` = :p0 AND `id_review` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Edition();
            $obj->hydrate($row);
            EditionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Edition|Edition[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Edition[]|mixed the list of results, formatted by the current formatter
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
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EditionPeer::ID_EDITION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EditionPeer::ID_REVIEW, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EditionPeer::ID_EDITION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EditionPeer::ID_REVIEW, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_edition column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEdition(1234); // WHERE id_edition = 1234
     * $query->filterByIdEdition(array(12, 34)); // WHERE id_edition IN (12, 34)
     * $query->filterByIdEdition(array('min' => 12)); // WHERE id_edition >= 12
     * $query->filterByIdEdition(array('max' => 12)); // WHERE id_edition <= 12
     * </code>
     *
     * @param     mixed $idEdition The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByIdEdition($idEdition = null, $comparison = null)
    {
        if (is_array($idEdition)) {
            $useMinMax = false;
            if (isset($idEdition['min'])) {
                $this->addUsingAlias(EditionPeer::ID_EDITION, $idEdition['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEdition['max'])) {
                $this->addUsingAlias(EditionPeer::ID_EDITION, $idEdition['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditionPeer::ID_EDITION, $idEdition, $comparison);
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
     * @see       filterByReview()
     *
     * @param     mixed $idReview The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByIdReview($idReview = null, $comparison = null)
    {
        if (is_array($idReview)) {
            $useMinMax = false;
            if (isset($idReview['min'])) {
                $this->addUsingAlias(EditionPeer::ID_REVIEW, $idReview['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idReview['max'])) {
                $this->addUsingAlias(EditionPeer::ID_REVIEW, $idReview['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditionPeer::ID_REVIEW, $idReview, $comparison);
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
     * @return EditionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EditionPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the mood column
     *
     * Example usage:
     * <code>
     * $query->filterByMood(1234); // WHERE mood = 1234
     * $query->filterByMood(array(12, 34)); // WHERE mood IN (12, 34)
     * $query->filterByMood(array('min' => 12)); // WHERE mood >= 12
     * $query->filterByMood(array('max' => 12)); // WHERE mood <= 12
     * </code>
     *
     * @param     mixed $mood The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByMood($mood = null, $comparison = null)
    {
        if (is_array($mood)) {
            $useMinMax = false;
            if (isset($mood['min'])) {
                $this->addUsingAlias(EditionPeer::MOOD, $mood['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mood['max'])) {
                $this->addUsingAlias(EditionPeer::MOOD, $mood['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditionPeer::MOOD, $mood, $comparison);
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
     * @return EditionQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(EditionPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(EditionPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditionPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related Review object
     *
     * @param   Review|PropelObjectCollection $review The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EditionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByReview($review, $comparison = null)
    {
        if ($review instanceof Review) {
            return $this
                ->addUsingAlias(EditionPeer::ID_REVIEW, $review->getIdReview(), $comparison);
        } elseif ($review instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EditionPeer::ID_REVIEW, $review->toKeyValue('IdReview', 'IdReview'), $comparison);
        } else {
            throw new PropelException('filterByReview() only accepts arguments of type Review or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Review relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function joinReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Review');

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
            $this->addJoinObject($join, 'Review');
        }

        return $this;
    }

    /**
     * Use the Review relation Review object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ReviewQuery A secondary query class using the current class as primary query
     */
    public function useReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Review', 'ReviewQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Edition $edition Object to remove from the list of results
     *
     * @return EditionQuery The current query, for fluid interface
     */
    public function prune($edition = null)
    {
        if ($edition) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EditionPeer::ID_EDITION), $edition->getIdEdition(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EditionPeer::ID_REVIEW), $edition->getIdReview(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
