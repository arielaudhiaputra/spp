

    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-TGuQToHH-sCUJP62"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>






<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('transaksi'); ?>
			<div class="card">
				<form id="payment-form" method="post" action="<?=base_url('snap/finish')?>">
					<div class="card-header">
            Transaksi Pembayaran SPP
          </div>

					<div class="card-body border-top py-0 my-3">
						<div class="row mt-3">
							<div class="col-xs-12 col-sm-2">
								<div class="form-group">
									<label for="id_spp">Tahun Bayar : </label>
									<select name="id_spp" id="id_spp" class="form-control" required>
										<option disabled selected hidden required>-- Tahun --</option>
										<?php foreach($spp as $s): ?>
											<option value="<?= $s['id_spp']; ?>"><?= $s['tahun']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="bulan_bayar">Bulan Bayar : </label>
									<select name="bulan_bayar" id="bulan_bayar" class="form-control" required>
										<option disabled selected hidden required>-- Bulan --</option>
											<option value="Januari">Januari</option>
											<option value="Februari">Februari</option>
											<option value="Maret">Maret</option>
											<option value="April">April</option>
											<option value="Mei">Mei</option>
											<option value="Juni">Juni</option>
											<option value="Juli">Juli</option>
											<option value="Agustus">Agustus</option>
											<option value="September">September</option>
											<option value="Oktober">Oktober</option>
											<option value="November">November</option>
											<option value="Desember">Desember</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="jumlah_bayar">Jumlah Bayar : </label>
									<input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="Rp. 350,000" placeholder="Rp. 350,000" disabled required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 mt-1 float-right">
                <br>
                <button id="pay-button" type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Bayar </button>
							</div>
							<!-- <div class="col-xs-12 col-sm-2 mt-1 float-right">
                <br>
                <button id="pay-button" type="submit" class="btn btn-primary btn-block">How to pay <i class="fa fa-question"></i></button>
							</div> -->
						</div>
					</div>
			</div>
		</div>
	</div>



    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
                <th>No</th>
								<th>Order ID</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Gross Amount</th>
                <th>Payment Type</th>
                <th>Bank</th>
								<th>VA Number</th>
								<th>Transaction Time</th>
                <th>Status</th>
							</thead>
							<tbody>
                <?php $i = 1 ?>
                <?php foreach($transaksi as $t): ?>
								<tr>
                  <td><?= $i ?></td>
                  <td><?= $t['order_id'] ?></td>
                  <td><?= $t['tahun'] ?></td>
                  <td><?= $t['bulan_bayar'] ?></td>
                  <td>Rp. <?= number_format($t['gross_amount']) ?></td>
                  <td><?= $t['payment_type'] ?></td>
                  <td><?= $t['bank'] ?></td>
                  <td><?= $t['va_number'] ?></td>
                  <td><?= $t['transaction_time'] ?></td>
                  <td class="text-success"><?= $t['transaction_status'] ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<input type="hidden" name="result_type" id="result-type" value=""></div>
<input type="hidden" name="result_data" id="result-data" value=""></div>





</form>






    <script type="text/javascript">

    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

    var name = $("name").val();
    var id_spp = $("#id_spp").val();
    var jumlah_bayar = $("#jumlah_bayar").val();
    $.ajax({
      type: 'POST',
      url: '<?= base_url('snap/token')?>',
      data: {name:name,id_spp:id_spp,jumlah_bayar:jumlah_bayar},
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>


</body>
</html>
