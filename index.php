<?php require_once 'includes/init.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>وبلاگ من</title>
</head>
<body>
<div class="header"> <!-- start header-->
    <div class="contanier"><!-- start contanier-->
        <ul class="menu">

            <?php
            $showCategory = selectAllCategory();
            foreach ($showCategory as $value) {
                echo "<li><a href='categories.php?cate_id={$value->cate_id}'>{$value->cate_title}</a></li>";
            }

            ?>
            <li><a href="Login.php">ورود مدیریت</a></li>
            <li class="logo"><a href="./"><img src="images/weblogo.png"></a></li>
        </ul>
        <div class="clear"></div>
    </div><!-- end contanier-->

    <div class="HeaderPic"><!-- end HeaderPic-->
        <img src="images/bgtop.jpg">

        <form action="search.php" method="post">
            <div class="search"><!-- end search-->
                <input type="text" name="search" class="inputSearch" placeholder="جستجو کنید ">
                <button class="searchBtn" name="btnSearch">جستجو</button>
                <div class="clear"></div>
            </div><!-- end search-->
        </form>
        <div class="clear"></div>
    </div><!-- end HeaderPic-->

    <div class="clear"></div>
</div><!-- end header-->
<div class="body"><!-- start body-->
    <div class="contanier"><!-- start contanier-->
        <?php
        $selectAllPosts = selectAllPost();
        if ($selectAllPosts) {
            foreach ($selectAllPosts as $value) {
                ?>
                <div class="post"><!-- start post-->
                    <div class="postHeader"><!-- start postHeader-->
                        <h1 class="postTitle"><a
                                    href="post.php?post_id=<?php echo $value->post_id ?>"><?php echo $value->post_title ?></a>
                        </h1>
                        <span> تاریخ انتشار : <?= convertDateToFarsi($value->post_created_at); ?> </span>
                        <div class="clear"></div>
                    </div><!-- end postHeader-->
                    <div class="postBody"><!-- start postBody-->
                        <div class="postPic"><!-- start postPic-->
                            <img src="images/<?php echo $value->post_img ?>">
                        </div><!-- end postPic-->
                        <div class="postDesc"><!-- start postHeader-->
                            <?php
                            echo readMore($value->post_body);

                            ?>
                        </div><!-- end postDesc-->
                        <div class="clear"></div>
                    </div><!-- end postBody-->
                    <div class="postFooter"><!-- start postFooter-->
                        <span>نویسنده مطلب :<?php echo $value->post_author ?> </span>
                        <a href="post.php?post_id=<?php echo $value->post_id ?>" class="ReadMore">ادامه مطلب</a>
                        <div class="clear"></div>
                    </div><!-- end postHeader-->

                    <div class="clear"></div>
                </div><!-- end post-->
            <?php }
        } else {
            echo '<p class="alert alert-info">مطلبی وجود ندارد</p>';
        } ?>
        <div class="clear"></div>
        <div class="pagei">
            <?php

            for ($i = 1; $i <= $count; $i++) {
                if ($i == $_GET['page']) {
                    echo '<a href="index.php?page=' . $i . '" class="paginate active">' . $i . '</a>';
                } else {
                    echo '<a href="index.php?page=' . $i . '" class="paginate">' . $i . '</a>';
                }
            }

            ?>
            <div class="clear"></div>
        </div>
    </div><!-- end body-->
    <div class="clear"></div>


</div><!-- end body-->

<div class="footer"><!-- end footer-->
    <p>Webamooz.Net</p>
</div><!-- end header-->

</body>
</html>