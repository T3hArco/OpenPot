<?php
	if(!defined('INCLUDED_BY_MAIN')) die();
	if($config['pot']['enabled'] == true) {
		$result = $db->query(
			"SELECT `post`.*, `owner`.`username` as 'owner' ".
			"FROM `pot_sites` AS `post` ".
			"INNER JOIN `pot_users` AS `owner` ".
			"ON `post`.`ownerid` = `owner`.`id` ".
			"ORDER BY `id` DESC"
		);
		while($row = mysql_fetch_array($result)) {
?>
		<table  style="padding: 0px; margin-left: auto; margin-right: auto; border: 1px solid black;">
			<tr>
				<td style="width: 20%;"><a href="<?php print strip_tags($row['site'], $config['pot']['allowtags']); ?>"><?php print strip_tags($row['site'], $config['pot']['allowtags']); ?></a> </td>
				<td style="width: 40%;"><?php print strip_tags($row['reason'], $config['pot']['allowtags']); ?></td>
				<td style="width: 20%; text-align: center;"><?php print strip_tags($row['owner'], $config['pot']['allowtags']); ?></td>
				<td style="width: 20%; text-align: center;"><?php print strip_tags($row['date'], $config['pot']['allowtags']); ?></td>
			</tr>
		</table>
			

<?php
		}
	} else {
		print "<center>The system has been disabled by the administrator.</center>";
	}
?>
