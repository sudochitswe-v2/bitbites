<?php
header('Content-type: application/json');
include('dbconnect.php');

$sql="SELECT * FROM RecipesTable";
$result=mysqli_query($connection,$sql);

$data=[];
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
}
echo json_encode(['Success' => true, 'data' => $data]);
?>

<script>
  
</script>
