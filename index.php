<?php
include_once 'atas.php';
?>
<br>
<center><h3 class="mb-2 h3">From Indeks Massa Tubuh (BMI)</h3></center>
<hr>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Form Isian Indeks Massa Tubuh (BMI)
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="form-group row">
                            <label class="col-4 col-form-label" for="nama">Nama</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user-circle-o"></i>
                                        </div>
                                    </div>
                                    <input id="nama" name="nama" type="text" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berat" class="col-4 col-form-label">Berat</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-anchor"></i>
                                        </div>
                                    </div>
                                    <input id="berat" name="berat" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">kg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-arrows-v"></i>
                                        </div>
                                    </div>
                                    <input id="tinggi" name="tinggi" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">cm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="umur" class="col-4 col-form-label">Umur</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-bell"></i>
                                        </div>
                                    </div>
                                    <input id="umur" name="umur" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">thn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Jenis Kelamin</label>
                            <div class="col-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Laki - Laki">
                                    <label for="radio_0" class="custom-control-label">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Perempuan">
                                    <label for="radio_1" class="custom-control-label">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="proses" type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Hasil Evaluasi
                </div>
                <div class="card-body">
                    <?php
                    require_once "class_bmipasien.php";
                    if (isset($_POST['proses'])) {
                        $nama = $_POST['nama'];
                        $berat = $_POST['berat'];
                        $tinggi = $_POST['tinggi'];
                        $umur = $_POST['umur'];
                        $gender = $_POST['gender'];
                        $pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $gender);


                        echo 'Nama         : ' . $pasien1->name . '</br>';
                        echo 'Berat Badan  : ' . $pasien1->weight . '</br>';
                        echo 'Tinggi Badan : ' . $pasien1->height . '</br>';
                        echo 'Umur         : ' . $pasien1->age . '</br>';
                        echo 'Gender       : ' . $pasien1->gender . '</br>';
                        echo 'BMI          : ' . round($pasien1->hasilBMI()) . '</br>';
                        echo 'Status       : ' . $pasien1->statusBMI() . '</br>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <center><h3 class="mb-2 h3">Data Hasil BMI</h3></center>
    <hr>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Berat (kg)</th>
                        <th scope="col">Tinggi (cm)</th>
                        <th scope="col">BMI</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $pasien2 = new BMIPasien("Akmal Ghandi", 50, 155, 12, "Laki - Laki");
                $pasien3 = new BMIPasien("Farid Muhari", 70, 178, 19, "Laki - Laki");
                $pasien4 = new BMIPasien("Bimo Falih", 80, 180, 21, "Laki - Laki");
                $pasien5 = new BMIPasien("Evry Nazyli", 60, 164, 20, "Laki - Laki");
                $ar_nilai = [$pasien2, $pasien3, $pasien4, $pasien5];
                if (isset($_POST['proses'])) {
                    $pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $gender);
                    array_push($ar_nilai, $pasien1);
                }
                $no = 1;
                foreach ($ar_nilai as $ns) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $ns->name; ?></td>
                        <td><?= $ns->gender; ?></td>
                        <td><?= $ns->age; ?></td>
                        <td><?= $ns->weight; ?></td>
                        <td><?= $ns->height; ?></td>
                        <td><?= $ns->hasilBMI(); ?></td>
                        <td><?= $ns->statusBMI(); ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once 'bawah.php';
?>