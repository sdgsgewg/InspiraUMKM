@extends('layouts.main')

@section('container')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    .header {
        position: relative;
        background: url('/img/aboutHeader.jpg') no-repeat center center/cover;
        height: 400px;
        width: 100vw;
        display: flex;
        align-items: center;
        padding-left: 5%;
        color: white;
    }

    .header h1 {
        font-size: 4em;
        font-weight: bold;
    }

    .content {
        padding: 40px 5%;
        width: 100vw;
        max-width: 100%;
    }

    .content p {
        margin-bottom: 20px;
        text-align: justify;
        font-size: 1.5em;
    }

    .image-row {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 40px;
    }

    .image-row img {
        width: 45%;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="header">
    <h1>Tentang InspiraUMKM</h1>
</div>

<div class="content">
    <p>InspiraUMKM adalah platform yang didedikasikan untuk membantu pelaku usaha kecil dan menengah (UMKM) dalam menciptakan kemasan, banner, dan stiker berkualitas tinggi dengan harga terjangkau. Kami percaya bahwa branding yang menarik adalah kunci untuk meningkatkan daya saing UMKM di pasar yang semakin kompetitif. Dengan layanan ini, kami ingin menginspirasi para pelaku bisnis untuk lebih percaya diri dalam memasarkan produk mereka, menciptakan identitas visual yang unik, dan membangun merek yang kuat. Kami memahami pentingnya memiliki tampilan yang profesional untuk menarik perhatian konsumen dan membedakan bisnis Anda dari pesaing.</p>

    <p>Dengan layanan desain yang profesional dan mudah diakses, kami bertujuan untuk mendukung pertumbuhan bisnis lokal di seluruh Indonesia. Tim kami berdedikasi untuk memberikan solusi terbaik yang sesuai dengan kebutuhan bisnis Anda, sehingga Anda dapat fokus pada pengembangan produk dan layanan Anda. Kami percaya bahwa setiap bisnis memiliki potensi untuk berkembang, dan dengan dukungan desain yang tepat, potensi tersebut dapat diwujudkan menjadi kesuksesan yang nyata. Melalui kerja sama dengan berbagai komunitas dan mitra, kami terus berupaya memperluas jangkauan layanan kami untuk memberikan dampak positif yang lebih luas di seluruh negeri.</p>

    <div class="image-row d-flex flex-wrap justify-content-evenly gap-3">
        <img src="/img/umkm1.jpg" alt="UMKM 1">
        <img src="/img/umkm2.jpeg" alt="UMKM 2">
    </div>
</div>
@endsection