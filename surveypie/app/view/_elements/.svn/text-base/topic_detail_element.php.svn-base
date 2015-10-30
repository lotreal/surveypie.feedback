<?php
$sn = $topic->sn;

$subject = htmlspecialchars($topic->subject);
$content = nl2br(htmlspecialchars($topic->content));

if ($topic->from_admin) {
    $post_by = 'Manager';
} else {
    $post_by = $topic->passport_email ? $topic->passport_email : 'Anonymous';
}

$class = array($topic->belong_to ? 'reply' : 'topic');
if ($admin_mode) {
    if ($topic->is_deleted) $class[] = 'deleted';
}
if ($topic->from_admin) $class[] = 'from_admin';
?>
<li class="<?php echo implode(' ', $class); ?>">
    <div class="content">
        <h4 class="subject"><?php echo $subject; ?></h4>
        <div class="meta">
            <span class="author">
                Creator：<?php echo $post_by; ?>
                <?php if ($admin_mode AND $topic->passport_sn): ?>
                    <a href="http://www.diaochapai.com/admin/passport/info?sn=<?php echo $topic->passport_sn; ?>" target="_blank">账号信息</a>
                <?php endif; ?>
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo date(Q::ini('appini/date_fmt'), strtotime($topic->create_time)); ?>
        </div>
        <div class="description"><?php echo $content; ?></div>
    </div>

    <?php if ($admin_mode): ?>
    <span class="topic-actions">
        <?php if ($topic->is_deleted): ?>
        <a class="deleted action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'show')); ?>">取消删除</a>
        <?php else: ?>
        <a class="action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'hide')); ?>">删除</a>
        <?php endif; ?>

        <?php if (!$topic->belong_to AND $topic->is_unread): ?>
        <a class="action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'read')); ?>">设置为已读</a>
        <?php endif; ?>
    </span>
    <?php endif; ?>
</li>
