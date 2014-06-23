<?php


/**
 * Base class that represents a query for the 'comment' table.
 *
 *
 *
 * @method CommentQuery orderByIdComment($order = Criteria::ASC) Order by the id_comment column
 * @method CommentQuery orderByIdReview($order = Criteria::ASC) Order by the id_review column
 * @method CommentQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method CommentQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method CommentQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method CommentQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method CommentQuery groupByIdComment() Group by the id_comment column
 * @method CommentQuery groupByIdReview() Group by the id_review column
 * @method CommentQuery groupByIdUser() Group by the id_user column
 * @method CommentQuery groupByContent() Group by the content column
 * @method CommentQuery groupByStatus() Group by the status column
 * @method CommentQuery groupByDate() Group by the date column
 *
 * @method CommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CommentQuery leftJoinReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the Review relation
 * @method CommentQuery rightJoinReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Review relation
 * @method CommentQuery innerJoinReview($relationAlias = null) Adds a INNER JOIN clause to the query using the Review relation
 *
 * @method CommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method CommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method CommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Comment findOne(PropelPDO $con = null) Return the first Comment matching the query
 * @method Comment findOneOrCreate(PropelPDO $con = null) Return the first Comment matching the query, or a new Comment object populated from the query conditions when no match is found
 *
 * @method Comment findOneByIdComment(int $id_comment) Return the first Comment filtered by the id_comment column
 * @method Comment findOneByIdReview(int $id_review) Return the first Comment filtered by the id_review column
 * @method Comment findOneByIdUser(int $id_user) Return the first Comment filtered by the id_user column
 * @method Comment findOneByContent(string $content) Return the first Comment filtered by the content column
 * @method Comment findOneByStatus(int $status) Return the first Comment filtered by the status column
 * @method Comment findOneByDate(string $date) Return the first Comment filtered by the date column
 *
 * @method array findByIdComment(int $id_comment) Return Comment objects filtered by the id_comment column
 * @method array findByIdReview(int $id_review) Return Comment objects filtered by the id_review column
 * @method array findByIdUser(int $id_user) Return Comment objects filtered by the id_user column
 * @method array findByContent(string $content) Return Comment objects filtered by the content column
 * @method array findByStatus(int $status) Return Comment objects filtered by the status column
 * @method array findByDate(string $date) Return Comment objects filtered by the date column
 *
 * @package    propel.generator.myne.om
 */
abstract class BaseCommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'myne', $modelName = 'Comment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CommentQuery) {
            return $criteria;
        }
        $query = new CommentQuery();
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
                         A Primary key composition: [$id_comment, $id_review, $id_user]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Comment|Comment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CommentPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Comment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_comment`, `id_review`, `id_user`, `content`, `status`, `date` FROM `comment` WHERE `id_comment` = :p0 AND `id_review` = :p1 AND `id_user` = :p2';
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
            $obj = new Comment();
            $obj->hydrate($row);
            CommentPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return Comment|Comment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Comment[]|mixed the list of results, formatted by the current formatter
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CommentPeer::ID_COMMENT, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CommentPeer::ID_REVIEW, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(CommentPeer::ID_USER, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CommentPeer::ID_COMMENT, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CommentPeer::ID_REVIEW, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(CommentPeer::ID_USER, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdComment(1234); // WHERE id_comment = 1234
     * $query->filterByIdComment(array(12, 34)); // WHERE id_comment IN (12, 34)
     * $query->filterByIdComment(array('min' => 12)); // WHERE id_comment >= 12
     * $query->filterByIdComment(array('max' => 12)); // WHERE id_comment <= 12
     * </code>
     *
     * @param     mixed $idComment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByIdComment($idComment = null, $comparison = null)
    {
        if (is_array($idComment)) {
            $useMinMax = false;
            if (isset($idComment['min'])) {
                $this->addUsingAlias(CommentPeer::ID_COMMENT, $idComment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComment['max'])) {
                $this->addUsingAlias(CommentPeer::ID_COMMENT, $idComment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::ID_COMMENT, $idComment, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByIdReview($idReview = null, $comparison = null)
    {
        if (is_array($idReview)) {
            $useMinMax = false;
            if (isset($idReview['min'])) {
                $this->addUsingAlias(CommentPeer::ID_REVIEW, $idReview['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idReview['max'])) {
                $this->addUsingAlias(CommentPeer::ID_REVIEW, $idReview['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::ID_REVIEW, $idReview, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(CommentPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(CommentPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::ID_USER, $idUser, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CommentPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(CommentPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(CommentPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::STATUS, $status, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CommentPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CommentPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related Review object
     *
     * @param   Review|PropelObjectCollection $review The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByReview($review, $comparison = null)
    {
        if ($review instanceof Review) {
            return $this
                ->addUsingAlias(CommentPeer::ID_REVIEW, $review->getIdReview(), $comparison);
        } elseif ($review instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::ID_REVIEW, $review->toKeyValue('IdReview', 'IdReview'), $comparison);
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
     * @return CommentQuery The current query, for fluid interface
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
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CommentPeer::ID_USER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::ID_USER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return CommentQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Comment $comment Object to remove from the list of results
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function prune($comment = null)
    {
        if ($comment) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CommentPeer::ID_COMMENT), $comment->getIdComment(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CommentPeer::ID_REVIEW), $comment->getIdReview(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(CommentPeer::ID_USER), $comment->getIdUser(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
