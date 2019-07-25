<header class="masthead" style="background-image: url('/public/materials/<?php echo $data['id']; ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo htmlspecialchars($data['post_title'], ENT_QUOTES); ?></h1>
                    <span class="subheading"><?php echo htmlspecialchars($data['post_categori'], ENT_QUOTES); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?php echo htmlspecialchars($data['post_text'], ENT_QUOTES); ?></p>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
            <div class="card-header">Комментарии</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($list as $val): ?>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><?php  echo $val['comment_name'] ?></h6>
                                    <p class="mb-0"><?php  echo $val['comment_text'] ?></p>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="/comment/add" method="post">
                <h4>Добавить коментарий</h4>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <p><input type="text" class="form-control" name="name" placeholder="Имя"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <p><textarea rows="5" class="form-control" name="text" placeholder="Сообщение"></textarea></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary" onclick='window.location.reload()' id="sendMessageButton">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>