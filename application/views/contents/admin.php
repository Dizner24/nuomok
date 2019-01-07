<div class="container">
<div class="well">
	<i>Sveiki sugrįžę...</i>
</div>

	<div class="row">
		<div class="col-md-5">
		
			<div class="well">
			<center><h4> Informacija apie vartotojus</h4></center>
			<i>Šiuo metu vartotojų yra: </i><b><?php echo $this->db->count_all_results('user'); ?></b></br>
					<?php $query = $this->db->get('user'); ?>
				<table width="100%" border="2">
					<tr>
						<th>&nbsp; ID &nbsp;</th>
						<th>&nbsp;Vartotojo vardas&nbsp;</th>
						<th>&nbsp;El. paštas&nbsp;</th>
						<th>&nbsp;Trinti vartotoją&nbsp;</th>
					</tr>
						<?php foreach ($query->result() as $row){ ?>	
					<tr>
						<td><center> <?php echo $row->id; ?></center></td>
						<td><center> <?php echo $row->username; ?></center></td>
						<td><center> <?php echo $row->email; ?></center></td>
						<td><center><a href="<?=site_url("user/delete_user/{$row->id}")?>">Trinti</a> </center></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well">
				<center><h4>Informacija apie skelbimus</h4></center>
				<i>Šiuo metu skelbimų yra: </i><b><?php echo $this->db->count_all_results('product'); ?></b></br>
					<?php $query = $this->db->get('product'); ?>
				<table width="100%" border="2">
					<tr>
						<th>&nbsp; ID &nbsp;</th>
						<th>&nbsp;Pavadinimas&nbsp;</th>
						<th>&nbsp;Kategorija&nbsp;</th>
						<th>&nbsp;Kaina&nbsp;</th>
						<th>&nbsp;Nuotrauka&nbsp;</th>
						<th>&nbsp;Trinti skelbimą&nbsp;</th>
					</tr>
						<?php foreach ($query->result() as $row){ ?>
					<tr>
						<td><center> <?php echo $row->product_id; ?></center></td>
						<td><center> <?php echo $row->product_name; ?></center></td>
						<td><center> <?php echo $row->category_id; ?></center></td>
						<td><center> <?php echo $row->product_price; ?></center></td>
						<td><center> <?php echo $row->product_image; ?></center></td>
						<td><center><a href="<?=site_url("user/delete_product/{$row->product_id}")?>">Trinti</a> </center></td>
					</tr>
						<?php } ?>
					</table>
	</div>	
</div>			
</div>			


<div class="row">
	<div class="well">
	<h3>Puslapio valdymas</h3>
	<hr>
	<form action="admin_data" method="POST">
	Titulinio puslapio tekstas (neprisijungus): <br /><textarea cols="50" rows="5" id="hello" name="hello" value="<?php echo $this->session->userdata('hello') ?>" /></textarea>
	<br /><button type="admin_data" name="admin_data" value="save">Saugoti</button>
	</div>
</div>
		
	
