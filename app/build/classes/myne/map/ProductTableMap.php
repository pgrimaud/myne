<?php



/**
 * This class defines the structure of the 'product' table.
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
class ProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.ProductTableMap';

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
        $this->setName('product');
        $this->setPhpName('Product');
        $this->setClassname('Product');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_product', 'IdProduct', 'INTEGER', true, null, null);
        $this->addColumn('ean_code', 'EanCode', 'VARCHAR', false, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        $this->addForeignKey('id_categorie', 'IdCategorie', 'INTEGER', 'categorie', 'id_categorie', false, null, null);
        $this->addColumn('brand', 'Brand', 'VARCHAR', false, 255, null);
        $this->addColumn('link_image', 'LinkImage', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Categorie', 'Categorie', RelationMap::MANY_TO_ONE, array('id_categorie' => 'id_categorie', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Review', 'Review', RelationMap::ONE_TO_MANY, array('id_product' => 'id_product', ), null, null, 'Reviews');
        $this->addRelation('CustomerProduct', 'CustomerProduct', RelationMap::ONE_TO_MANY, array('id_product' => 'id_product', ), 'CASCADE', 'CASCADE', 'CustomerProducts');
    } // buildRelations()

} // ProductTableMap
