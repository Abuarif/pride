<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMS :: Advertisement Management System (1.0)</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif;font-size:20px">
	<div>
		Rujukan kami : <?php echo $doc_number; ?>
		<br/><br/>		
		<?php
			$bulan = array(1 => "Januari", "Februari", "Mac", "April", "Mei", "Jun", "Julai", "Ogos", "September", "Oktober", "November", "Disember");
			
			$hari = array("Ahad", "Isnin", "Selasa", "Rabu", "Khamis", "Jumaat", "Sabtu");

			$cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y");
			
			$cetak = date("j ") . $bulan[(int)date('m')] . date(" Y");
			
			echo $cetak;
		?>
		
		<br/><br/>
		<b>Suruhanjaya Pengangkutan Awam Darat (SPAD), </b>
		<br/>
		Aras 11, Tower 1 Menara Amfirst, 
		<br/>
		Jalan SS 7/15, 47301 Kelana Jaya,
		<br/>
		Selangor Darul Ehsan, Malaysia 
		<br/><br/>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:40px;height;40px;vertical-align:top;">
					<b>U/p</b>
				</td>
				<td style="width:20px;text-align:center;vertical-align:top;">
					<b>:</b>
				</td>
				<td>
					<b><?php echo Configure::read('AMS.spad1'); ?></b>
					<br/>
					<b><?php echo Configure::read('AMS.spad2'); ?></b>
				</td>
			</tr>
		</table>
		<br/>
		Tuan,
		<br/><br/>
		<b>PERMOHONAN MEMPAMERKAN PAPARAN IKLAN DI BADAN BAS HENTI-HENTI RAPIDKL</b>
		<hr>
		<br/><br/>
	</div>
	<div style="text-align: justify;text-justify: inter-word;margin-top:-40px;">
		Dengan segala hormatnya kami merujuk perkara di atas.
		<br/><br/>
		Ingin dimaklumkan di sini, bahawa Syarikat Prasarana Malaysia Berhad (PMB) telah melantik kami Prasarana Integrated Development Sdn Bhd (PRIDE)  untuk mengendalikan pemasaran dan pengekomersilan aset-aset PMB termasuklah Rapidbus Sdn Bhd bagi menguruskan segala aktiviti pengiklanan dibahagian badan bas.
		<br/><br/>
		Sehubungan dengan itu pihak kami telah diarahkan oleh pihak Rapidbus Sdn Bhd untuk mendapatkan surat kebenaran dari pihak SPAD bagi pemasangan iklan tersebut seperti mana yang diperlukan oleh pihak Puspakom semasa menjalani aktiviti pemeriksaan bas.
		<br/><br/>
		Dengan ini, memohon jasa baik pihak tuan untuk mengeluarkan surat kebenaran bagi aktiviti pemasangan paparan iklan tersebut. Untuk rujukan dan tindakan lanjut tuan, dilampirkan adalah dokumen-dokumuen berikut:
		<br/><br/>
	</div>
	<div style="padding-left:40px;">
		a)	<b>Lampiran 1</b> - Laporan Pemasangan 'sticker' iklan pada badan bas dan nombor pendaftaran bas. 
		<br/><br/>
		b)	<b>Lampiran 2</b>  -  Visual iklan. 
	</div>
	<div>
		<br/><br/> 
		Kerjasama dari pihak tuan amat diharapkan dan didahului dengan ucapan ribuan terima kasih.
		<br/><br/> 
		Sekian.
		<br/><br/> 
		Yang benar,
		<br/>
		<b>PRASARANA INTEGRATED DEVELOPMENT SDN BHD</b>
		<br/><br/><br/><br/> 

		<b>
		<?php echo strtoupper(Configure::read('AMS.gmd_name')); ?>
		<br/>
		Ketua Pengurusan Pengiklanan dan Tajaan
		</b>
		<br/><br/> 
	</div>
	<div align="right" style="page-break-before:always">
		<b>Lampiran 1</b>
		<br/><br/>
	</div>
	<div>
		<b>a)	Laporan Pemasangan 'sticker' iklan pada badan bas</b>
		<br/><br/> 
		
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="text-align:center;width:50px;height:50px;">No</td>
				<td style="text-align:center;width:150px;">Iklan</td>
				<td style="text-align:center;width:100px;">Kuantiti Bas</td>
				<td style="text-align:center;width:400px;">Tempoh Pemasangan</td>
				<td style="text-align:center;width:250px;">Bahagian Bas Yang DiPasang</td>
			</tr>
			<tr>
				<td style="text-align:center;width:50px;height:50px;">1</td>
				<td style="text-align:center;width:150px;height:50px;">
					<?php
						echo $campaignOrderDetail['Campaign']['name'];
					?>
				</td>
				<td style="text-align:center;width:50px;">
					<?php 
						$totalBus = count($campaignOrderDetail['ProvisionBus']);
						echo $totalBus;
					?>
				</td>
				<td style="text-align:center;width:400px;">
					<?php
						$startDate = $campaignOrderDetail['Campaign']['start_date'];
						$endDate = $campaignOrderDetail['Campaign']['end_date'];
						
						echo $this->Time->format($startDate, '%d %B %Y')
						. ' - '. 
						$this->Time->format($endDate, '%d %B %Y');
					?>
				</td>
				<td style="text-align:center;width:250px;"><?php echo $campaignOrderDetail['CampaignOrderType']['name']?></td>
			</tr>
		</table>
	</div>
	<div>
		<br/><br/><br/>
		<b>b)	Nombor pendaftaran bas</b>
		<br/><br/>
		
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="text-align:center;width:50px;height:50px;">No </td>
				<td style="text-align:center;width:300px;">Depot</td>
				<td style="text-align:center;width:300px;">No Pendaftaran Bas</td>
				<td style="text-align:center;width:300px;">Model Bas</td>
			</tr>
			<?php $counter = 1;
				foreach ($campaignOrderDetail['ProvisionBus'] as $provisionBus): 
			?>
			<tr>
				<td style="text-align:center;width:50px;height:50px;">
					<?php
						echo $counter;
					?>
				</td>
				<td style="text-align:center;width:300px;">
					<?php
						if (!empty($provisionBus['depot_id'])) {
							$myDepot = $this->requestAction('/pride/depots/get_depot/'.$provisionBus['depot_id']);
							echo $myDepot['Depot']['name'];
						} else {
							echo "Not yet configured";
						}
					?>
				</td>
				<td style="text-align:center;width:300px;">
					<?php
						
						if (!empty($provisionBus['depot_id'])) {
							$myBus = $this->requestAction('/pride/buses/get_bus/'.$provisionBus['bus_id']);
							echo $myBus['Bus']['name'];
						} else {
							echo "Not yet configured";
						}
					?>
				</td>
				<td style="text-align:center;width:300px;">
					<?php
						if (!empty($provisionBus['depot_id'])) {
							echo $myBus['Bus']['brand'];
						}else{
							echo "Not yet configured";
						}
					?>
				</td>
			</tr>
			<?php $counter++ ?>
			<?php endforeach; ?>
		</table>
	</div>
	<div align="right" style="page-break-before:always">
		<b>Lampiran 2</b>
		<br/><br/>
	</div>
	<div>
		<b>a) Visual Iklan</b>
		
		<?php
					
			//Temporary closed
			/*$myVisual = $this->requestAction('/pride/campaign_order_details/get_provision_visual/'. $campaignOrderDetail['CampaignOrderDetail']['id']);*/
		?>
		
		<br /><br />
		
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<?php foreach ($campaignDesigns as $campaignDesign): ?>
			
			<tr>
				<td>
					<?php	
						echo $this->Html->image("../attachments/".$campaignDesign['CampaignDesign']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));
					?>
				</td>
			</tr>
			
			<?php endforeach; ?>
		</table>
	</div> 
</body>
</html>
