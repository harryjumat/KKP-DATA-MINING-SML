<?php
include "header.php";
include 'conn.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Grafik Prediksi</h1>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <!-- Content Row -->
    <div class="card-body">
      <div>

        <!-- TAB -->
        <div class="tab">
          <div id="Posisi" class="tabcontent">
            <!-- Chart Posisi -->
            <div style="width: 800px;margin: 0px auto;">
              <canvas id="posisi"></canvas>
            </div>

            <script>
              var ctx = document.getElementById("posisi").getContext('2d');
              var posisi = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ["POSISI"],
                  datasets: [{
                      label: "Mobile Developer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                      borderColor: ['rgba(255,99,132,1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='Mobile Developer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "Database Developer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                      borderColor: ['rgba(54, 162, 235, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='Database Developer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "QA",
                      borderWidth: 1,
                      backgroundColor: ['rgba(255, 206, 86, 0.2)'],
                      borderColor: ['rgba(255, 206, 86, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='QA'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "IT Project Manager",
                      borderWidth: 1,
                      backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                      borderColor: ['rgba(75, 192, 192, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='IT Project Manager'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "System Analysis",
                      borderWidth: 1,
                      backgroundColor: ['rgba(0, 12, 179, 1)'],
                      borderColor: ['rgba(0, 12, 179, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='System Analysis'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "System Administrator",
                      borderWidth: 1,
                      backgroundColor: ['rgba(35, 77, 246, 0.2)'],
                      borderColor: ['rgba(35, 77, 246, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='System Administrator'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "System Engineer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(87, 246, 35, 0.2)'],
                      borderColor: ['rgba(87, 246, 35, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='System Engineer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "Middleware Developer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(26, 93, 4, 0.2)'],
                      borderColor: ['rgba(26, 93, 4, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='Middleware Developer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "Front End Web Developer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(191, 252, 191, 0.2)'],
                      borderColor: ['rgba(191, 252, 191, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='Front End Web Developer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "Back End Web Developer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(2, 49, 2, 0.2)'],
                      borderColor: ['rgba(2, 49, 2, 1)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='Back End Web Developer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },

                    {
                      label: "UX Desainer",
                      borderWidth: 1,
                      backgroundColor: ['rgba(116, 84, 248, 0.2)'],
                      borderColor: ['rgba(116, 84, 248, 0.77)'],
                      data: [
                        <?php
                        $sql1 = "select * from prediksi where posisi='UX  Desainer'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $num_rows = $stmt1->rowCount();
                        echo $num_rows;
                        ?>
                      ],
                    },
                  ]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true
                      }
                    }]
                  }
                }
              });
            </script>
          </div>

          <script>
            function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }
          </script>
        </div>
        <!-- AKHIR TAB -->
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>