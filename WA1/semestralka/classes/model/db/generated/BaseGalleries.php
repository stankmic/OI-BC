<?php

/**
 * BaseGalleries
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property timestamp $uploaded
 * @property integer $public
 * @property string $password
 * @property string $description
 * @property Users $Users
 * @property Doctrine_Collection $Fotos
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author Michal Stanke <michal.stanke@mikk.cz>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseGalleries extends Doctrine_Record {

    public function setTableDefinition() {
        $this->setTableName('galleries');

        $this->option('collate', 'utf8_czech_ci');
        $this->option('charset', 'utf8');
        
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('user_id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('name', 'string', 32, array(
            'type' => 'string',
            'length' => 32,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('uploaded', 'timestamp', null, array(
            'type' => 'timestamp',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('public', 'integer', 1, array(
            'type' => 'integer',
            'length' => 1,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '1',
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('password', 'string', 128, array(
            'type' => 'string',
            'length' => 128,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('description', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
    }

    public function setUp() {
        parent::setUp();
        $this->hasOne('Users', array(
            'local' => 'user_id',
            'foreign' => 'id'));

        $this->hasMany('Fotos', array(
            'local' => 'id',
            'foreign' => 'gallery_id'));
    }

}
