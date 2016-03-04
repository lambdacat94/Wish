<?php
class MySQL
{
	var $serverName 	= '';
	var $admin		='';
	var $password		='';
	var $dbName 		= '';
	var $dbUsername 	= '';
	var $dbPassword 	= '';
	var $usePconnect 	= 0;
	var $website        ='';
	var $id 				= 0;
	var $linkId 			= 0;
	var $queryId 		= 0;

	var $queryCount 	= 0;
	var $result;
	var $record 		= array();
	var $rows;
	var $affectedRows = 0;
	var $insertId;

	var $errno;
	var $error;

	var $queryLog = array();

	function GetErrDesc()
	{
		$this->error = @mysql_error( $this->linkId );
		return $this->error;
	} 

	function GetErrNo()
	{
		$this->errno = @mysql_errno( $this->linkId );
		return $this->errno;
	} 

	function Connect()
	{
		if ( $this->usePconnect == 1 )
		{
			if ( !$this->linkId = @mysql_pconnect( $this->serverName, $this->dbUsername, $this->dbPassword ) )
				$this->Halt( 'Connect faild!' );
		}
		else
		{
			if ( !$this->linkId = @mysql_connect( $this->serverName, $this->dbUsername, $this->dbPassword ) )
				$this->Halt( 'Connect faild!' );
		} 
		return $this->linkId;
	} 

	function SelectDB()
	{
		if ( !mysql_select_db( $this->dbName ) )
			$this->Halt( 'Connect faild!' );
	} 

	function Query( $queryStr )
	{
		$this->result = mysql_query( $queryStr, $this->linkId );
		if ( !$this->result )
			$this->Halt( 'Invalid SQL: ' . $queryStr );
		return $this->result;
	} 

	function Update( $queryStr )
	{
		$this->Query( $queryStr );
		return $this->AffectedRows();
	}

	function FetchArray( $queryId, $fetchType = 'assoc' )
	{
		if ( empty( $queryId ) )
			$this->Halt( 'Invalid query id:' . $queryId );

		if ( $fetchType = 'assoc' )
			$this->record = mysql_fetch_assoc( $queryId );
		else
			$this->record = mysql_fetch_array( $queryId );

		return $this->record;
	}

	function FetchRow( $queryId )
	{
		if ( empty( $queryId ) )
			$this->Halt( 'Invalid query id:' . $queryId );

		$this->record = mysql_fetch_row( $queryId );
		return $this->record;
	}

	function FetchOne( $query, $field = '' )
	{
		if ( empty( $query ) )
			$this->Halt( 'Invalid query id:' . $query );
		$this->result = $this->Query( $query );
		$this->record = $this->FetchArray( $this->result );
		if ( $field != '' )
			return $this->record[$field];
		else
			return $this->record;
	}

	function FetchAll( $query, $field = '' )
	{
		if ( empty( $query ) )
			$this->Halt( 'Invalid query id:' . $query );

		$this->result = $this->Query( $query );
		if ( $field != '' )
		{
			while ( $this->record = $this->FetchArray( $this->result ) )
				$result[] = $this->record[$field];
		}
		else
		{
			while ( $this->record = $this->FetchArray( $this->result ) )
				$result[] = $this->record;
		}
		return $result;
	}

	function NumRows( $queryId )
	{
		if ( empty( $queryId ) )
			$this->Halt( 'Invalid query id:' . $queryId );

		$this->rows = mysql_num_rows( $queryId );
		return $this->rows;
	} 

	function AffectedRows()
	{
		$this->AffectedRows = mysql_affected_rows( $this->linkId );
		return $this->AffectedRows;
	} 

	function FreeResult( $query )
	{
		if ( !mysql_free_result( $query ) )
			$this->Halt( 'Fail to mysql_free_result' );
	} 

	function InsertId()
	{
		$this->insertId = mysql_insert_id();
		if ( !$this->insertIid )
			$this->Halt( 'Fail to get mysql_insert_id' );
		return $this->insertId;
	} 

	function Close()
	{
		@mysql_close( $this->linkId );
	} 

	function Halt( $msg )
	{
		$message = "<html>\n<head>\n";
		$message .= "<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">\n";
		$message .= "<style type=\"text/css\">\n";
		$message .= "body,td,p,pre {font-family : Verdana, Arial;font-size : 14px;}\n";
		$message .= "</style>\n";
		$message .= "</head>\n";
		$message .= "<body>\n";
		$content  = '<p>MySQL Database Error!!!</p><pre><b>' . htmlspecialchars( $msg ) . "</b></pre>\n";
		$content .= '<b>MySQL error description</b>: ' . $this->GetErrDesc() . "\n<br>";
		$content .= '<b>MySQL error number</b>: ' . $this->GetErrNo() . "\n<br>";
		$content .= '<b>Date</b>: ' . date( 'Y-m-d @ H:i' ) . "\n<br>";
		$content .= '<b>Script</b>: http://' . $_SERVER['HTTP_HOST'] . getenv( 'REQUEST_URI' ) . "\n<br><br>";

		$message .= $content;
		$message .= "</body>\n</html>";
		echo $message;
		exit;
	}

	function NR( $queryId )
	{
		return $this->NumRows( $queryId );
	}

	function FM( $sql, $field = '' )
	{
		return $this->FetchAll( $sql, $field );
	}

	function FA( $queryId, $fetchType = 'assoc' )
	{
		return $this->FetchArray( $queryId, $fetchType );
	}

	function FO( $query, $field = '' )
	{
		return $this->FetchOne( $query, $field );
	}

	function QY( $queryStr )
	{
		return $this->Query( $queryStr );
	}
	
	function AR()
	{
		return $this->AffectedRows();
	}
} 
?>