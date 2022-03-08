<?
function get_like($id)
{
	require('./connect.php');
	$sql = "SELECT `likes`
	FROM `output_videos`
	WHERE `id` = ?
	";
	$get = $connect -> prepare($sql);
	$get -> execute([$id]);
    $arr = $get->fetch(PDO::FETCH_ASSOC);
	if($arr)
	{
		return $arr['likes'];
	}
}

function update_like($id, $like, $update)
{
	require('./connect.php');

	// echo $id .'/'. $like .'/'. $update;

	$sql = "UPDATE `output_videos` SET `likes`= ? WHERE `id` = ?";	
	$save = $connect->prepare($sql);

	$save->execute([($like+$update), $id]);

	return $like+$update;
}
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$update = $_POST['update'];
	$like = get_like($id);
	echo update_like($id, $like, $update);
}
?>