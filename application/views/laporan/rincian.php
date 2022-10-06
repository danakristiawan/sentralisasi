<div id="judul1" style="margin-top: 10px;">
	<strong>REGISTER PERUBAHAN</strong><br>
	<small>Bulan : <?= $bulan['bulan'] . ' ' . $tahun; ?></small>
</div>

<br>
<table class="detail" style="width: 100%; margin-left:3px; margin-bottom:15px;">
	<tr style="text-align: center;">
		<td class="head" style="width: 4%;">No</td>
		<td class="head" style="width: 20%;">Nama/NIP</td>
		<td class="head" style="width: 16%;">Jenis</td>
		<td class="head" style="width: 16%;">Nomor</td>
		<td class="head" style="width: 9%;">Tgl</td>
		<td class="head" style="width: 26%;">Uraian</td>
		<td class="head" style="width: 9%;">TMT</td>
	</tr>
	<?php if ($perubahan) : ?>
		<?php $no = 0;
		foreach ($perubahan as $r) : $no++; ?>
			<tr>
				<td class="head" style="width: 4%; text-align: center;"><?= $no; ?></td>
				<td class="head" style="width: 20%;"><?= $r['nama'] . '/ ' . $r['nip']; ?></td>
				<td class="head" style="width: 16%;"><?= $r['dok']; ?></td>
				<td class="head" style="width: 16%;"><?= $r['no']; ?></td>
				<td class="head" style="width: 9%; text-align: center;"><?= $r['tgl'] == null ? '' : date('d-m-Y', $r['tgl']); ?></td>
				<td class="head" style="width: 26%;"><?= $r['uraian']; ?></td>
				<td class="head" style="width: 9%; text-align: center;"><?= $r['tmt'] == null ? '' : date('d-m-Y', $r['tmt']); ?></td>
			</tr>
		<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td colspan="7" class="head" style="width: 100%; height:40px; text-align: center;">Data Perubahan Nihil.</td>
		</tr>
	<?php endif; ?>
</table>

<table style="width: 100%; margin-bottom:40px; font-size:11px;">
	<tr>
		<td style="width: 65%;"></td>
		<td style="width: 35%;">Mengetahui,</td>
	</tr>
	<tr>
		<td style="width: 65%;"></td>
		<td style="width: 35%;"><?= $profil['jab_ttd_skp']; ?></td>
	</tr>
</table>
<table style="width: 100%; font-size:11px;">
	<tr>
		<td style="width: 65%;"></td>
		<td style="width: 35%;"><?= $profil['nama_ttd_skp']; ?></td>
	</tr>
	<tr>
		<td style="width: 65%;"></td>
		<td style="width: 35%;">NIP <?= $profil['nip_ttd_skp']; ?></td>
	</tr>
</table>

</page>