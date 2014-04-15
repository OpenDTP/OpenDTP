<?php

class Auth_Model_Users
{

    const STATUS_ACTIVE    = 1;
    const STATUS_INACTIVE  = 0;

    public static function login($username, $password)
    {
        if(!strlen($username) || !strlen($password))
        {
            return false;
        }

        $staticSalt = Zend_Registry::get('config')->auth->salt;

        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
        $authAdapter->setTableName('users')
        ->setIdentityColumn('email')
        ->setCredentialColumn('password')
        ->setIdentity($username)
        ->setCredential($password);

        $authAdapter->setCredentialTreatment(
            "SHA1(CONCAT('$staticSalt',?,salt))"
            . " AND status=" . self::STATUS_ACTIVE
        );

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($authAdapter);
        if (!$result->isValid())
        {
            return false;
        }

        $row = $authAdapter->getResultRowObject(array(
            'id',
            'role',
            'username',
            'lName',
            'fName',
        ));
        $auth->getStorage()->write($row);
        return true;
    }

    public function logout()
    {
        if(Zend_Auth::getInstance()->hasIdentity())
        {
            Zend_Auth::getInstance()->clearIdentity();
            Zend_Session::destroy(true, true);
        }
    }

    public static function getLoggedInUserField($name)
    {
        if(!$name)
        {
            return false;
        }

        $user = Zend_Auth::getInstance()->getIdentity();
        if($user && isset($user->$name))
            return $user->$name;

        return false;
    }

    public static function isAdmin()
    {
        return 'admin' == self::getLoggedInUserField('role');
    }

    public static function isLoggedIn()
    {
        return Zend_Auth::getInstance()->hasIdentity();
    }

}
