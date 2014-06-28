<?php

/**
 * This class defines the structure of the 'review' table.
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
class ReviewTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.ReviewTableMap';

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
        $this->setName('review');
        $this->setPhpName('Review');
        $this->setClassname('Review');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_review', 'IdReview', 'INTEGER', true, null, null);
        $this->addForeignPrimaryKey('id_user', 'IdUser', 'INTEGER' , 'user', 'id_user', true, null, null);
        $this->addForeignPrimaryKey('id_product', 'IdProduct', 'INTEGER' , 'product', 'id_product', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addColumn('rate', 'Rate', 'SMALLINT', true, null, null);
        $this->addColumn('publication', 'Publication', 'TINYINT', true, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_user' => 'id_user', ), null, null);
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('id_product' => 'id_product', ), null, null);
        $this->addRelation('Comment', 'Comment', RelationMap::ONE_TO_MANY, array('id_review' => 'id_review', ), null, null, 'Comments');
        $this->addRelation('Edition', 'Edition', RelationMap::ONE_TO_MANY, array('id_review' => 'id_review', ), null, null, 'Editions');
    } // buildRelations()

} // ReviewTableMap
