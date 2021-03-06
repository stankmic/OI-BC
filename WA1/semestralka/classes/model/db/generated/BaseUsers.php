<?php

/**
 * BaseUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $role_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property Roles $Roles
 * @property Doctrine_Collection $Galleries
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author Michal Stanke <michal.stanke@mikk.cz>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseUsers extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('users');
        
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
        $this->hasColumn('role_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('username', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('email', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Roles', array(
             'local' => 'role_id',
             'foreign' => 'id'));

        $this->hasMany('Galleries', array(
             'local' => 'id',
             'foreign' => 'user_id'));
    }
}