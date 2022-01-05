<div class="card">
	<article>
		<h1>HMVC Pada Codeigniter 4</h1>
		<h2>Modifikasi Framework Codeigniter 4 Model HMVC</h2>
		<p>
		Aplikasi ini merupakan contoh implementasi HMVC pada Codeigniter 4. Secara default Codeigniter menggunakan konsep MVC, konsep ini juga yang digunakan oleh berbagai frameweork PHP yang ada saat ini. Pada konsep ini aplikasi terdiri dari tiga bagian utama yaitu Model, View, Controller, ilustrasinya seperti tampak seperti gambar berikut:
		<figure class="figure">
		  <img src="<?=base_url()?>/public/images/MVC Model.png" class="figure-img img-fluid rounded mx-auto d-block" style="max-width:200px" alt="Ilustrasi Model MVC">
		  <figcaption class="figure-caption text-center">Ilustrasi Model MVC</figcaption>
		</figure>
		<p>Pada model MVC diatas, terlihat bahwa dalam satu aplikasi, hanya ada satu pengelompokan Model, View. Controller. Pada HMVC, dalam satu aplikasi terdapat kelompok kelompok kecil dimana setiap kelompok tersebut memiliki Model, View, Controller sendiri. Masing masing kelompok tersebut dapat berhubungan satu dengan lain secara hierarkis. </p>
		<figure class="figure">
		  <img src="<?=base_url()?>/public/images/HMVC Model.png" class="figure-img img-fluid rounded mx-auto d-block" style="max-width:350px" alt="Ilustrasi Model MVC">
		  <figcaption class="figure-caption text-center">Ilustrasi Model MVC</figcaption>
		</figure>
		<p>
		Untuk menerapkan HMVC pada Codeigniter 4 diperlukan penyesuaian pada struktur folder yang ada. Pada sistem ini, pada folder app ditambahkan folder Modules. Didalam folder ini semua script untuk membangun module/halaman disimpan, tiap tiap module terdapat Model, View, dan Controllers. Nama folder Modules ini untuk mencerminkan bahwa aplikasi terdiri dari modules yang sifatnya modular. Selain folder Modules, juga dilakukan penyesuaian terhadap routing karena secara default Codeigniter 4 akan me-load controller yang ada di folder app/Controller.
		</p>
		<p>
		Untuk penjelasan lebih detailnya silakan mengunjungi halaman: <a target="_blank" href="https://jagowebdev.com/hmvc-pada-codeigniter-4/" title="Implementasi HMVC Pada Codeigniter 4">https://jagowebdev.com/hmvc-pada-codeigniter-4/</a>
	</article>
</div>