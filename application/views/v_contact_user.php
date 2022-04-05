<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <style>body{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        color: black;
        line-height: 1.5;
        letter-spacing: 1px;
    }
    .testimonial{
        padding: 30px 100px;
    }
    article h1{
        font-size: 50px;
        font-weight: 800;
        text-transform: uppercase;
    }
    article h1:after{
        content:"";
        height: 5px;
        width: 225px;
        background-color: #fff;
        display: block;
        margin: auto;
    }
    article img{
        height: 200px;
        width: 200px;
        border: 2px solid #fff;
        border-radius: 50%;
        margin-top: 60px;
    }
        </style>
</head>
<body>
    <div class="wrapper">
        <div class="testimonial">
            <article>
                <img src="<?= base_url() ?>template/assets/img/putra.png"?>
                <blockquote>
                    "Saya merupakan mahasiswa jurusan teknik informatika dari Universitas Gunadarma, saya mempunyai semangat yang tinggi, pantang menyerah dan saya sangat suka mempelajari suatu yang baru. Saya siap menerima kritik dan saran dari pihak manapun"
                </blockquote>
                <h5>Putra Muhamamad Ferdiansyah</h5>
                <p>Man Jadda Wa Jadda</p>
                <p>putramei05@gmail.com</p>
            </article>
        </div>
    </div>
</body>
</html>