<?php


/**
 * Base class that represents a query for the 'user' table.
 *
 * 
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     UserQuery orderByContactInformationId($order = Criteria::ASC) Order by the contact_information_id column
 * @method     UserQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method     UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserQuery orderByPasswordResetKey($order = Criteria::ASC) Order by the password_reset_key column
 * @method     UserQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     UserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     UserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupByEmail() Group by the email column
 * @method     UserQuery groupByContactInformationId() Group by the contact_information_id column
 * @method     UserQuery groupBySalt() Group by the salt column
 * @method     UserQuery groupByPassword() Group by the password column
 * @method     UserQuery groupByPasswordResetKey() Group by the password_reset_key column
 * @method     UserQuery groupByActive() Group by the active column
 * @method     UserQuery groupByCreatedAt() Group by the created_at column
 * @method     UserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserQuery leftJoinContactInformation($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactInformation relation
 * @method     UserQuery rightJoinContactInformation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactInformation relation
 * @method     UserQuery innerJoinContactInformation($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactInformation relation
 *
 * @method     UserQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     UserQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     UserQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     UserQuery leftJoinSession($relationAlias = null) Adds a LEFT JOIN clause to the query using the Session relation
 * @method     UserQuery rightJoinSession($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Session relation
 * @method     UserQuery innerJoinSession($relationAlias = null) Adds a INNER JOIN clause to the query using the Session relation
 *
 * @method     UserQuery leftJoinSystemEventSubscription($relationAlias = null) Adds a LEFT JOIN clause to the query using the SystemEventSubscription relation
 * @method     UserQuery rightJoinSystemEventSubscription($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SystemEventSubscription relation
 * @method     UserQuery innerJoinSystemEventSubscription($relationAlias = null) Adds a INNER JOIN clause to the query using the SystemEventSubscription relation
 *
 * @method     UserQuery leftJoinSystemEventInstance($relationAlias = null) Adds a LEFT JOIN clause to the query using the SystemEventInstance relation
 * @method     UserQuery rightJoinSystemEventInstance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SystemEventInstance relation
 * @method     UserQuery innerJoinSystemEventInstance($relationAlias = null) Adds a INNER JOIN clause to the query using the SystemEventInstance relation
 *
 * @method     User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method     User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method     User findOneById(int $id) Return the first User filtered by the id column
 * @method     User findOneByEmail(string $email) Return the first User filtered by the email column
 * @method     User findOneByContactInformationId(int $contact_information_id) Return the first User filtered by the contact_information_id column
 * @method     User findOneBySalt(string $salt) Return the first User filtered by the salt column
 * @method     User findOneByPassword(string $password) Return the first User filtered by the password column
 * @method     User findOneByPasswordResetKey(string $password_reset_key) Return the first User filtered by the password_reset_key column
 * @method     User findOneByActive(boolean $active) Return the first User filtered by the active column
 * @method     User findOneByCreatedAt(string $created_at) Return the first User filtered by the created_at column
 * @method     User findOneByUpdatedAt(string $updated_at) Return the first User filtered by the updated_at column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findByEmail(string $email) Return User objects filtered by the email column
 * @method     array findByContactInformationId(int $contact_information_id) Return User objects filtered by the contact_information_id column
 * @method     array findBySalt(string $salt) Return User objects filtered by the salt column
 * @method     array findByPassword(string $password) Return User objects filtered by the password column
 * @method     array findByPasswordResetKey(string $password_reset_key) Return User objects filtered by the password_reset_key column
 * @method     array findByActive(boolean $active) Return User objects filtered by the active column
 * @method     array findByCreatedAt(string $created_at) Return User objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return User objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.sfAltumoPlugin.lib.model.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'User', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserQuery) {
			return $criteria;
		}
		$query = new UserQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    User|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the contact_information_id column
	 * 
	 * @param     int|array $contactInformationId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByContactInformationId($contactInformationId = null, $comparison = null)
	{
		if (is_array($contactInformationId)) {
			$useMinMax = false;
			if (isset($contactInformationId['min'])) {
				$this->addUsingAlias(UserPeer::CONTACT_INFORMATION_ID, $contactInformationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($contactInformationId['max'])) {
				$this->addUsingAlias(UserPeer::CONTACT_INFORMATION_ID, $contactInformationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::CONTACT_INFORMATION_ID, $contactInformationId, $comparison);
	}

	/**
	 * Filter the query on the salt column
	 * 
	 * @param     string $salt The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySalt($salt = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($salt)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $salt)) {
				$salt = str_replace('*', '%', $salt);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::SALT, $salt, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the password_reset_key column
	 * 
	 * @param     string $passwordResetKey The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPasswordResetKey($passwordResetKey = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($passwordResetKey)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $passwordResetKey)) {
				$passwordResetKey = str_replace('*', '%', $passwordResetKey);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PASSWORD_RESET_KEY, $passwordResetKey, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(UserPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related ContactInformation object
	 *
	 * @param     ContactInformation $contactInformation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByContactInformation($contactInformation, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::CONTACT_INFORMATION_ID, $contactInformation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ContactInformation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinContactInformation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ContactInformation');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'ContactInformation');
		}
		
		return $this;
	}

	/**
	 * Use the ContactInformation relation ContactInformation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContactInformationQuery A secondary query class using the current class as primary query
	 */
	public function useContactInformationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinContactInformation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ContactInformation', 'ContactInformationQuery');
	}

	/**
	 * Filter the query by a related Client object
	 *
	 * @param     Client $client  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByClient($client, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $client->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Client relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Client');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Client');
		}
		
		return $this;
	}

	/**
	 * Use the Client relation Client object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClient($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
	}

	/**
	 * Filter the query by a related Session object
	 *
	 * @param     Session $session  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySession($session, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $session->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Session relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSession($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Session');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Session');
		}
		
		return $this;
	}

	/**
	 * Use the Session relation Session object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SessionQuery A secondary query class using the current class as primary query
	 */
	public function useSessionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSession($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Session', 'SessionQuery');
	}

	/**
	 * Filter the query by a related SystemEventSubscription object
	 *
	 * @param     SystemEventSubscription $systemEventSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySystemEventSubscription($systemEventSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $systemEventSubscription->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SystemEventSubscription relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSystemEventSubscription($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SystemEventSubscription');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SystemEventSubscription');
		}
		
		return $this;
	}

	/**
	 * Use the SystemEventSubscription relation SystemEventSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SystemEventSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useSystemEventSubscriptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSystemEventSubscription($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SystemEventSubscription', 'SystemEventSubscriptionQuery');
	}

	/**
	 * Filter the query by a related SystemEventInstance object
	 *
	 * @param     SystemEventInstance $systemEventInstance  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySystemEventInstance($systemEventInstance, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $systemEventInstance->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SystemEventInstance relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSystemEventInstance($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SystemEventInstance');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SystemEventInstance');
		}
		
		return $this;
	}

	/**
	 * Use the SystemEventInstance relation SystemEventInstance object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SystemEventInstanceQuery A secondary query class using the current class as primary query
	 */
	public function useSystemEventInstanceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSystemEventInstance($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SystemEventInstance', 'SystemEventInstanceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     User $user Object to remove from the list of results
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function prune($user = null)
	{
		if ($user) {
			$this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUserQuery
