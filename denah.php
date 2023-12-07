<?php

$title = 'Denah Lapangan';
require_once __DIR__ . '/partials/navbar.php';

?>
<link rel="stylesheet" href="aris/css/style1.css" />
<style>
    .content {
        display: flex;
        justify-content: center;
    }
    area {
        cursor: pointer;
    }
</style>

<!-- content -->
<!-- remove br tags before fill the content -->
<div class="h1" data-animated>
    <h1>DENAH LAPANGAN</h1>
</div>
<div class="content" data-animated>
    <img src="ikbar/img/denah_lapangan.jpg" alt="" id="denah" usemap="#map">
        <map name="map" id="map">
            <area shape="rect" coords="28,50,143,289" alt="tenis outdoor 1" onclick="showInfo(5)" title="Tenis Outdoor 1">
            <area shape="rect" coords="176,45,290,285" alt="tenis outdoor 2" onclick="showInfo(3)" title="Tenis Outdoor 2">
            <area shape="rect" coords="482,151,585,373" alt="tenis indoor 1" onclick="showInfo(1)" title="Tenis Indoor 1">
            <area shape="rect" coords="622,156,824,263" alt="batminton indoor 1" onclick="showInfo(6)" title="Batminton Indoor 1">
            <area shape="rect" coords="621,284,825,390" alt="voli indoor" onclick="showInfo(7)" title="Volly Indoor">
            <area shape="rect" coords="706,647,911,754" alt="batminton indoor 2" onclick="showInfo(9)" title="Batminton Indoor 2">
            <area shape="rect" coords="600,869,927,1060" alt="futsal indoor timur" onclick="showInfo(2)" title="Futsal Indoor Timur">
            <area shape="rect" coords="28,648,352,838" alt="futsal outdoor barat" onclick="showInfo(4)" title="Futsal Indoor Barat">
            <area shape="rect" coords="28,870,351,1071" alt="basket outdoor" onclick="showInfo(8)" title="Basket Outdoor">
        </map>
</div>

<!-- end your content in here -->

<!-- end content -->
<script>
    function showInfo(lapanganId) {
    // Redirect ke halaman info lapangan berdasarkan ID lapangan
    window.location.href = "field-single.php?id=" + lapanganId;
}
</script>
<?php require_once __DIR__ . '/partials/footer.php'; ?>