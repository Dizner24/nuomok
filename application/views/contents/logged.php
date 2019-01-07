<div class="container">
	<?php
		
		if(($this->session->userdata('user_id')=="1")){
			echo "<h1>Administravimo pultas</h1>";
			} else {
				echo "<h1>Prisijungėte sėkmingai!</h1>";
		}
		
		if(($this->session->userdata('user_id')=="1")){
			$this->load->view('contents/admin');
		} else {
			$this->load->view('contents/index');
		}
		
	?>	
</div>