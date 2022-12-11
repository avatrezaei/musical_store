{% extends "base.php" %}

{% block title %}
  Guitar - Home
{% endblock %}

{% block main %}

<main>

<div class="banner">

  <div class="container">

    <div class="slider-container has-scrollbar">

      {% for banner in banners %}
      <div class="slider-item">

        <img src="{{ 'public/images/' ~ banner.image }}" alt="{{banner.title}}" class="banner-img">

        <div class="banner-content">

          <p class="banner-subtitle">{{banner.subtitle}}</p>

          <h2 class="banner-title">{{banner.title}}</h2>

          <p class="banner-text">
            {{banner.content}}
          </p>

          <a href="{{banner.url}}" class="banner-btn">{{banner.button}}</a>

        </div>

      </div>
      {% endfor %}

    </div>

  </div>

</div>


<div class="category">

  <div class="container">

    <div class="category-item-container has-scrollbar">

        <!-- foreach category items -->
        {% for category in categories %}


        <div class="category-item">

          <div class="category-img-box">
            <img src=".{{ '/public/images/icons/' ~ category.image }}" alt="ress & frock" width="30">
          </div>

          <div class="category-content-box">

            <div class="category-content-flex">
              <h3 class="category-item-title">
                {{ category.category }}
              </h3>

              <p class="category-item-amount"> {{ category.products }}</p>
            </div>

            <a href="/category/{{ category_slug }}" class="category-btn">Show all</a>

          </div>

        </div>

        {% endfor %}  

    </div>

  </div>

</div>

