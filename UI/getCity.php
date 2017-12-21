<?php
require_once("../config/config.php");
$connect = new Connect();
if(!empty($_POST["idProvince"]))
{
	$id = $_POST["idProvince"];
	$query = "SELECT * FROM city WHERE idProvince = ".$id ."";
	$results = $connect->select($query);
	?>
	<option></option> 
<?php
	foreach ($results as $result){
		?>
		<option value ='<?php echo $result["idCity"];?>'><?php echo $result['cityName'];?></option>
		<?php
	}
}
?>
	
