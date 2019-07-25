<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Контакты</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($list)): ?>
                            <p>Список контактов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>имя</th>
                                    <th>email</th>
                                    <th>текст</th>
                                    <th>дата записи</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['contact_name'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['contact_email'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['contact_text'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['contact_date'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/contacts/delete/<?php echo $val['contact_id']; ?>" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>