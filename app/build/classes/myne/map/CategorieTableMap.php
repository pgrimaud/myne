<?php



/**
 * This class defines the structure of the 'categorie' table.
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
class CategorieTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'myne.map.CategorieTableMap';

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
        $this->setName('categorie');
        $this->setPhpName('Categorie');
        $this->setClassname('Categorie');
        $this->setPackage('myne');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_categorie', 'IdCategorie', 'INTEGER', true, null, null);
        $this->addColumn('name_categorie', 'NameCategorie', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::ONE_TO_MANY, array('id_categorie' => 'id_categorie', ), 'CASCADE', 'CASCADE', 'Products');
    } // buildRelations()

} // CategorieTableMap
