<?php
	if($detailplayer)
	{
		$detailplayer = json_decode($detailplayer);
		$dt = $detailplayer->data;
?>
		<div class="head">
			<div class="img-radius">
				<img src="<?php echo $this->library->lastext($dt->url_pic,'.') ? $dt->url_pic : $default;?>/medium" alt="<?php echo $dt->name;?>">
			</div>
			<h2 class="h2-text-bottom"><?php echo $dt->name;?></h2>
			<p style="display:none;">
					ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain ini bio pemain 
			</p>
		</div>
		<div class="container b-t-b-5 table-profile">
			<table style="font-size: 1em;">
				<tr>
					<th colspan="2">Profil</th>
				</tr>
				<tr>
					<td>Kewarganegaraan</td>
					<td><?php echo $dt->nationality;?></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td><?php echo $dt->birth_place;?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td><?php echo $dt->birth_date;?></td>
				</tr>
				<tr>
					<td>Kategori Pemain</td>
					<td><?php echo $dt->status;?></td>
				</tr>
				<tr>
					<td>Tinggi</td>
					<td><?php echo $dt->height;?> cm</td>
				</tr>
				<tr>
					<td>Berat</td>
					<td><?php echo $dt->weight;?> kg</td>
				</tr>
				<tr>
					<td>No. Punggung</td>
					<td><?php echo $dt->number;?></td>
				</tr>
				<tr>
					<td>Nama Panggilan</td>
					<td><?php echo $dt->call_name;?></td>
				</tr>
				<tr>
					<td>Kemampuan Kaki</td>
					<td><?php echo $dt->foot;?></td>
				</tr>
				<tr>
					<td>Posisi Utama</td>
					<td><?php echo $dt->position_a;?></td>
				</tr>
				<tr>
					<td>Posisi Lainnya</td>
					<td><?php echo $dt->position_b;?></td>
				</tr>
			</table>
		</div>
		<div class="container table-blue">
			<h3 class="h3-orange">Karir Klub</h3>
			<div class="table-scroll-x">
			<table class="table-stripe">
				<tr>
					<th>#</th>
					<th>bulan</th>
					<th>Tahun</th>
					<th>Klub</th>
					<th>Turnamen/Kompetisi</th>
					<th>Jumlah Main</th>
					<th>No. Punggung</th>
					<th>Pelatih</th>
				</tr>
				<?php
					$i = 1;
					foreach($dt->career_club as $cc){
				?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $cc->month;?></td>
							<td><?php echo $cc->year;?></td>
							<td><?php echo $cc->club;?></td>
							<td><?php echo $cc->tournament;?></td>
							<td><?php echo $cc->number_of_play;?></td>
							<td><?php echo $cc->back_number;?></td>
							<td><?php echo $cc->coach;?></td>
						</tr>
				<?php
					$i++;
					}
				?>
			</table>
			</div>
			<h3 class="h3-orange">karir timnas</h3>
			<div class="table-scroll-x">
				<table class="table-stripe">
					<tr>
						<th>#</th>
						<th>Tahun</th>
						<th>Turnamen/Kompetisi</th>
						<th>Jumlah Main</th>
						<th>No. Punggung</th>
						<th>Pelatih</th>
					</tr>
					<?php
						$x = 1;
						foreach($dt->career_national as $nc){
					?>
							<tr>
								<td><?php echo $x;?></td>
								<td><?php echo $nc->year;?></td>
								<td><?php echo $nc->club;?></td>
								<td><?php echo $nc->number_of_play;?></td>
								<td><?php echo $nc->back_number;?></td>
								<td><?php echo $nc->coach;?></td>
							</tr>
					<?php
						$x++;
						}
					?>
				</table>
			</div>
			
			<h3 class="h3-orange">Prestasi</h3>
			<div class="table-scroll-x">
				<table class="table-stripe">
					<tr>
						<th>#</th>
						<th>Tahun</th>
						<th>Turnamen/Kompetisi</th>
						<th>Negara</th>
						<th>Peringkat</th>
						<th>Penghargaan</th>
					</tr>
					<?php
						$x = 1;
						foreach($dt->achievement as $ac){
					?>
							<tr>
								<td><?php echo $x;?></td>
								<td><?php echo $ac->year;?></td>
								<td><?php echo $ac->tournament;?></td>
								<td><?php echo $ac->country;?></td>
								<td><?php echo $ac->rank;?></td>
								<td><?php echo $ac->appreciation;?></td>
							</tr>
					<?php
						$x++;
						}
					?>
				</table>
			</div>
			
			<h3 class="h3-orange" style="display:none;">detail posisi</h3>
			<div class="container detail-posisi" style="display:none;">
				<img src="http://static.eyesoccer.id/v1/cache/images/LOGO%20UNTUK%20APLIKASI.jpg/small" alt="" style="display:none;">
				<div class="container" style="background-color: #fafafaa3;">
					<div class="half-content">
						<h4>posisi utama</h4>
						<span>gelandang bertahan</span>
					</div>
					<div class="half-content">
						<h4>posisi lainnya</h4>
						<span>gelandang tengah</span>
						<span>bek tengah</span>
					</div>
				</div>
			</div>
			<h3 class="h3-orange" style="display:none;">statistik</h3>
			<div class="container eprofile-statistik" style="display:none;">
				<table>
					<tr>
						<th colspan="2">
							<ul>
								<li>
									<a href="#">Home</a>
								</li>
								<li>
									<a href="#">Menu 1</a>
								</li>
								<li>
									<a href="#">Menu 2</a>
								</li>
								<li>
									<a href="#">Menu 3</a>
								</li>
							</ul>
						</th>
					</tr>
					<tr>
						<td>lorem</td>
						<td>ipsum</td>
					</tr>
					<tr>
						<td>lorem</td>
						<td>ipsum</td>
					</tr>
					<tr>
						<td>lorem</td>
						<td>ipsum</td>
					</tr>
					<tr>
						<td>lorem</td>
						<td>ipsum</td>
					</tr>
				</table>
			</div>
			<h3 class="h3-orange">Foto galeri</h3>
			<div class="container">
				<?php foreach($dt->gallery as $gl)
				{
				?>
					<div class="display-img">
						<img class="container" src="<?php echo $gl->url_pic;?>" alt="<?php echo $dt->name;?>">
					</div>
				<?php 
				}
				?>
				<div class="arrow">
					<i class="material-icons">keyboard_arrow_left</i>
					<i style="float: right;" class="material-icons">keyboard_arrow_right</i>
				</div>
			</div>
		</div>
		<script>
				$(document).ready(function(){
					$("li#slug_pemain_detail").html("<?php echo $dt->name;?>");
				});
		</script>
			<?php
	}
?>