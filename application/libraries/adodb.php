<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AdoDB Class
 *
 * @package    CodeIgniter
 * @subpackage    Libraries
 * @category    AdoDB
 * @author    Kepler Gelotte
 */
            require_once(APPPATH.'libraries/adodb5/adodb.inc'.EXT);


class CI_AdoDB {

    var $conn = false;

    function CI_AdoDB()
    {
        log_message('debug', "AdoDB Class Initialized");
    }

    function connect( $name_space = '' )
    {
        include(APPPATH.'config/database'.EXT);

        $group = ($name_space == '') ? $active_group : $name_space;
        
        if ( ! isset($db[$group]))
        {
            show_error('You have specified an invalid database connection group: '.$group);
        }
        
        $params = $db[$group];

        $this->conn = &ADONewConnection( $params['dbdriver'].'://'.$params['username'].':'.$params['password'].'@'.$params['hostname'].'/'.$params['database'] );
        if ( ! $this->conn ) die( "Connection failed to database " . $db );
    }

    function execute( $statement )
    {
        $recordSet = $this->conn->Execute( $statement );
        return $recordSet;
    }

    function replace( $table, $fields, $keys, $autoQuote = false )
    {
        $rc = $this->conn->Replace( $table, $fields, $keys, $autoQuote );
        return $rc;
    }

    function startTrans( )
    {
        $rc = $this->conn->StartTrans( );
        return $rc;
    }

    function failTrans( )
    {
        $rc = $this->conn->FailTrans( );
        return $rc;
    }

    function completeTrans( )
    {
        $rc = $this->conn->CompleteTrans( );
        return $rc;
    }

    function getErrorMsg()
    {

        return $this->conn->ErrorMsg();
    }

    function disconnect()
    {
        // $recordSet->Close(); # optional
        $this->conn->Close();
    }

}
// END AdoDB Class
?> 