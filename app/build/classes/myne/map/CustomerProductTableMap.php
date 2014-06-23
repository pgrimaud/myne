<?php



/**
 * This class defines the structure of the 'customer_product' table.
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
class CustomerProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.CustomerProductTableMap';

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
        $this->setName('customer_product');
        $this->setPhpName('CustomerProduct');
        $this->setClassname('CustomerProduct');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addForeignPrimaryKey('id_customer', 'IdCustomer', 'INTEGER' , 'customer', 'id_customer', true, null, null);
        $this->addForeignKey('id_product', 'IdProduct', 'INTEGER', 'product', 'id_product', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('id_product' => 'id_product', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('id_customer' => 'id_customer', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // CustomerProductTableMap
