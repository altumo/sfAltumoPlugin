<?php



/**
 * This class defines the structure of the 'system_event_instance_message' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfAltumoPlugin.lib.model.map
 */
class SystemEventInstanceMessageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfAltumoPlugin.lib.model.map.SystemEventInstanceMessageTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('system_event_instance_message');
		$this->setPhpName('SystemEventInstanceMessage');
		$this->setClassname('SystemEventInstanceMessage');
		$this->setPackage('plugins.sfAltumoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SYSTEM_EVENT_INSTANCE_ID', 'SystemEventInstanceId', 'INTEGER', 'system_event_instance', 'ID', true, null, null);
		$this->addForeignKey('SYSTEM_EVENT_SUBSCRIPTION_ID', 'SystemEventSubscriptionId', 'INTEGER', 'system_event_subscription', 'ID', true, null, null);
		$this->addColumn('RECEIVED', 'Received', 'BOOLEAN', true, null, false);
		$this->addColumn('RECEIVED_AT', 'ReceivedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('STATUS_MESSAGE', 'StatusMessage', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SystemEventInstance', 'SystemEventInstance', RelationMap::MANY_TO_ONE, array('system_event_instance_id' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('SystemEventSubscription', 'SystemEventSubscription', RelationMap::MANY_TO_ONE, array('system_event_subscription_id' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // SystemEventInstanceMessageTableMap
