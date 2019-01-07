<div class="container">
	<div class="row">
		<div class="well">
			<center>
				<h3>Sveiki, <u><?php echo $this->session->userdata('user_name'); ?>!</u></h3>
			</center>
		</div>
	</div>
</div>
<div class="container">
<?php echo form_open('user'); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<h3>Vartotojo informacija:</h3>
				<table class="table">
					<tr>
						<th>Prisijungimo vardas: <b></th><th><?php echo $this->session->userdata('user_name'); ?></b></th>
					</tr>
					<tr>
						<th>El. pašto adresas: <b></th><th><?php echo $this->session->userdata('user_email'); ?></b></th>
					</tr>
					<tr>
						<?php echo form_open('user/renew_user'); ?>
						<form action="renew_user" method="POST">
						<th><label for="user_fname">Vardas:</label></th>
						<th> <input type="text" id="user_fname" name="user_fname" placeholder="<?php echo $this->session->userdata('user_fname') ?>" /></th>
					</tr>
					<tr>
						<th>Pavardė:</th>
						<th> <input type="text" id="user_lname" name="user_lname" placeholder="<?php echo $this->session->userdata('user_lname') ?>" /></th>
					</tr>
					<tr>
						<th>Adresas:</th>
						<th> <input type="text" id="address" name="address" placeholder="<?php echo $this->session->userdata('address') ?>" /></th>
					</tr>
					<tr>
						<th>Telefonas:</th>
						<th> <input type="text" id="mobile" name="mobile" placeholder="<?php echo $this->session->userdata('mobile') ?>" /></th>
					</tr>		
				</table>
				<button type="renew_user" name="renew_user" value="renew_user">Atnaujinti duomenis</button>
			</div>
			<?php echo form_close(); ?>

		</div>
	



		<div class="row">
			<div class="col-md-7">
				<div class="well">
					<h3>Pridėti skelbimą:</h3>
					<table class="table">
						<font color="red">Pirmiausia įkelkit nuotrauką <a href='<?php echo base_url() . "user/foto";?>'>Čia</a></font>
						<br />
						
					
					<form action="product_insert" method="POST">
						  
						<?php echo form_open("Shopping_cart/productform"); ?>  
					
					
						<tr>
							<th><label for="product_name">Pavadinimas:</label></th>
							<th></b> <input type="text" id="product_name" pattern=".{4,250}" required title="Įveskite aiškų skelbimą, aprašant pagrindines funkcijas. Minimalus raidžių kiekis: 20; Maksimalus: 250" name="product_name" placeholder="pvz.: xbox 360" value="<?php echo set_value('product_name'); ?>" /></th>
						</tr>
						<tr>
							<th><b><label for="product_price">Kaina dienai (€):</label></b> </th>
							<th><input type="number" min="1" id="product_price" name="product_price" placeholder="pvz.: 10" value="<?php echo set_value('product_price'); ?>" /></th>
						</tr>
							<input type="hidden" id="owner" name="owner" value="<?php echo $this->session->userdata('user_name'); ?>" />
						<tr>
							<th><b>Nuotraukos pavadinimas:</b></th>
							<th><input type="text" id="product_image" name="product_image" value=" " placeholder="" /></th>
						</tr>		
						<tr>
							<th><b>Kategorija:</b></th>
							<th>
								<select id="category_id" name="category_id">
								  <option value="automobiliai">Automobiliai</option>
								  <option value="dronai">Dronai</option>
								  <option value="irankiai">Įrankiai</option>
								  <option value="motociklai">Motociklai</option>
								  <option value="vaikams">Vaikams</option>
								  <option value="sportas">Sportas</option>
								  <option value="ivairus">Įvairūs</option>
								  <option value="konsoles">Žaidimų konsolės</option>
								</select>
							</th>
						<tr>
						<tr>
							<th><b>Nuotrauka:</b></th>
							<th>
								
								
								<input type="file" name="userfile" size="20" />
								
							</th>
							</tr>
						</tr>
					</table>
						
					<button type="submit" name="submit" value="save">Įkelti</button> 
						<?php echo form_close(); ?>
						<?php echo validation_errors('<p class="error">'); ?>
						
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="container">
	<div class="col-md-4">
		<div class="well">
			<h4>Profilio nuotraukos įkėlimas:</h4>
			Dabartinė nuotrauka:<br/>
			<?php
				$this->load->helper('directory');
				$usr = $this->session->userdata('user_name');
				$filename = "myassets/user_photo/"."$usr".".jpg";
				$dir = "myassets/user_photo/";
				if (file_exists($filename)) {
					echo '<img src="',base_url($dir).'/'.$usr.'" height="100" width="100">
					<br/> <a href="?delete=1">Trinti</a> ';
				} else {
					echo "<b>Nuotraukos dar nesate įkėlęs(-usi)</b>";
				}
				?>
						<?php
						$this->load->helper('directory');
						$usr = $this->session->userdata('user_name');
						$filename = "myassets/user_photo/"."$usr".".jpg";
							if(isset($_GET['delete']))
							{
								unlink($filename);	
							}
						?>
			</br>
			<tr>
				<th><?php echo form_open_multipart('user_photo/do_upload');?>
				<input type="file" name="userfile" size="20" /></th>
			</tr>
			<tr>
				<th></th>
				<th><input type="submit" value="Įkelti" /></th>
			</tr>
		</div>
	</div>
</div>
