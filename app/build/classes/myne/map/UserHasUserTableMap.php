<?php



/**
 * This class defines the structure of the 'user_has_user' table.
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
class UserHasUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.UserHasUserTableMap';

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
        $this->setName('user_has_user');
        $this->setPhpName('UserHasUser');
        $this->setClassname('UserHasUser');
        $this->setPackage('myne');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_user', 'IdUser', 'INTEGER' , 'user', 'id_user', true, null, null);
        $this->addColumn('id_facebook_friend', 'IdFacebookFriend', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_user' => 'id_user', ), null, null);
    } // buildRelations()

} // UserHasUserTableMap
