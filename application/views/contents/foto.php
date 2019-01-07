<div class="container">
	<div class="row">
		<div class="well">
		<tr>
							<th><b>Įkelkit nuotrauką:</b></th>
							<th><?php echo form_open_multipart('upload_users/do_upload');?>
								<input type="file" name="userfile" size="20" /></th>
						</tr>
						<tr>
							<th></th>
							<th><input type="submit" value="Įkelti" /></th>
						</tr>
		</div>
		<div class="well">
			<h3><a href='<?php echo base_url() . "user/useris";?>'>Tęsti</a></h3>
		</div>
	</div>
</div>