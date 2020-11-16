<?php
    include("connect.php");
    $query = "SELECT * FROM product WHERE featured=1 LIMIT 6";
    $result = $conn->query($query);
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

    <section class="container-s">
        <h2>DANH MỤC SẢN PHẨM</h2>
        <hr>
        <div id="wrapper-cate">
            <div class="cate-item">
                <a href="product_list.php?category=1">
                    <img src="images/tao_kieu_toc.png" alt="">
                </a>
                <div class="cate-title">
                    <a href="product_list.php?category=1">
                        <h4>Tạo kiểu tóc</h4>
                    </a>
                </div>
            </div>
            <div class="cate-item">
                <a href="product_list.php?category=2">
                    <img src="images/cham_soc_toc.png" alt="">
                </a>
                <div class="cate-title">
                    <a href="product_list.php?category=2">
                        <h4>Chăm sóc tóc</h4>
                    </a>
                </div>
            </div>
            <div class="cate-item">
                <a href="product_list.php?category=3">
                    <img src="images/cham_soc_da.png" alt="">
                </a>
                <div class="cate-title">
                    <a href="product_list.php?category=3">
                        <h4>Chăm sóc da</h4>
                    </a>
                </div>
            </div>
            <div class="cate-item">
                <a href="product_list.php?category=4">
                    <img src="images/cham_soc_co_the.png" alt="">
                </a>
                <div class="cate-title">
                    <a href="product_list.php?category=4">
                        <h4>Chăm sóc cơ thể</h4>
                    </a>
                </div>
            </div>
            <div class="cate-item">
                <a href="product_list.php?category=5">
                    <img src="images/cham_soc_rau.png" alt="">
                </a>
                <div class="cate-title">
                    <a href="product_list.php?category=5">
                        <h4>Chăm sóc râu</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-s">
        <h2>SẢN PHẨM HOT</h2>
        <hr>
        <div id="wrapper-hot">

            <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="hot-item">
                                <div class="product-overlay">
                                    <a href="/learn_php/detail.php?category=' . $row['category'] . '&id='. $row['id'] . '""><img src=' . $row['image_url'] . ' alt="Hot Item"></a>
                                </div>
                                <div class="product-info">
                                    <div class="hot-name">
                                        <a href="/learn_php/detail.php?category=' . $row['category'] . '&id='. $row['id'] . '"">
                                        <p>' . substr((string)$row['name'], 0, 50) . '...</p>
                                        </a>
                                    </div>
                                    <div class="hot-price">
                                        <p>' . $row['price'] . ' VNĐ</p>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
                
            
            <!-- <div class="hot-item">
                <div class="product-overlay">
                    <a href="#"><img src="images/hot-item.png" alt="Hot Item"></a>
                </div>
                <div class="product-info">
                    <div class="hot-name">
                        <a href="">
                            <p>Sáp Glanzen Clay - Ưu Đãi Mua Kèm Gôm</p>
                        </a>
                    </div>
                    <div class="hot-price">
                        <p>390.000 VNĐ</p>
                    </div>
                </div>
            </div> -->

            <div id="bot-hot">
                <div id="show-more">
                    <a href="#">
                        <p>Xem thêm sản phẩm</p>
                    </a>
                </div>

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
</body>

</html>
