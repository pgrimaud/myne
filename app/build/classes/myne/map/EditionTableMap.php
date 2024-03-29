<?php

/**
 * This class defines the structure of the 'edition' table.
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
class EditionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.EditionTableMap';

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
        $this->setName('edition');
        $this->setPhpName('Edition');
        $this->setClassname('Edition');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_edition', 'IdEdition', 'INTEGER', true, null, null);
        $this->addForeignPrimaryKey('id_review', 'IdReview', 'INTEGER' , 'review', 'id_review', true, null, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addColumn('mood', 'Mood', 'TINYINT', true, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Review', 'Review', RelationMap::MANY_TO_ONE, array('id_review' => 'id_review', ), null, null);
    } // buildRelations()

} // EditionTableMap
