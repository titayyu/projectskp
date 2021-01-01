
<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaksi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> CV. Tita Jaya
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Toko
          <address>
            <strong>Tita Jaya.</strong><br>
            Jalan<br>
            Tawangsari Permai A-20<br>
            Telp : 081 33654 6637<br>
            Email: titajayaa@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Pembeli
          <address>
            <strong><?= $pelanggan->nama?></strong><br>
            <?= $pelanggan->alamat?> <br>
            Telpon: <?= $pelanggan->telp?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Transaksi ID:</b> <?= $pelanggan->id_transaksi?><br>
          <b>Tanggal Transaksi:</b> <?= $pelanggan->tanggal?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Deskripsi</th>
              <th>Quantity</th>
              <th>Ukuran</th>
              <th>Harga</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach($produk as $data){
               echo "<tr>
              <td>". $no++ ."</td>
              <td>".$data->nama_produk."</td>
              <td>".$data->deskripsi_transaksi."</td>
              <td>".$data->quantity."</td>
              <td>".$data->ukuran."</td>
              <td>".$data->harga."</td>
              <td>".$data->total."</td>
            </tr>";
              }
                ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Pembayaran</p>

          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th>Total:</th>
                <td><?php
                $total = 0;
                foreach($produk as $data){
                  $subtotal = $data->total;
                  $total += (int)$subtotal;

                  
                }
                echo 'Rp. ' .$total;
                ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" target="_blank" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>