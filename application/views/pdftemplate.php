<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<style type="text/css">
		<!--
		/*body {
			font-family: sarabun;
			font-size: 16px;
		}*/
	-->
</style>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>
<body>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" style="font-size:23pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_samf_monitor_rep"); ?></span></td>
		</tr>
		<tr>
			<td align="center" style="font-size:16pt;"><span lang="th"><?php echo $daterange; ?></span></td>
		</tr>
	</table>
	<br/>
	<table bordercolor="#424242" width="100%" height="78" border="1"  align="center" cellpadding="0" cellspacing="0">
		<tr align="center" bgcolor="#D5D5D5">
			<th width="15%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_date"); ?></span></th>
			<th width="10%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_time"); ?></span></th>
			<th width="10%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_type"); ?></span></th>
			<th width="17%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("application"); ?></span></th>
			<th width="18%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_func"); ?></span></th>
			<th width="30%" style="font-size:16pt; font-weight:bold;"><span lang="th"><?php echo $this->lang->line("pdf_tem_message"); ?></span></th>
		</tr>
		<?php foreach ($data as $Data) {
			echo "<tr>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\"><span lang=\"th\">" . $Data['log_date'] . "</span></td>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\"><span lang=\"th\">" . $Data['log_time'] . "</span></td>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\" lang=\"th\"><span lang=\"th\">" . $Data['log_type'] . "</span></td>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\" lang=\"th\"><span lang=\"th\">" . $Data['log_appname'] . "</span></td>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\" lang=\"th\"><span lang=\"th\">" . $Data['log_funcname'] . "</span></td>";
			echo "<td align=\"center\" style=\"font-size:14pt;font-family:saraban\" lang=\"th\"><span lang=\"th\">" . $Data['log_data'] . "</span></td>";
			echo "</tr>";
		}
		?>
	</table>
	<br/>
	<i style="font-size:10px"><?php echo $this->lang->line("pdf_tem_gener_by_samf"); ?></i>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new CreatePDF('tha','A4','0');
$pdf->SetAutoFont(AUTOFONT_THAIVIET);
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>