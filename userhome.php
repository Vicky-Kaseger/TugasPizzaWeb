<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Rhapsody</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="usermenupage">
    <header>
        <div class="logo">PIZZA RHAPSODY</div>
        <nav>
            <ul>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Status</a></li>
                <li><a href="#">Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="welcome-banner">
        <div class="welcome-text">
            <h1>Welcome, <?php echo $_SESSION["username"]?> !</h1> 
            <p>How can we satisfy your cravings today?</p>
        </div>
    </section>
    <main>
        <div class="menu-item">
            <img src="./Assets/pizza1.jpg" alt="Pizza Vito">
            <div class="details">
                <h3>Pizza Vito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore rerum voluptatem vel ad. Iure, nesciunt!</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza2.jpg" alt="Dino Lasagna">
            <div class="details">
                <h3>Dino Lasagna</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque aliquid quisquam vel, sed fuga sequi!</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza3.jpg" alt="Pizza Spesialito">
            <div class="details">
                <h3>Pizza Spesialito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza4.jpg" alt="Jenni Favorito">
            <div class="details">
                <h3>Jenni Favorito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza5.jpg" alt="Pizza Davido">
            <div class="details">
                <h3>Pizza Davido</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza6.jpg" alt="Cheesio Pizza">
            <div class="details">
                <h3>Cheesio Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza7.jpg" alt="Spaghetti Long">
            <div class="details">
                <h3>Spaghetti Long</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza8.jpg" alt="Spaghetti Bakso">
            <div class="details">
                <h3>Spaghetti Bakso</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza9.jpg" alt="Fetucinne Alvito">
            <div class="details">
                <h3>Fetucinne Alvito</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza10.jpg" alt="Katsu Fetucinne">
            <div class="details">
                <h3>Katsu Fetucinne</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza11.jpg" alt="Risotto Maknyuso">
            <div class="details">
                <h3>Risotto Maknyuso</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza12.jpg" alt="Chilio Risotto">
            <div class="details">
                <h3>Chilio Risotto</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza13.jpg" alt="Garfield Lasagna">
            <div class="details">
                <h3>Garfield Lasagna</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza14.jpg" alt="Arancini Bulato">
            <div class="details">
                <h3>Arancini Bulato</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="./Assets/pizza15.jpg" alt="Foccacia Redio">
            <div class="details">
                <h3>Foccacia Redio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil corporis omnis, velit molestiae quidem laudantium.</p>
                <button>Add to cart</button>
            </div>
        </div>
    </main>
</body>
</html>
