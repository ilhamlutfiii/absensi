<?php
    $id=$_GET['id'];
    //MENAMPILKAN TOWEWENG KONFIRMASI SEBELUM DIHAPUS
    $p=$_GET['p'];
    switch($p)
    {
        case "tanya":
            $alert=towewengkonfirm("?page=admin/kelas_hapus&id=$id");
        break;
    }

    //TOWEWENG SETELAH DIHAPUS
    $h=$_GET['h'];
    switch($h)
    {
        case "true":
            $alert=toweweng("success","Data telah dihapus");
        break;
        case "false":
            $alert=toweweng("info","Maaf Data tidak dapat dihapus");
        break;
    }

    $ambil=AmbilDataAll("kelas","");
    foreach($ambil as $key)
    {
        $no++;
        $data.="
            <tr>
                <td>$no</td>
                <td>{$key['nama']}</td>
                <td>{$key['jurusan']}</td>
                <td>
                    <a href='?page=admin/kelas_edit&id={$key['id_kelas']}' class='d-none d-inline-block btn btn-primary'><i class='fas fa-edit text-white'></i></a>
                    <a href='?page=$page&id={$key['id_kelas']}&p=tanya' class='d-none d-inline-block btn btn-danger'><i class='fas fa-times text-white'></i></a>
                </td>
            </tr>
            ";
    }
    $active2="active-link";
    $template = "dashboard";
    $title = "Beranda";
    $konten = "

    <section class='container section' id='home'>
        <div class='container-fluid d-flex justify-content-between'>
            <h4>Daftar Kelas</h4>
            <a href='?page=admin/kelas_tambah' class='d-none d-inline-block btn btn-sm btn-primary shadow-sm'><i class='fas fa-plus fa-2x text-white'></i></a>
        </div>
    </section>
    <div class='container'>
        <div class='card shadow mb-4'>
            <div class='card-header py-3'>
                <h6 class='m-0 font-weight-bold text-primary'>Siswa</h6>
            </div>
            <div class='card-body'>
                <div class='table-responsive'>
                    <table class='table table-bordered text-center' id='datatable' width='100%' cellspacing='0'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                        $data
                    </table>
                </div>
            </div>
        </div>
    </div>
        
    ";
?>