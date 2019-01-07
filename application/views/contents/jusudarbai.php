<div class="container">
	
	<div class="well">
		<center><h1>Jūsų darbai</h1></center>
	</div>
	<?php
	if(($this->session->userdata('user_id')!="")){
		echo "<div class='well'>",
				  form_open_multipart('upload_users/do_upload'),
				"<input type='file' name='userfile' size='20' />",
				"<br/>",
				"<input type='submit' value='Įkelti' />",
				"</form>";
		}
	?>
	</div>
	<center>
	<div class="container">
	<?php 
		$this->load->helper('directory'); 
		$dir = "uploads/jusudarbai/"; 
		$map = directory_map($dir); 

		foreach ($map as $k)
		{?>
     <img src="<?php echo base_url($dir)."/".$k;?>" height="200" width="200" alt="">
   
		<?php }
          
?> 
</center>
	</div>
	