<div class="product-container">

  <div class="container">


    <div class="sidebar  has-scrollbar" data-mobile-menu>

      <div class="sidebar-category">

        <div class="sidebar-top">
          <h2 class="sidebar-title">Category</h2>

          <button class="sidebar-close-btn" data-mobile-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="sidebar-menu-category-list">

          {% for subcats in cats %} 
          <li class="sidebar-menu-category">

            <button class="sidebar-accordion-menu" data-accordion-btn>

              <div class="menu-title-flex">
                <img src="./public/images/icons/dress.svg" alt="clothes" width="20" height="20"
                  class="menu-title-img">

                <p class="menu-title">{{subcats.category}}</p>
              </div>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>

            </button>

            <ul class="sidebar-submenu-category-list" data-accordion>

              {% for sub in subcats.children %}
              <li class="sidebar-submenu-category">
                <a href="#" class="sidebar-submenu-title">
                  <p class="product-name">{{sub.category}}</p>
                  <data value="300" class="stock" title="Available Stock">300</data>
                </a>
              </li>
              {% endfor %} 

            </ul>

          </li>
          {% endfor %} 

        </ul>

      </div>

      <div class="product-showcase">

        <h3 class="showcase-heading">best sellers</h3>

        <div class="showcase-wrapper">

          <div class="showcase-container">

            {% for product in bestSellers %}
            <div class="showcase">

              <a href="#" class="showcase-img-box">
                <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" width="75" height="75"
                  class="showcase-img">
              </a>

              <div class="showcase-content">

                <a href="#">
                  <h4 class="showcase-title">{{product.title}}</h4>
                </a>

                <div class="showcase-rating">
                  {% for i in 1..product.rating %}
                    <ion-icon name="star"></ion-icon>
                  {% endfor %}
                  {% for i in 1..(5 - product.rating) %}
                    <ion-icon name="star-outline"></ion-icon>
                  {% endfor %}
                </div>

                <div class="price-box">
                <p class="price">${{product.price}}</p>
                    <del>${{product.price}}</del>
                </div>

              </div>

            </div>
            {% endfor %} 

          </div>

        </div>

      </div>

    </div>

    <div class="product-box">


      <div class="product-minimal">

        <div class="product-showcase">

          <h2 class="title">New Arrivals</h2>

          <div class="showcase-wrapper has-scrollbar">

            {% for products in newArrivals %}
            <div class="showcase-container">

              {% for product in products %}
              <div class="showcase">

                <a href="#" class="showcase-img-box">
                  <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" width="70" class="showcase-img">
                </a>

                <div class="showcase-content">

                  <a href="#">
                    <h4 class="showcase-title">{{product.title}}</h4>
                  </a>

                  <a href="#" class="showcase-category">{{product.category_name}}</a>

                  <div class="price-box">
                    <p class="price">${{product.price}}</p>
                    <del>${{product.price}}</del>
                  </div>

                </div>

              </div>
              {% endfor %}

            </div>
            {% endfor %}

          </div>

        </div>

        <div class="product-showcase">
        
          <h2 class="title">Trending</h2>
        
          <div class="showcase-wrapper  has-scrollbar">
        
            {% for products in trending %}
            <div class="showcase-container">
        
              {% for product in products %}
              <div class="showcase">

                <a href="#" class="showcase-img-box">
                  <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" width="70" class="showcase-img">
                </a>

                <div class="showcase-content">

                  <a href="#">
                    <h4 class="showcase-title">{{product.title}}</h4>
                  </a>

                  <a href="#" class="showcase-category">{{product.category_name}}</a>

                  <div class="price-box">
                    <p class="price">${{product.price}}</p>
                    <del>${{product.price}}</del>
                  </div>

                </div>

              </div>
              {% endfor %}
        
            </div>
            {% endfor %}
         
        
          </div>
        
        </div>

        <div class="product-showcase">
        
          <h2 class="title">Top Rated</h2>
        
          <div class="showcase-wrapper  has-scrollbar">
          
          {% for products in topRated %}
            <div class="showcase-container">
        
              {% for product in products %}
              <div class="showcase">

                <a href="#" class="showcase-img-box">
                  <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" width="70" class="showcase-img">
                </a>

                <div class="showcase-content">

                  <a href="#">
                    <h4 class="showcase-title">{{product.title}}</h4>
                  </a>

                  <a href="#" class="showcase-category">{{product.category_name}}</a>

                  <div class="price-box">
                    <p class="price">${{product.price}}</p>
                    <del>${{product.price}}</del>
                  </div>

                </div>

              </div>
              {% endfor %}
        
            </div>
            {% endfor %}
        
            
        
          </div>
        
        </div>

      </div>


      <div class="product-featured">

        <h2 class="title">Deal of the day</h2>

        <div class="showcase-wrapper has-scrollbar">

          {% for product in dealOfTheDay %}
          <div class="showcase-container">

             
            <div class="showcase">
              
              <div class="showcase-banner">
                <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" class="showcase-img">
              </div>

              <div class="showcase-content">
                
                <div class="showcase-rating">
                  {% for i in 1..product.rating %}
                    <ion-icon name="star"></ion-icon>
                  {% endfor %}
                  {% for i in 1..(5 - product.rating) %}
                    <ion-icon name="star-outline"></ion-icon>
                  {% endfor %}
                </div>

                <a href="#">
                  <h3 class="showcase-title">{{product.title}}</h3>
                </a>

                <p class="showcase-desc">
                  {{product.description}}
                </p>

                <div class="price-box">
                  <p class="price">${{product.price * ((100 - product.discount) / 100)}}</p>

                  <del>${{product.price}}</del>
                </div>

                <button class="add-cart-btn">add to cart</button>

                <div class="showcase-status">
                  <div class="wrapper">
                    <p>
                      already sold: <b>{{product.sold}}</b>
                    </p>

                    <p>
                      available: <b>{{product.available}}</b>
                    </p>
                  </div>

                  <div class="showcase-status-bar"></div>
                </div>

                <div class="countdown-box">

                  <p class="countdown-desc">
                    Hurry Up! Offer ends in:
                  </p>

                  <div class="countdown">

                    <div class="countdown-content">

                      <p class="display-number">360</p>

                      <p class="display-text">Days</p>

                    </div>

                    <div class="countdown-content">
                      <p class="display-number">24</p>
                      <p class="display-text">Hours</p>
                    </div>

                    <div class="countdown-content">
                      <p class="display-number">59</p>
                      <p class="display-text">Min</p>
                    </div>

                    <div class="countdown-content">
                      <p class="display-number">00</p>
                      <p class="display-text">Sec</p>
                    </div>

                  </div>

                </div>

              </div>

            </div>
            

          </div>
          {% endfor %}

           

        </div>

      </div>


      <div class="product-main">

        <h2 class="title">New Products</h2>

        <div class="product-grid">
          {% for product in products %}

            <div class="showcase">

                <div class="showcase-banner">

                  <img src="{{ 'public/images/products/' ~ product.image1 }}" alt="{{product.title}}" width="300" class="product-img default">
                  <img src="{{ 'public/images/products/' ~ product.image2 }}" alt="{{product.title}}" width="300" class="product-img hover">

                  {% if product.discount > 0 %}
                    <p class="showcase-badge">{{product.discount}}%</p>
                  {% endif %}
                  

                  <div class="showcase-actions">

                    <button class="btn-action">
                      <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                      <a href="product.php?pro_id=<?=$prouct->id;?>">
                        <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
                      </a>
                    </button>

                    <button class="btn-action">
                      <ion-icon name="repeat-outline" role="img" class="md hydrated" aria-label="repeat outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                      <ion-icon name="bag-add-outline" role="img" class="md hydrated" aria-label="bag add outline"></ion-icon>
                    </button>

                  </div>

                </div>

                <div class="showcase-content">

                  <a href="#" class="showcase-category">
                    {{product.category_name}}
                  </a>

                  <a href="#">
                    <h3 class="showcase-title">
                        {{product.title}}
                    </h3>
                  </a>

                  <div class="showcase-rating">
                    <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                    <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                    <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                    <ion-icon name="star-outline" role="img" class="md hydrated" aria-label="star outline"></ion-icon>
                    <ion-icon name="star-outline" role="img" class="md hydrated" aria-label="star outline"></ion-icon>
                  </div>

                  <div class="price-box">
                    <p class="price">
                        {{product.price}}
                    </p>
                    {% if product.discount > 0 %}
                    <del>
                        {{product.price - (product.price * (product.discount / 100))}}
                    </del>
                    {% endif %}
                  </div>

                </div>

              </div>
            {% endfor %}
        </div>

      </div>

    </div>

  </div>

</div>


<div>

  

   

</div>

 

</main>

{% endblock %}