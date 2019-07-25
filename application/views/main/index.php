<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Встречают по одежке...</h1>
                    <span class="subheading">простой блог о стиле</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($list)): ?>
                <p>Список постов пуст</p>
            <?php else: ?>
                <?php foreach ($list as $val): ?>
                    <div class="post-preview">
                        <div class="media">
                            <img src="public/materials/<?php echo $val['id']; ?>.jpg" class="align-self-center mr-2" >
                            <div class="media-body">
                                <a href="/post/<?php echo $val['id']; ?>">
                                <h5 class="mt-0"><?php echo htmlspecialchars($val['post_title'], ENT_QUOTES); ?></h5>
                                <h6 class="mt-0">Категория:<?php echo htmlspecialchars($val['post_categori'], ENT_QUOTES); ?></h6>
                            </a>
                            <p class="post-meta">дата поста <?php echo  $val['post_date']; ?></p>
                        </div>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
                <div class="clearfix">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>