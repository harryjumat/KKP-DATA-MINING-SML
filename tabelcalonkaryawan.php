<?php
include 'conn.php';
include "header.php";

// menentukan limit data yang ditampilkan per halaman
$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $conn->query("SELECT * FROM calonkaryawan LIMIT $start , $limit");
$tes = $result->fetchAll();

$result1 = $conn->query("SELECT count(id) AS id FROM calonkaryawan");
$custCount = $result1->fetchAll();
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-dark">Tabel Calon Karyawan</h1>
  <!-- <p class="mb-4">Template untuk semua tabel tinggal diganti file yang mau dipanggil aja</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!--<h6 class="m-0 font-weight-bold text-dark">DataTables Template</h6> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">



        <div style="float: right;">
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-danger btn-md" id="myBtn" style="margin-bottom: 10px; margin-right:20px;">Hapus Data</button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="margin-top: 250px;">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div style="text-align:center; margin-top: 15px; margin-bottom:15px;">
                  <h5 style="margin-bottom: 20px;">Yakin ingin menghapus?</h5>
                  <a href="hapus.php"><button class="btn btn-danger">Hapus</button></a>
                  &emsp;&emsp;
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tidak</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            $("#myBtn").click(function() {
              $("#myModal").modal();
            });
          });
        </script>



        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" id="table">
          <thead>
            <!--  -->
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Usia</th>
              <th>Posisi Yang Dilamar</th>
              <th>Pengalaman</th>
              <th>Lama</th>
              <th>Pendidikan</th>
              <th>Sertifikat</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php foreach ($tes as $tes) :  ?>
              <tr>
                <td><?= $tes['id']; ?></td>
                <td><?= $tes['nama']; ?></td>
                <td><?= $tes['usia']; ?></td>
                <td><?= $tes['posisi']; ?></td>
                <td><?= $tes['pengalaman']; ?></td>
                <td><?= $tes['lama']; ?></td>
                <td><?= $tes['pendidikan']; ?></td>
                <td><?= $tes['sertifikat']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- PAGINATION -->
        <?php
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB1', 'smlkkp');

        // Buat Koneksinya
        $db1 = new mysqli(HOST, USER, PASS, DB1);
        ?>

        <?php
        $query_jumlah = "SELECT count(*) AS jumlah FROM calonkaryawan";
        $dewan1 = $db1->prepare($query_jumlah);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        $row = $res1->fetch_assoc();
        $total_records = $row['jumlah'];
        ?>
        <p>Total baris : <?php echo $total_records; ?></p>
        <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;

            if ($page == 1) {
              echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
              echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            } else {
              $link_prev = ($page > 1) ? $page - 1 : 1;
              echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
              echo '<li class="page-item"><a class="page-link" href="?page=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }

            for ($i = $start_number; $i <= $end_number; $i++) {
              $link_active = ($page == $i) ? ' active' : '';
              echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }

            if ($page == $jumlah_page) {
              echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
              echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } else {
              $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
              echo '<li class="page-item"><a class="page-link" href="?page=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
              echo '<li class="page-item"><a class="page-link" href="?page=' . $jumlah_page . '">Last</a></li>';
            }
            ?>
          </ul>
        </nav>


      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#limit-records").change(function() {
      $('form').submit();
    })
  })
</script>
<?php
include "footer.php";
?>