<?php
	if($competitionlist)
	{
?>
		<select id="" name="" selected="true" class="slc-musim" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<option value>--Pilih Liga--</option>
<?php
		$comptition = "";
		$competitionlist = json_decode($competitionlist);

		foreach($competitionlist->data as $dt) 
		{
			if($dt->competition=='SSB / Akademi Sepakbola')
			{
				$comptition = 'Non Liga';
			} 
			else
			{
				$comptition = $dt->competition;
			}

			if ($submenu == 'klub')
			{
?>
				<option value="<?php echo base_url()."eyeprofile/klub/".$comptition?>"> 
					<?php echo $comptition;?> 
				</option>
<?php				
			}
			else if ($submenu == 'pemain')
			{
?>
				<option value="<?php echo base_url()."eyeprofile/pemain/".$comptition?>"> 
					<?php echo $comptition;?> 
				</option>
<?php				
			}
			else
			{
?>
				<option value="<?php echo base_url()."eyeprofile/official/".$comptition?>"> 
					<?php echo $comptition;?> 
				</option>
<?php
			}
		}
?>
		</select>
<?php
	}
?>

	