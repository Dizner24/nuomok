	<div class="container">
		<div class="row top-buffer">
			<div class="col-lg-6">
				<div class="well">
				<center>
					<h2>Prisijungimas:</h2>
						<div class="row">
							<div class="col-md-5">
								<?php echo form_open("user/login"); ?>
								<label for="email">Vartotojo vardas:</label>
							</div>
							<div class="col-md-5">
								<input type="text" id="email" name="email" value="" />
							</div>
							<div class="col-md-5">
								<label for="password">Slaptažodis:</label>
							</div>
							<div class="col-md-5">
								<input type="password" id="pass" name="pass" value="" />
							</div>
						</div></br>
						<input type="submit" class="" value="Prisijungti" />
						
						<?php echo form_close(); ?>
				</center>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="well">
					
					<?php echo form_open("user/registration"); ?>
					<center>
					<h2>Registracija:</h2>
					<div class="row">
						<div class="col-md-5">
							<p><label for="user_name">Vartotojo vardas:</label>
						</div>
						<div class="col-md-5">
							<input type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" /></p>
						</div>
						<div class="col-md-5">
							<p><label for="email_address">El. paštas:</label>
						</div>
						<div class="col-md-5">
							<input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" /></p>
						</div>
						<div class="col-md-5">
							<p><label for="password">Slaptažodis:</label>
						</div>
						<div class="col-md-5">
							<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" /></p>
						</div>
						<div class="col-md-5">
							<p><label for="con_password">Pakartokite slaptažodį:</label>
						</div>
						<div class="col-md-5">
							<input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" /></p>
						</div>
					</div>
					<p><input type="submit" class="greenButton" value="Registruotis" /></p>
					 <?php echo form_close(); ?>
					 <?php echo validation_errors('<p class="error">'); ?>
					 </center>
				</div>
	</br>
	
			</div>
		</div>
	</div>

