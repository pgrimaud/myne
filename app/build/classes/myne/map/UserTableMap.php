<?php



/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.myne.map
 */
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.UserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_user', 'IdUser', 'INTEGER', true, null, null);
        $this->addColumn('id_facebook', 'IdFacebook', 'VARCHAR', false, 255, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('publication', 'Publication', 'TINYINT', true, null, 0);
        $this->addColumn('status', 'Status', 'TINYINT', true, null, 1);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Review', 'Review', RelationMap::ONE_TO_MANY, array('id_user' => 'id_user', ), null, null, 'Reviews');
        $this->addRelation('Comment', 'Comment', RelationMap::ONE_TO_MANY, array('id_user' => 'id_user', ), null, null, 'Comments');
        $this->addRelation('UserHasUser', 'UserHasUser', RelationMap::ONE_TO_MANY, array('id_user' => 'id_user', ), null, null, 'UserHasUsers');
    } // buildRelations()

} // UserTableMap
