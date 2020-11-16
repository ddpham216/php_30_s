<?php 
    include("connect.php");

    // $type = $_GET['type'];
    // $query = "SELECT * FROM product WHERE type = " . "'" . $type ."'" ;

    // echo $query;

    // $result = $conn->query($query);

    // $row = $result->fetch_all();

    // print_r($row);

    // if($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
            
    //     }
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>30SHINE STORE</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div id="wrapper-header">
            <div id="logo">
                <a href="/learn_php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="product_list.php?category=1">TẠO KIỂU TÓC</a></li>
                    <li><a href="product_list.php?category=2">CHĂM SÓC TÓC</a></li>
                    <li><a href="product_list.php?category=3">CHĂM SÓC DA</a></li>
                    <li><a href="product_list.php?category=4">CHĂM SÓC CƠ THỂ</a></li>
                    <li><a href="product_list.php?category=5">CHĂM SÓC RÂU</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section id="main-slider">
        <img src="images/slide.png" alt="">
    </section>

    <section id="wrapper-breadcrumb">
        <div id="breadcrumb">
            <?php
                $query = "SELECT name FROM category WHERE id=" . $_GET['category'];
                $category = NULL;
                $result = $conn->query($query);
                if ($result->num_rows) {
                    $category = $result->fetch_assoc();
                }
            ?>
            <a href="/learn_php">Trang chủ</a> &nbsp; / <?php echo $category['name']; ?>
        </div>
    </section>
    
    <section id="wrapper-collection">
        <div id="left-collection">
            <div id="mini-cate">
                <ul>
                    <li id="main-minicate"><h3>Danh mục sản phẩm</h3></li>
                    <?php 
                        $query = "SELECT * FROM category WHERE id=" . $_GET['category'];
                        $parent = $conn->query($query)->fetch_assoc();
                        $query = 'SELECT * FROM category WHERE parent_slug= "' . $parent['slug'] . '"';
                        $result = $conn->query($query);
                        if ($result->num_rows) {
                            while ($subcate = $result->fetch_assoc()) {
                                echo '<li><a href="/learn_php/product_list.php?category=' . $parent['id'] . '&subcate=' . $subcate['id'] . '">'. $subcate['name'] . '</a></li>'; 
                            }
                        }
                     ?>
                </ul>
            </div>
        </div>
        <div id="right-collection">
            <div id="head-list">
                <h2>DANH SÁCH SẢN PHẨM</h2>
            </div>
            <div id="list-item">
                <?php

                    $category = $_GET['category'];
                    if (isset($_GET['subcate'])) {
                        $category = $_GET['subcate'];
                    }
                    $query = "SELECT id, name, category, image_url, price FROM product WHERE category = " . $category;
                    $result = $conn->query($query);
                    if($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                                <div id="item-l">
                                    <a href="/learn_php/detail.php?category=' . $row['category'] . '&id=' . $row['id'] . '">
                                        <img src="' . $row['image_url'] . '" alt="Item">
                                    </a>
                                    <div id="title-item">
                                        <a href="#"><h3>' . substr((string)$row['name'], 0, 29) . '...</h3></a>
                                        <p id="item-price">' . $row['price'] . ' VNĐ</p>
                                    </div> 
                                </div>
                            ';
                        }
                    }
                 ?>
            </div>
        </div>
    </section>
    
    <footer>
        <div id="wrapper-footer">
            <div id="left-footer">
                <ul>
                    <li class="aside-link"><a href="#">HỖ TRỢ KHÁCH HÀNG</a></li>
                    <li><a href="#">Tìm kiếm</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                </ul>
            </div>
            <div id="center-footer">
                <ul>
                    <li class="aside-link"><a href="#">MUA SẮM CÙNG CHÚNG TÔI</a></li>
                </ul>
            </div>
            <div id="right-footer">
                <ul>
                    <li class="aside-link"><a href="#">KẾT NỐI VỚI CHÚNG TÔI</a></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body></html>