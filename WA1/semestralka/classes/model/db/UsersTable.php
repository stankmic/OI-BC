<?php

/**
 * UsersTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @author Michal Stanke <michal.stanke@mikk.cz>
 */
class UsersTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object UsersTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Users');
    }

    /**
     * Returns the Users instance according to the user id.
     * 
     * @param integer $id id of the requested user
     * @return Users user
     */
    public function getByID($id) {
        $q = Doctrine_Query::create()
                ->from('users u')
                ->where('u.id = ?', $id);
        return $q->fetchOne();
    }

    /**
     * Returns the Users instance according to the username.
     * 
     * @param string $username username of the requested user
     * @return Users user
     */
    public function getByUsername($username) {
        $q = Doctrine_Query::create()
                ->from('users u')
                ->where('u.username = ?', $username);
        return $q->fetchOne();
    }

    /**
     * Checks the username exists.
     * 
     * @param string $username username to check
     * @return boolean true if the username is already registered
     */
    public function usernameExists($username) {
        $exists = $this->getByUsername($username);
        return (bool) $exists;
    }

    /**
     * Checks the e-mail exists.
     * 
     * @param string $email e-mail to check
     * @return boolean true if the e-mail is already registered
     */
    public function emailExists($email) {
        $q = Doctrine_Query::create()
                ->from('users u')
                ->where('u.email = ?', $email);
        $exists = $q->fetchOne();
        return (bool) $exists;
    }

    /**
     * Checks the password is correct for the username.
     * 
     * @param string $username username
     * @param type $password password
     * @return boolean true if correct
     */
    public function login($username, $password) {
        $user = $this->getByUsername($username);
        if ((bool) $user) {
            return $user->login($password);
        } else {
            return false;
        }
    }

    /**
     * Returns the owner of given gallery.
     * 
     * @param Galleries $gallery gallery
     * @return Users gallery owner
     */
    public function getForGallery(Galleries $gallery) {
        $q = Doctrine_Query::create()
                ->from('users u')
                ->where('u.id = ?', $gallery->getUserID());
        return $q->fetchOne();
    }

    public function getAll() {
        $q = Doctrine_Query::create()
                ->select('u.id, u.username, r.id, r.name')
                ->from('users u')
                ->orderBy('u.username ASC')
                ->leftJoin('u.Roles r');
        return $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    }

}
