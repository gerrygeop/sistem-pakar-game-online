<div class="container">
    <div class="row my-lg-5 pt-4 text-center">
        <div class="col-12 col-lg-4 text-lg-start pt-lg-4">

            <!-- Menu Admin -->
            <?php if ( isset($_SESSION['nim']) && $_SESSION['level'] == 'admin' ) : ?>
                <ul class="list-group">
                    <li class="list-group-item active text-center" aria-current="true">Menu Utama</li>
                    <a href="<?= BASEURL; ?>/data_penyakit/index"class="list-group-item list-group-item-action">
                        Data Penyakit dan Solusi
                    </a>
                    <a href="<?= BASEURL; ?>/gejala/index" class="list-group-item list-group-item-action">
                        Gejala
                    </a>
                    <a href="<?= BASEURL; ?>/admin/laporanDataUser" class="list-group-item list-group-item-action">
                        Laporan Data User
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Perhitungan
                    </a>
                </ul>

            <!-- Menu Mahasiswa -->
            <?php elseif (isset($_SESSION['nim']) && $_SESSION['level'] == 'mahasiswa') : ?>
                <ul class="list-group">
                    <li class="list-group-item active text-center" aria-current="true">Menu Utama</li>
                    <a href="<?= BASEURL; ?>/user/profile"class="list-group-item list-group-item-action">
                        Data Mahasiswa
                    </a>
                    <a href="<?= BASEURL; ?>/responden/index" class="list-group-item list-group-item-action">
                        Konsultasi
                    </a>
                    <a href="<?= BASEURL; ?>/responden/riwayat" class="list-group-item list-group-item-action">
                        Riwayat Konsultasi
                    </a>
                </ul>

            <!-- Menu Sebelum Login -->
            <?php else : ?>
                <ul class="list-group">
                    <li class="list-group-item active text-center" aria-current="true">Menu Utama</li>
                    <li class="list-group-item">
                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Beranda
                    </li>
                    <a href="<?= BASEURL; ?>/auth/adminLogin" class="list-group-item list-group-item-action">
                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Admin
                    </a>
                    <a href="<?= BASEURL; ?>/auth" class="list-group-item list-group-item-action">
                        <svg width="25" height="25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        Mahasiswa
                    </a>
                </ul>

            <?php endif; ?>
        </div>

        <div class="col-12 col-lg-8 text-lg-end p-5 p-lg-0">
            <img src="<?=BASEURL;?>/img/utama1.png" alt="Logo utama" class="img-custom">
        </div>
    </div>

    <div class="row my-5 px-3 py-5 bg-white border rounded">
        <div class="col">
            <p style="text-align: justify;">&emsp;&emsp;Aspek seseorang kecanduan online game sebenarnya hampir sama dengan jenis kecanduan yang lain, akan tetapi kecanduan online game di masukkan ke dalam golongan kecanduan psikologis dan bukan kecanduan secara fisik (Arief dkk., 2020). Sedikitnya ada tujuh aspek kecanduan online game. Ke tujuh aspek tersebut adalah:</p>
            <ol>
                <li style="text-align: justify;">Salience (Prioritas utama atau Ciri Khas) Prioritas utama merupakan suatu ktriteria kecanduan bermain online game yang menjadikan kegiatan tersebut menjadi paling penting dalam kehidupannya. Dan mendominasi pikiran, perasaan, serta perilaku seseorang. Sehingga seseorang yang kecanduan online game menjadikan prioritas utama bermain game.</li>
                <li style="text-align: justify;">Tolerance (Toleransi) Toleransi merupakan kriteria yang muncul pada saat waktu bermain online game, ketika seorang pemain game semakin bertambah dan pemain tidak dapat berhenti ketika sudah mulai bermain online game. Kaitannya dengan toleransi yaitu suatu upaya pemain untuk mencapai kepuasan, maka waktu yang di gunakan dalam bermain game meningkat secara drastis sehingga menjadi kurangnya toleransi seseorang terhadap dunia di sekitarnya.</li>
                <li style="text-align: justify;">Mood Change (Perubahan Mood) Perubahan mood atau suasana hati merupakan perasaan  yang muncul ketika sebelum dan saat bermain game menjadi lupa dengan kegiatan yang lain dan pemain game cenderung bermain untuk menghilangkan stres pada dirinya. Agar perasaannya menjadi lebih baik, tenang, bergairan, dan sebagainya ketika sudah bermain online game. Suasana hati seorang pemain akan menjadi baik apabila sudah bermain online game.</li>
                <li style="text-align: justify;">Withdrawal (Penarikan diri) Merupakan suatu upaya untuk menarik diri atau menjauhkan diri dari suatu hal. Yang di maksud penarikan diri adalah seseorang tidak bisa menarik dirinya untuk melakukan hal lain kecuali online game. Sehingga akan muncul perasaan yang tidak menyenangkan atau dampak perilaku yang terjadi ketika frekuensi bermain game dikurangi atau dihentikan secara tiba-tiba.</li>
                <li style="text-align: justify;">Relapse (Kambuh) Balik kembali atau kambuh merupakan sifat seorang pemain game yang muncul ketika seorang tersebut tidak dapat mengurangi waktu untuk bermain online game. Relapse adalah kecenderungan untuk kembali bermain online game, terutama setelah mencoba untuk berhenti bermain online game.</li>
                <li style="text-align: justify;">Conflict (Konflik) Konflik merupakan sifat yang muncul ketika seorang pemain bertengkar dengan orang lain akibat bermain online game. misalkan dengan orang tua, teman, atau keluarga karena waktu pemain dihabiskan dengan bermain online game sehingga telah mengabaikan orang sekitarnya.</li>
                <li style="text-align: justify;">Problem (Masalah) Munculnya permasalahan-permasalahan baru yang diakibatkan dari kecanduan online game seperti prestasi sekolah dan kegiatan yang lain yang menjadi menjadi tidak sesuai jadwal atau beraturan.</li>
            </ol>
        </div>
    </div>
</div>
