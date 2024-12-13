<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sun Furniture</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header>
    <div class="logo">SUN FURNITURE</div>
    <nav>
      <ul>
        <li class="search-bar"> 
          <input type="text" placeholder="Cari produk...">
          <button type="submit">Cari</button>
        </li>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="#">Price</a></li>
        <li><a href="index.php">Help Us</a></li>
        <li><a href="login.php">Login</a></li>
        
      </ul>
    </nav>
  </header>

  <main>
    <div class="carousel">
      <div class="carousel__body">
        <div class="carousel__prev">
          <i class="far fa-angle-left"></i>
        </div>
        <div class="carousel__next">
          <i class="far fa-angle-right"></i>
        </div>
        <div class="carousel__slider">
          <!-- Replace items below with your dynamic image values if needed -->
          <div class="carousel__slider__item">
            <div class="item__3d-frame">
              <div class="item__3d-frame__box item__3d-frame__box--front">
                <img src="asset/kursi.jpg" alt="Kursi" />
              </div>
              <div class="item__3d-frame__box item__3d-frame__box--left"></div>
              <div class="item__3d-frame__box item__3d-frame__box--right"></div>
            </div>
          </div>
          <div class="carousel__slider__item">
            <div class="item__3d-frame">
              <div class="item__3d-frame__box item__3d-frame__box--front">
                <img src="asset/lemari.jpg" alt="Lemari" />
              </div>
              <div class="item__3d-frame__box item__3d-frame__box--left"></div>
              <div class="item__3d-frame__box item__3d-frame__box--right"></div>
            </div>
          </div>
          <!-- Add more items with images as needed -->
          <div class="carousel__slider__item">
            <div class="item__3d-frame">
              <div class="item__3d-frame__box item__3d-frame__box--front">
                <img src="asset/lemari_baju.jpg" alt="Lemari Baju" />
              </div>
              <div class="item__3d-frame__box item__3d-frame__box--left"></div>
              <div class="item__3d-frame__box item__3d-frame__box--right"></div>
            </div>
          </div>
          <div class="carousel__slider__item">
            <div class="item__3d-frame">
              <div class="item__3d-frame__box item__3d-frame__box--front">
                <img src="asset/rak.jpg" alt="Rak" />
              </div>
              <div class="item__3d-frame__box item__3d-frame__box--left"></div>
              <div class="item__3d-frame__box item__3d-frame__box--right"></div>
            </div>
          </div>
          <!-- Continue for all items -->
        </div>
      </div>
    </div>
    <section class="document">
      <div class="DOCTYPE">
        <h3>SUN FURNITURE</h3>
        <h2>Selamat Datang di SUN FURNITU, 
          destinasi terpercaya Anda untuk mendapatkan furnitur berkualitas tinggi dan bergaya. 
          Kami berkomitmen untuk mengubah ruang rumah dan kantor Anda menjadi tempat yang nyaman dan indah, 
          dengan menyediakan berbagai pilihan furnitur yang memenuhi setiap kebutuhan Anda</h2>
      </div>
    </section>

    <section class="products">
      <div class="cards-categories">
          <div class="card">
            <img src="asset/kursi.jpg" alt="Product 1" />
            <h3>Product 1</h3>
            <p>$100</p>
          </div>
        </div>
        <div class="cards-categories">
          <div class="card">
            <img src="asset/lemari.jpg" alt="Product 2" />
            <h3>Product 2</h3>
            <p>$150</p>
          </div>
        </div>
        <div class="cards-categories">
          <div class="card">
            <img src="asset/lemari_baju.jpg" alt="Product 3" />
            <h3>Product 3</h3>
            <p>$200</p>
          </div>
        </div>
        <div class="cards-categories">
          <div class="card">
            <img src="asset/meja.jpg" alt="Product 4" />
            <h3>Product 4</h3>
            <p>$250</p>
          </div>
        </div>
        <div class="cards-categories">
          <div class="card">
            <img src="asset/rak.jpg" alt="Product 5" />
            <h3>Product 5</h3>
            <p>$250</p>
          </div>
        </div>
        <div class="cards-categories">
          <div class="card">
            <img src="asset/rak_hias.jpg" alt="Product 6" />
            <h3>Product 6</h3>
            <p>$250</p>
          </div>
        </div>
    </section>
  </main>


  <script>
    (function () {
      "use strict";

      var carousel = document.getElementsByClassName('carousel')[0],
        slider = carousel.getElementsByClassName('carousel__slider')[0],
        items = carousel.getElementsByClassName('carousel__slider__item'),
        prevBtn = carousel.getElementsByClassName('carousel__prev')[0],
        nextBtn = carousel.getElementsByClassName('carousel__next')[0];

      var width, height, totalWidth, margin = 20,
        currIndex = 0,
        interval, intervalTime = 4000;

      function init() {
        resize();
        move(Math.floor(items.length / 2));
        bindEvents();
        timer();
      }

      function resize() {
        width = Math.max(window.innerWidth * 0.25, 275);
        height = window.innerHeight * 0.5;
        totalWidth = width * items.length;

        slider.style.width = totalWidth + "px";

        for (var i = 0; i < items.length; i++) {
          var item = items[i];
          item.style.width = (width - (margin * 2)) + "px";
          item.style.height = height + "px";
        }
      }

      function move(index) {
        if (index < 1) index = items.length;
        if (index > items.length) index = 1;
        currIndex = index;

        for (var i = 0; i < items.length; i++) {
          var item = items[i],
            box = item.getElementsByClassName('item__3d-frame')[0];
          if (i === (index - 1)) {
            item.classList.add('carousel__slider__item--active');
            box.style.transform = "perspective(1200px)";
          } else {
            item.classList.remove('carousel__slider__item--active');
            box.style.transform = "perspective(1200px) rotateY(" + (i < (index - 1) ? 40 : -40) + "deg)";
          }
        }

        slider.style.transform = "translate3d(" + ((index * -width) + (width / 2) + window.innerWidth / 2) + "px, 0, 0)";
      }

      function timer() {
        clearInterval(interval);
        interval = setInterval(function () {
          move(++currIndex);
        }, intervalTime);
      }

      function prev() {
        move(--currIndex);
        timer();
      }

      function next() {
        move(++currIndex);
        timer();
      }

      function bindEvents() {
        window.onresize = resize;
        prevBtn.addEventListener('click', function () { prev(); });
        nextBtn.addEventListener('click', function () { next(); });
      }

      init();

    })();

   
  </script>
</body>
<footer>
  <h2>HEADQUARTERS</h2>
  <p>Jln. Kyai Nawawi KM. 02 RT.20 / RW.04</p>
  <p>Sinanggul Mlonggo Kab. Jepara - Jawa tengah 59452</p>
  <p>Instagram: _sunfurniture_</p>
  <p>WhatsApp: +62 81249656249</p>
</footer>

</html>