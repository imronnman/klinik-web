<?php
$conn = mysqli_connect("localhost","root","","db_klinik");
if(isset($_POST['simpan'])){
  $nama = $_POST['nama'];
  $treatment = $_POST['treatment'];
  mysqli_query($conn,"INSERT INTO pasien(nama) VALUES('$nama')");
  $pesan = urlencode("Halo, saya $nama ingin booking treatment: $treatment");
  header("Location:https://wa.me/6285771779882?text=$pesan");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Lunea Skin Clinic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
body{
  margin:0;
  font-family:'Segoe UI',sans-serif;
  background:#f6f4f2;
  color:#333;
}

/* NAVBAR */
nav{
  position:fixed;
  top:0;width:100%;
  padding:18px 70px;
  background:#fff;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 4px 20px rgba(0,0,0,.08);
  z-index:10;
}
nav b{font-size:22px;color:#4a2c1d}
nav span{color:#c9a24d}
nav a{
  margin-left:28px;
  text-decoration:none;
  color:#4a2c1d;
  font-weight:600;
}

/* HERO */
.hero{
  margin-top:90px;
  height:90vh;
  background:
    linear-gradient(120deg,rgba(74,44,29,.75),rgba(0,0,0,.35)),
    url('img/hero.png') center/cover no-repeat;
  display:flex;
  align-items:center;
  padding-left:90px;
}
.hero div{
  color:white;
  max-width:520px;
  animation:fadeUp 1.1s ease forwards;
}
@keyframes fadeUp{
  from{opacity:0;transform:translateY(40px)}
  to{opacity:1;transform:translateY(0)}
}
.hero h1{font-size:50px;margin:0}
.hero p{margin:15px 0 30px;opacity:.9}
.hero a{
  padding:14px 42px;
  background:#c9a24d;
  color:#4a2c1d;
  border-radius:40px;
  text-decoration:none;
  font-weight:800;
  transition:.3s;
}
.hero a:hover{transform:scale(1.08)}

/* SECTION */
section{
  padding:120px 70px;
  background:white;
}
h2{
  text-align:center;
  margin-bottom:70px;
  color:#4a2c1d;
}

/* CARD */
.grid{
  max-width:1200px;
  margin:auto;
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
  gap:45px;
}
.card{
  background:white;
  border-radius:24px;
  overflow:hidden;
  box-shadow:0 20px 45px rgba(0,0,0,.12);
  transition:.35s;
}
.card:hover{
  transform:translateY(-10px);
  box-shadow:0 28px 65px rgba(0,0,0,.18);
}
.card img{
  width:100%;
  height:220px;
  object-fit:cover;
}
.card .c{padding:28px}
.card p{font-size:14px;color:#666}
.card button{
  width:100%;
  margin-top:18px;
  padding:12px;
  border:none;
  border-radius:14px;
  background:#4a2c1d;
  color:white;
  font-weight:700;
  cursor:pointer;
}

/* BEFORE AFTER */
.before-after{
  max-width:1100px;
  margin:auto;
  text-align:center;
}
.before-after img{
  width:100%;
  max-width:700px;   /* ⬅️ INI YANG NGECILIN */
  margin:auto;
  display:block;
  border-radius:20px;
  box-shadow:0 15px 35px rgba(0,0,0,.15);
}


/* BOOKING */
#booking{
  max-width:420px;
  margin:80px auto 0;
  background:white;
  padding:34px;
  border-radius:24px;
  box-shadow:0 20px 50px rgba(0,0,0,.2);
}
input,select{
  width:100%;
  padding:14px;
  margin-top:14px;
  border-radius:12px;
  border:1px solid #ddd;
}
.btn{
  width:100%;
  margin-top:22px;
  padding:14px;
  border:none;
  border-radius:14px;
  background:#c9a24d;
  color:#4a2c1d;
  font-size:16px;
  font-weight:800;
  cursor:pointer;
}

/* FOOTER */
footer{
  background:#4a2c1d;
  color:#eee;
  padding:28px;
  text-align:center;
  font-size:13px;
}
footer span{color:#c9a24d}
</style>
</head>

<body>

<nav>
  <b>Lunea <span>Skin Clinic</span></b>
  <div>
    <a href="#treat">Treatment</a>
    <a href="#booking">Booking</a>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div>
    <h1>Professional Skin Care<br>Experience</h1>
    <p>Perawatan wajah & kulit dengan sentuhan klinik estetika modern.</p>
    <a href="#treat">Explore Treatment</a>
  </div>
</div>

<!-- TREATMENT -->
<section id="treat">
<h2>Our Treatment</h2>

<div class="grid">

<div class="card">
  <img src="img/facial-glow.jpg" alt="Facial Glow">
  <div class="c">
    <h3>Facial Glow</h3>
    <p>Mencerahkan dan menyegarkan kulit.</p>
    <button onclick="pilih('Facial Glow')">Book Now</button>
  </div>
</div>

<div class="card">
  <img src="img/acne-treatment.jpg" alt="Acne Treatment">
  <div class="c">
    <h3>Acne Treatment</h3>
    <p>Solusi perawatan kulit berjerawat.</p>
    <button onclick="pilih('Acne Treatment')">Book Now</button>
  </div>
</div>

<div class="card">
  <img src="img/anti-aging.jpg" alt="Anti Aging">
  <div class="c">
    <h3>Anti Aging</h3>
    <p>Menjaga elastisitas & kesehatan kulit.</p>
    <button onclick="pilih('Anti Aging')">Book Now</button>
  </div>
</div>

</div>
</section>

<!-- BEFORE AFTER -->
<section style="background:#f7f4f2">
<h2>Before & After</h2>
<div class="before-after">
  <img src="img/before-after.jpg" alt="Before After Treatment">
</div>
</section>

<!-- BOOKING -->
<div id="booking">
<h3>Booking Treatment</h3>
<form method="post">
  <input type="text" name="nama" placeholder="Nama Pasien" required>
  <select name="treatment" id="t">
    <option>Facial Glow</option>
    <option>Acne Treatment</option>
    <option>Anti Aging</option>
  </select>
  <button class="btn" name="simpan">Booking via WhatsApp</button>
</form>
</div>

<footer>
© 2026 <span>Lunea Skin Clinic</span>
</footer>

<script>
function pilih(x){
  document.getElementById("t").value=x;
  document.getElementById("booking")
    .scrollIntoView({behavior:"smooth"});
}
</script>

</body>
</html>
