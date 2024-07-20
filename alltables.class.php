<?php
	include_once ('db.php');
	class AllTables
	{
		private $con;
		private $obj1;
		function __construct()
		{
			$this->obj1 = new db();
			$this->con = $this->obj1-> dbconnect();
		}
		
		// get list of or single compani(es) from database
		function getInfo($KeyID='',$sql='',$debugquery='',$fields='*',$tablename='',$KeyFieldName='')
		{
			if (($KeyID!="")&&($tablename!=""))
			{
				$sqltext = "Select $fields from $tablename where $KeyFieldName='".$KeyID."'";
			}
			else if ($sql!="")
			{
				$sqltext = $sql;
			}
			
			$companies = mysqli_query($this->con,$sqltext);
			if ($companies)
			{
				while ($companylist = mysqli_fetch_assoc($companies))
				{
					$compstr[] = $companylist;
				}
			}
			
			return $compstr;
		}
		// add company to database
		function AddInfo($CompanyData,$tableName)
		{
		if (is_array($CompanyData)== false)
			{
				return false;
			}
			else
			{
                //$CompanyData = $this->obj1->lookupdata_add($CompanyData);
				$fieldnames =  "(";
				$fieldvalues = "(";
				foreach ($CompanyData as $k => $v) 
				{
					
					$fieldnames .=  ($fieldnames=="(")?"$k":",$k";
					$fieldvalues .= ($fieldvalues=="(")?"'$v'":",'$v'";
				}
				$sqltext = "insert into ".$tableName." ".$fieldnames.") values ".$fieldvalues.")";
				//echo $sqltext;
			//	die();
			
				$applications = mysqli_query($this->con,$sqltext);
				return ($applications == 1)?"true":"false";
			}
		
		}

		function EditInfo($applicationdata,$wherecondition,$tableName)
		{
			if (is_array($applicationdata)== false)
			{
				return false;
			}
			else
			{
				$fieldnamesvalues =  "set ";
				//$applicationdata = $this->obj1->lookupdata_edit($applicationdata);
				foreach ($applicationdata as $k => $v) 
				{
					$fieldnamesvalues .=  ($fieldnamesvalues =="set ")?"$k='$v'":",$k='$v'";
				}
				$sqltext = "update ".$tableName." ".$fieldnamesvalues." where ".$wherecondition ;
				//echo $sqltext;
				
				$applications = mysqli_query($this->con,$sqltext);
				return ($applications == 1)?"true":"false";
				
			}
		}

		function DeleteInfo($applicationdata,$tableName)
		{
			if($applicationdata)
			{
				$sqltext = "delete from ".$tableName." where ".$applicationdata; 
				
				$applications = mysqli_query($this->con,$sqltext);
				return ($applications == 1)?"true":"false";
			}
		
		}
		
	}

?>
