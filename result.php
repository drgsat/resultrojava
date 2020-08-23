<meta http-equiv="Content-Type"
    content="text/html; charset=utf-8" />
<?php require_once('Connections/drgsat.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

$colname_rs_search = "-1";
if (isset($_POST['txt_search'])) {
  $colname_rs_search = $_POST['txt_search'];
}
mysql_select_db($database_drgsat, $drgsat);
$query_rs_search = sprintf("SELECT * FROM jadwal WHERE `number` = %s", GetSQLValueString($colname_rs_search, "int"));
$rs_search = mysql_query($query_rs_search, $drgsat) or die(mysql_error());
$row_rs_search = mysql_fetch_assoc($rs_search);
$totalRows_rs_search = mysql_num_rows($rs_search);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <table width="301" border="1">
    <tr>
      <td width="196"><div align="center"><?php echo $row_rs_search['number']; ?></div></td>
      <td width="89"><div align="center"><strong>hejmar</strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><?php echo $row_rs_search['name']; ?></div></td>
      <td><div align="center"><strong>nav</strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><?php echo $row_rs_search['father']; ?></div></td>
      <td><div align="center"><strong>bav</strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><?php echo $row_rs_search['mother']; ?></div></td>
      <td><div align="center"><strong>dê</strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><?php echo $row_rs_search['natiga']; ?></div></td>
      <td><div align="center"><strong>encam</strong></div></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($rs_search);
?>
