<?php
namespace Dldh\Models;
class Area extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(column="area_name", type="string", length=50, nullable=false)
     */
    protected $area_name;

    /**
     *
     * @var string
     * @Column(column="area_short_name", type="string", length=10, nullable=true)
     */
    protected $area_short_name;

    /**
     *
     * @var integer
     * @Column(column="area_parent_id", type="integer", length=11, nullable=false)
     */
    protected $area_parent_id;

    /**
     *
     * @var integer
     * @Column(column="area_sort", type="integer", length=1, nullable=false)
     */
    protected $area_sort;

    /**
     *
     * @var integer
     * @Column(column="area_deep", type="integer", length=1, nullable=false)
     */
    protected $area_deep;

    /**
     *
     * @var string
     * @Column(column="area_region", type="string", length=3, nullable=true)
     */
    protected $area_region;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field area_name
     *
     * @param string $area_name
     * @return $this
     */
    public function setAreaName($area_name)
    {
        $this->area_name = $area_name;

        return $this;
    }

    /**
     * Method to set the value of field area_short_name
     *
     * @param string $area_short_name
     * @return $this
     */
    public function setAreaShortName($area_short_name)
    {
        $this->area_short_name = $area_short_name;

        return $this;
    }

    /**
     * Method to set the value of field area_parent_id
     *
     * @param integer $area_parent_id
     * @return $this
     */
    public function setAreaParentId($area_parent_id)
    {
        $this->area_parent_id = $area_parent_id;

        return $this;
    }

    /**
     * Method to set the value of field area_sort
     *
     * @param integer $area_sort
     * @return $this
     */
    public function setAreaSort($area_sort)
    {
        $this->area_sort = $area_sort;

        return $this;
    }

    /**
     * Method to set the value of field area_deep
     *
     * @param integer $area_deep
     * @return $this
     */
    public function setAreaDeep($area_deep)
    {
        $this->area_deep = $area_deep;

        return $this;
    }

    /**
     * Method to set the value of field area_region
     *
     * @param string $area_region
     * @return $this
     */
    public function setAreaRegion($area_region)
    {
        $this->area_region = $area_region;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field area_name
     *
     * @return string
     */
    public function getAreaName()
    {
        return $this->area_name;
    }

    /**
     * Returns the value of field area_short_name
     *
     * @return string
     */
    public function getAreaShortName()
    {
        return $this->area_short_name;
    }

    /**
     * Returns the value of field area_parent_id
     *
     * @return integer
     */
    public function getAreaParentId()
    {
        return $this->area_parent_id;
    }

    /**
     * Returns the value of field area_sort
     *
     * @return integer
     */
    public function getAreaSort()
    {
        return $this->area_sort;
    }

    /**
     * Returns the value of field area_deep
     *
     * @return integer
     */
    public function getAreaDeep()
    {
        return $this->area_deep;
    }

    /**
     * Returns the value of field area_region
     *
     * @return string
     */
    public function getAreaRegion()
    {
        return $this->area_region;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("area");
        $this->hasMany('id', 'Pole', 'place_id', ['alias' => 'Pole']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'area';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Area[]|Area|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Area|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'area_name' => 'area_name',
            'area_short_name' => 'area_short_name',
            'area_parent_id' => 'area_parent_id',
            'area_sort' => 'area_sort',
            'area_deep' => 'area_deep',
            'area_region' => 'area_region'
        ];
    }

}
