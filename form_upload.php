<?php
include "header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 290px;">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark">Import File</h1>
    <!-- <p class="mb-4">Template untuk semua tabel tinggal diganti file yang mau dipanggil aja</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-dark">DataTables Template</h6> -->
        </div>
        <div class="card-body">
            <fieldset>
                <form method="post" enctype="multipart/form-data" action="prosesimport.php">
                    <div class="form-group">
                        <label for="exampleInputFile">Unggah File</label></br>
                        <input type="file" name="berkas_excel">
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>