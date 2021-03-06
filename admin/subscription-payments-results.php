<?php require_once('../Connections/connDB.php'); ?>
<?php
// check if show all was clicked
if (!session_id()) session_start();
if(isset($_GET['show_all']))
	$_SESSION["WADbSearch1_subscriptionpaymentsresults"] = '';
	
// check if subscr_id was passed
if(isset($_GET['subscr_id']))
	$_SESSION["WADbSearch1_subscriptionpaymentsresults"] = '';
?>
<?php
//WA Database Search Include
require_once("../WADbSearch/HelperPHP.php");
?>
<?php
//WA Database Search (Copyright 2005, WebAssist.com)
//Recordset: WADApaypal_subscription_payments;
//Searchpage: subscription-payments-search.php;
//Form: WADASearchForm;
$WADbSearch1_DefaultWhere = "";
if (!session_id()) session_start();
if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //keyword array declarations

  //comparison list additions
  $WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("memo","S_memo","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("item_name","S_item_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("item_number","S_item_number","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("os0","S_os0","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("on0","S_on0","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("os1","S_os1","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("on1","S_on1","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("quantity","S_quantity","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("pending_reason","S_pending_reason","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("tax","S_tax","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_country","S_address_country","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("subscr_id","S_subscr_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
  $WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

  //save the query in a session variable
  if (1 == 1) {
    $_SESSION["WADbSearch1_subscriptionpaymentsresults"]=$WADbSearch1->whereClause;
  }
}
else     {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //get the filter definition from a session variable
  if (1 == 1)     {
    if (isset($_SESSION["WADbSearch1_subscriptionpaymentsresults"]) && $_SESSION["WADbSearch1_subscriptionpaymentsresults"] != "")     {
      $WADbSearch1->whereClause = $_SESSION["WADbSearch1_subscriptionpaymentsresults"];
    }
    else     {
      $WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
    }
  }
  else     {
    $WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
  }
}
$WADbSearch1->whereClause = str_replace("\\''", "''", $WADbSearch1->whereClause);
$WADbSearch1whereClause = '';
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")) : ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
?>
<?php
$maxRows_WADApaypal_subscription_payments = 10;
$pageNum_WADApaypal_subscription_payments = 0;
if (isset($_GET['pageNum_WADApaypal_subscription_payments'])) {
  $pageNum_WADApaypal_subscription_payments = $_GET['pageNum_WADApaypal_subscription_payments'];
}
$startRow_WADApaypal_subscription_payments = $pageNum_WADApaypal_subscription_payments * $maxRows_WADApaypal_subscription_payments;

((bool)mysqli_query( $connDB, "USE " . $database_connDB));
$query_WADApaypal_subscription_payments = "SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "subscription_payments ORDER BY id DESC";
setQueryBuilderSource($query_WADApaypal_subscription_payments,$WADbSearch1,false);
$query_limit_WADApaypal_subscription_payments = sprintf("%s LIMIT %d, %d", $query_WADApaypal_subscription_payments, $startRow_WADApaypal_subscription_payments, $maxRows_WADApaypal_subscription_payments);
$WADApaypal_subscription_payments = mysqli_query( $connDB, $query_limit_WADApaypal_subscription_payments) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
$row_WADApaypal_subscription_payments = mysqli_fetch_assoc($WADApaypal_subscription_payments);

if (isset($_GET['totalRows_WADApaypal_subscription_payments'])) {
  $totalRows_WADApaypal_subscription_payments = $_GET['totalRows_WADApaypal_subscription_payments'];
} else {
  $all_WADApaypal_subscription_payments = mysqli_query($GLOBALS["___mysqli_ston"], $query_WADApaypal_subscription_payments);
  $totalRows_WADApaypal_subscription_payments = mysqli_num_rows($all_WADApaypal_subscription_payments);
}
$totalPages_WADApaypal_subscription_payments = ceil($totalRows_WADApaypal_subscription_payments/$maxRows_WADApaypal_subscription_payments)-1;
?>
<?php
$queryString_WADApaypal_subscription_payments = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WADApaypal_subscription_payments") == false && 
        stristr($param, "totalRows_WADApaypal_subscription_payments") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WADApaypal_subscription_payments = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WADApaypal_subscription_payments = sprintf("&totalRows_WADApaypal_subscription_payments=%d%s", $totalRows_WADApaypal_subscription_payments, $queryString_WADApaypal_subscription_payments);
?>
<?php
//WA AltClass Iterator
class WA_AltClassIterator     {
  var $DisplayIndex;
  var $DisplayArray;
  
  function WA_AltClassIterator($theDisplayArray = array(1)) {
    $this->ClassCounter = 0;
    $this->ClassArray   = $theDisplayArray;
  }
  
  function getClass($incrementClass)  {
    if (sizeof($this->ClassArray) == 0) return "";
  	if ($incrementClass) {
      if ($this->ClassCounter >= sizeof($this->ClassArray)) $this->ClassCounter = 0;
      $this->ClassCounter++;
    }
    if ($this->ClassCounter > 0)
      return $this->ClassArray[$this->ClassCounter-1];
    else
      return $this->ClassArray[0];
  }
}
?><?php
//WA Alternating Class
$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Results paypal_subscription_payments</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* Title Section */
#WADAPageTitleArea {
	width: 555px;
}
#WADAPageTitleArea div, #WADAPageTitleArea p {
	font-size: 11px;
	padding-bottom: 10px;
}
#WADAPageTitleArea div#WADAPageTitle, #WADAPageTitle {
	font-size: 14px;
	font-weight: bold;
}

.WADAResultsNavigation {
	padding-top: 5px;
	padding-bottom: 10px;
}
.WADAResultsCount {
	font-size: 11px;
}
.WADAResultsNavTop, .WADAResultsInsertButton {
	clear: none;
}
.WADAResultsNavTop {
	width: 60%;
	float: left;
}
.WADAResultsInsertButton {
	width: 30%;
	float: right;
	text-align: right;
}
.WADAResultsNavButtonCell, .WADAResultsInsertButton {
	padding: 2px;
}
.WADAResultsTable {
	font-size: 11px;
	clear: both;
	padding-top: 1px;
	padding-bottom: 1px;
}

.WADAResultsTableHeader, .WADAResultsTableCell {
	padding: 3px;
	text-align: left;
}

.WADAResultsTableHeader {
	padding-left: 12px;
	padding-right: 12px;
}

.WADAResultsTableCell {
	padding-left: 14px;
	padding-right: 14px;
}

.WADAResultsTableCell {
	border-left: 1px solid #BABDC2;
}

.WADAResultsEditButtons {
	border-left: 1px solid #BABDC2;
	border-right: 1px solid #BABDC2;
}

.WADAResultsRowDark {
	background-color: #DFE4E9;
}
</style>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.WADAResultsTableHeader1 {	padding: 3px;
	text-align: left;
}
-->
</style>
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADAResultsContainer"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Standard Subscription Payment History</div>
        <div><a href="subscription-payments-search.php">New Search</a> | <a href="subscription-payments-results.php?show_all=1">Show All</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_subscription_payments > 0) { // Show if recordset not empty ?>
      <div class="WADAResults">
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_subscription_payments + 1) ?> to <?php echo min($startRow_WADApaypal_subscription_payments + $maxRows_WADApaypal_subscription_payments, $totalRows_WADApaypal_subscription_payments) ?> of <?php echo $totalRows_WADApaypal_subscription_payments ?> </div>
          <div class="WADAResultsNavTop">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, 0, $queryString_WADApaypal_subscription_payments); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, max(0, $pageNum_WADApaypal_subscription_payments - 1), $queryString_WADApaypal_subscription_payments); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments < $totalPages_WADApaypal_subscription_payments) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, min($totalPages_WADApaypal_subscription_payments, $pageNum_WADApaypal_subscription_payments + 1), $queryString_WADApaypal_subscription_payments); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments < $totalPages_WADApaypal_subscription_payments) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, $totalPages_WADApaypal_subscription_payments, $queryString_WADApaypal_subscription_payments); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
          <div class="WADAResultsInsertButton"></div>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
          <tr>
            <th width="16%" class="WADAResultsTableHeader">Payment Date</th>
            <th width="9%" class="WADAResultsTableHeader">Name</th>
            <th width="17%" class="WADAResultsTableHeader">Subscription ID</th>
            <th width="16%" class="WADAResultsTableHeader">Transaction ID</th>
            <th width="8%" class="WADAResultsTableHeader">Total</th>
            <th width="11%" class="WADAResultsTableHeader">Fee</th>
            <th width="14%" class="WADAResultsTableHeader">Payment Status</th>
            <th width="9%">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr 
		  <?php 
		  if($row_WADApaypal_subscription_payments['test_ipn'] == 1) 
		  	echo 'style="background-color:#FF9"';
		  elseif($row_WADApaypal_subscription_payments['ipn_status'] == 'Invalid')
		  	echo 'style="background-color:#F33; color:#FF9;"'; 
		  ?> 
          class="<?php echo $WARRT_AltClass1->getClass(true); ?>">
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_subscription_payments['payment_date']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_subscription_payments['first_name']); ?> <?php echo($row_WADApaypal_subscription_payments['last_name']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_subscription_payments['subscr_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_subscription_payments['txn_id']); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($row_WADApaypal_subscription_payments['mc_gross'],2)); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($row_WADApaypal_subscription_payments['mc_fee'],2)); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_subscription_payments['payment_status']); ?></td>
            <td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
              <tr>
                <td><a href="subscription-payments-detail.php?id=<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" id="View<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" alt="View" src="../WA_DataAssist/images/Pacifica/Refined_zoom.gif" /></a></td>
                <td><a href="subscription-payments-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" id="Delete<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_trash.gif" /></a></td>
                </tr>
            </table></td>
          </tr>
          <?php } while ($row_WADApaypal_subscription_payments = mysqli_fetch_assoc($WADApaypal_subscription_payments)); ?>
        </table>
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_subscription_payments + 1) ?> to <?php echo min($startRow_WADApaypal_subscription_payments + $maxRows_WADApaypal_subscription_payments, $totalRows_WADApaypal_subscription_payments) ?> of <?php echo $totalRows_WADApaypal_subscription_payments ?> </div>
          <div class="WADAResultsNavBottom">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, 0, $queryString_WADApaypal_subscription_payments); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, max(0, $pageNum_WADApaypal_subscription_payments - 1), $queryString_WADApaypal_subscription_payments); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments < $totalPages_WADApaypal_subscription_payments) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, min($totalPages_WADApaypal_subscription_payments, $pageNum_WADApaypal_subscription_payments + 1), $queryString_WADApaypal_subscription_payments); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_subscription_payments < $totalPages_WADApaypal_subscription_payments) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_subscription_payments=%d%s", $currentPage, $totalPages_WADApaypal_subscription_payments, $queryString_WADApaypal_subscription_payments); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_subscription_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No results for your search</div>
        <div></div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
  </div>
  <div id="footer">
    <?php require_once('footer.php'); ?>
  </div>
</div>
</body>
</html>
<?php
((mysqli_free_result($WADApaypal_subscription_payments) || (is_object($WADApaypal_subscription_payments) && (get_class($WADApaypal_subscription_payments) == "mysqli_result"))) ? true : false);
?>
