 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{% block title %}{% endblock %}</title>

  <link rel="shortcut icon" href="./assets/images/logo/favicon.png" type="image/png">

 
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

 
 
</head>

<body>

<header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>        

        <div class="header-top-actions">

          <select name="currency">

            <option value="usd">USD &dollar;</option>
            <option value="eur">EUR &euro;</option>

          </select>

          <select name="language">

            <option value="en-US">English</option>
            <option value="es-ES">Espa&ntilde;ol</option>
            <option value="fr">Fran&ccedil;ais</option>

          </select>

        </div>

      </div>

    </div>

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <img src="./assets/images/logo/logo.png" width="50" height="50" alt="Guitar logo" >
        </a>

        <div class="header-search-container">

          <input type="search" name="search" class="search-field" placeholder="Enter your product name...">

          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>

        </div>

        <div class="header-user-actions">

          <button class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
          </button>

          <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count">0</span>
          </button>

          <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">0</span>
          </button>

        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="home" class="menu-title">Home</a>
          </li>         

          {% for category in cats %}
          <li class="menu-category">
            <a href="#" class="menu-title">{{category.category}}</a>

            {% if category.children %}
            <ul class="dropdown-list">

              {% for child in category.children %}
              <li class="dropdown-item">
                <a href="#">{{child.category}}</a>
              </li>
              {% endfor %}

            </ul>
            {% endif %}
          </li>
          {% endfor %}

        </ul>

      </div>

    </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;h</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">USD &dollar;</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">EUR &euro;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav>

  </header>

{% block main %}
{% endblock %}

<footer> 

  <div class="footer-nav">

    <div class="container">

      <ul class="footer-nav-list">

        <li class="footer-nav-item">
          <h2 class="nav-title">Popular Categories</h2>
        </li>

        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Fashion</a>
        </li>

        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Electronic</a>
        </li>

        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Cosmetic</a>
        </li>

        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Health</a>
        </li>

        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Watches</a>
        </li>

      </ul>

      <ul class="footer-nav-list">
      
        <li class="footer-nav-item">
          <h2 class="nav-title">Products</h2>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Prices drop</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">New products</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Best sales</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Contact us</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Sitemap</a>
        </li>
      
      </ul>

      <ul class="footer-nav-list">
      
        <li class="footer-nav-item">
          <h2 class="nav-title">Our Company</h2>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Delivery</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Legal Notice</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Terms and conditions</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">About us</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Secure payment</a>
        </li>
      
      </ul>

      <ul class="footer-nav-list">
      
        <li class="footer-nav-item">
          <h2 class="nav-title">Services</h2>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Prices drop</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">New products</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Best sales</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Contact us</a>
        </li>
      
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Sitemap</a>
        </li>
      
      </ul>

      <ul class="footer-nav-list">

        <li class="footer-nav-item">
          <h2 class="nav-title">Contact</h2>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="location-outline"></ion-icon>
          </div>

          <address class="content">
            918 8th Ave, New York, NY 10019, United States
          </address>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <a href="tel:+607936-8058" class="footer-nav-link">(991) 348-0969</a>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="mail-outline"></ion-icon>
          </div>

          <a href="mailto:example@gmail.com" class="footer-nav-link">avatrezaei88@gmail.com</a>
        </li>

      </ul>

      <ul class="footer-nav-list">

        <li class="footer-nav-item">
          <h2 class="nav-title">Follow Us</h2>
        </li>

        <li>
          <ul class="social-link">

            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

          </ul>
        </li>

      </ul>

    </div>

  </div>

  <div class="footer-bottom">

    <div class="container">

      <img src="./assets/images/payment.png" alt="payment method" class="payment-img">

      <p class="copyright">
        Copyright &copy; <a href="#">Anon</a> all rights reserved.
      </p>

    </div>

  </div>

</footer>

<script type="text/javascript" src="./assets/js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

