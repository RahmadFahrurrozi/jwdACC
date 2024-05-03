<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ummbul Bening</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
    .social-icon {
      border-radius: 50%;
      width: 50px;
      height: 50px;
      line-height: 30px;
      text-align: center;
      
    }
  </style>
  </head>
  <body
    style="
      background: rgb(0, 0, 0);
      background: -moz-linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      background: -webkit-linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      background: linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000',endColorstr='#003e6d',GradientType=1);
    "
  >
    <section id="beranda" style="margin-bottom: 100px">
      <hr style="border-width: 3px; color: black" />
      <h1
        style="font-size: 80px"
        class="text-center text-white fw-semibold ms-2 mt-4"
      >
        Umbul Bening
      </h1>
      <p style="color: #fa0081" class="text-center fw-semibold mt-3">
        Wisata Pemandian Kolam Renang
      </p>
      <div class="d-flex justify-content-center pb-5">
        <img
          src="umbul.jpg"
          class="mx-4"
          alt="umbul-img"
          style="width: 500px; gap: 20px; border-radius: 50px"
        />
        <img
          src="umbul2.jpg"
          class=""
          alt="umbul-img"
          style="width: 500px; gap: 20px; border-radius: 50px"
        />
      </div>
      <p style="color: #fa0081" class="text-center fw-semibold">
        P3CR+99W, Gunungsari, Sumbergondo, Kec. Glenmore, Kabupaten Banyuwangi,
        Jawa Timur 68466
      </p>
    </section>
    <br />
    <section
      id="about"
      style="margin-top: 100px; margin-bottom: 10px; align-self: center"
    >
      <p class="text-center fw-semibold" style="color: #fa0081">Tentang Kami</p>
      <h2 class="fw-bold py-3 text-center text-white">Tentang Umbul Bening</h2>
      <div class="d-flex justify-content-center align-items-center pb-4">
        <iframe
          width="560"
          height="315"
          src="https://www.youtube.com/embed/X_Qyfts8RCs?si=069zBNOa4s-zgH_Y"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
          style="border-radius: 20px;"
        ></iframe>
        <p class="text-white px-4" style="text-align: justify; width: 500px">
          Umbul Bening Waterpark merupakan
          wisata air terbesar di Banyuwangi, dengan air bening alami tanpa
          kaporit. Tempat wisata ini berada pada ketinggian 350 sampai 450 di
          atas permukaan laut dan memiliki luas delapan hektar. Harga tiket
          masuk ke wisata umbul bening, yaitu Rp 25.000 per orang jika hari
          besar dikenakan biaya Rp 30.000, untuk anak dibawah empat tahun
          gratis. Selanjutnya jika pengunjung ingin menyewa ban atau pelampung,
          membayar biaya sebesar Rp 20.000 untuk ban besar dan ban kecil Rp
          15.000.
        </p>
      </div>
    </section>


    <div class="container text-center text-white">
    <h2 class="m-4">Media Sosial</h2>
    <div class="row justify-content-center">
      <!-- Ikona YouTube -->
      <div class="col-md-1">
        <a href="https://youtu.be/g_so-U9_cwQ?si=ykMNXaNN2zkRHEq0" target="" class="social-icon btn btn-primary">
          <i class="fab fa-youtube pt-2 fs-5"></i>
        </a>
      </div>
      <!-- Ikona Instagram -->
      <div class="col-md-1">
        <a href="https://www.instagram.com/umbulbening_waterparkbwi/" target="" class="social-icon btn btn-danger">
          <i class="fab fa-instagram pt-2 fs-5"></i>
        </a>
      </div>
      <!-- Ikona WhatsApp -->
      <div class="col-md-1">
        <a href="https://web.whatsapp.com/" target="" class="social-icon btn btn-success">
          <i class="fab fa-whatsapp pt-2 fs-5"></i>
        </a>
      </div>
    </div>
  </div>




    <section class="" id="beli" style="margin-top: 300px">
      <p class="text-center fw-semibold mt-5" style="color: #fa0081">tiket</p>
      <h2 class="text-center fw-bold text-white mb-5">Daftar Tiket</h2>
      <div class="row row-cols-1 row-cols-md-2 g-4 m-4">
        <div class="col">
          <div class="card rounded-4">
            <img
              src="dewasa.svg"
              class="card-img-top"
              style="width: 60%"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Tiket Masuk Dewasa</h5>
              <p class="card-text">
                Nikmati Paket Hemat Dengan Pembelian 10 Tket
              </p>
              <div>
                <a href="ordertiket.php">
                  <button type="button" class="btn btn-outline-primary">
                    Pesan Sekarang
                  </button>
                </a>
                <span class="badge text-bg-dark">Rp. 25.000/orang</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <img
              src="anak.svg"
              class="card-img-top"
              style="width: 55%"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Tiket Masuk Anak</h5>
              <p class="card-text">Tiket Anak Mulai dari 15 ribuan aja!</p>
              <div>
                <a href="ordertiket.php">
                  <button type="button" class="btn btn-outline-primary">
                    Pesan Sekarang
                  </button>
                </a>
                <span class="badge text-bg-dark">Rp. 15.000/Anak</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <img src="umbul4.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">Tiket Infinity World</h5>
              <p class="card-text">Ada misteri apa di dalamnya? yuk kepoin!</p>
              <a href="ordertiket.php">
                <button type="button" class="btn btn-outline-primary">
                  Pesan Sekarang
                </button>
              </a>
              <span class="badge text-bg-dark">Rp. 20.000/1 tiket</span>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="umbul-6.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">Tiket Rumah Segitiga</h5>
              <p class="card-text">Ambil Foto sepuasmu dan nikmati rumah unik ini!</p>
              <a href="ordertiket.php">
                <button type="button" class="btn btn-outline-primary">
                  Pesan Sekarang
                </button>
              </a>
              <span class="badge text-bg-dark">Rp. 20.000/1 tiket</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="kontak" style="margin-top: 200px; margin: bottom 200px;">
      <p class="text-center fw-semibold mt-5" style="color: #fa0081">
        Kontak
      </p>
      <h2 class="text-center fw-semibold text-white">Contact Kami</h2>
      <div class="container mt-3 d-flex justify-content-center">
        <form
          action=""
          method="post"
          class="mb-3 p-4 bg-transparent"
          style="border-radius: 20px; width: 60%"
        >
          <label for="nama" class="form-label fw-semibold mt-2 text-white"
            >Nama</label
          >
          <input
            type="text"
            class="form-control"
            id="nama"
            name="nama"
            placeholder="contoh: Budi suparmaman"
            required
          />
          <label for="harga" class="form-label fw-semibold mt-2 text-white"
            >E-mail</label
          >
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="contoh: budimaman@gmail.com"
            required
          />
          <label for="telepon" class="form-label fw-semibold mt-2 text-white"
            >telepon</label
          >
          <input
            type="text"
            class="form-control"
            id="telepon"
            name="telepon"
            placeholder="contoh: 085767533324"
            required
          />
          <label for="pesan" class="form-label fw-semibold mt-2 text-white"
            >Pesan</label
          >
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="3"
          ></textarea>
          <div class="d-flex justify-content-center">
            <button
              name="submit"
              type="submit"
              class="mt-5 py-2 px-5 btn btn-primary"
            >
              Submit
            </button>
          </div>
        </form>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php 
include 'footer.php';