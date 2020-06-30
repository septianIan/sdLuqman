<div class="row">
	<div class="col-lg-4" style="margin:70px 0 0 330px;">
		<div class="panel panel-info">
			<div class="panel panel-heading">
				<a style="font-size:16px"><img src="../icon/warning.png" width="25px" height="25px"> set kkm</a>
			</div>
				<div class="panel-body">
					<table height="200px">
						<tr>
							<td style="font-size:16px;"><strong> kkm kelas </strong></td>
							<td></td>
							<td style="font-size:16px;color:red;"><b><? echo $a_wali['walikelas']?></b></td>
						</tr>
						<tr>
							<td style="font-size:16px;"><strong>KKM</td></strong>
							<td style="width:50px;text-align:center;"><strong>:</td></strong>
							<td style="width:180px;padding-bottom:7px;"><input type="text" name="kkm" class="form-control"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" value="Set" name="simpan" class="btn btn-lg btn-success" style="font-size:12px;float:Right;font-weight:bold;">
							</td>
						</tr>
					</table>
				</div>
		</div>
	</div>	
</div>