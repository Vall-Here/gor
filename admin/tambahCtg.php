<?php
$title = 'Categories Management';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";




if( isset($_POST["tambah"]) ) {
        
  // cek apakah data berhasil di tambahkan atau tidak
    if( tambah_kategori($_POST) > 0 ) {
        echo "
            <script>
                alert('Kategori baru berhasil ditambahkan!');
                document.location.href = './adminCatUpdater.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Kategori baru gagal ditambahkan!');
                document.location.href = './adminCatUpdater.php';
            </script>
        ";
    }

    }
    ?>



    <link rel="stylesheet" href="./css/style.css" />








    <section class="content">
        <div class="containerHeader">
            <span>Silahkan Tambahkan Category</span>
            <div class="btnTambahCtg"><a href="./adminCatUpdater.php">Back</a></div>
        </div>
        <div class="containerMainTbh">
        <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="text-box">
                            <label for="nama_kategori"
                                >Nama Kategori:</label>
                        </td>
                        <td>
                            <input
                                type="text"
                                name="nama_kategori"
                                id="nama_kategori"
                                class="box"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td class="text-box">
                            <label for="deskripsi_kategori"
                                >Deskripsi Kategori:</label
                            >
                        </td>
                        <td>
                            <input
                                type="text"
                                name="deskripsi_kategori"
                                id="deskripsi_kategori"
                                class="box"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td class="text-box">
                            <label for="gambar_kategori"
                                >Gambar Kategori:</label
                            >
                        </td>
                        <td>
                            <input
                                type="file"
                                name="gambar_kategori"
                                id="gambar_kategori"
                                class="file-box"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="tambah" class="btn">
                                Tambah
                            </button>
                        </td>
                    </tr>
                </table>
            </form>

      </div>
</section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>
