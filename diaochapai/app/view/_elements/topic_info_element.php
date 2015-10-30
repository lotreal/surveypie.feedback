<?php
$sn = $topic->sn;
$topic_url = uri('default/topic', array('s' => $sn));

if ($topic->from_admin) {
    $post_by = '管理员';
} else {
    $post_by = $topic->passport_email ? $topic->passport_email : '匿名';
}

$tags = array();
if ($topic->tags) $tags = decode_pg_array($topic->tags);

$class = array('topic');
if ($admin_mode) {
    if ($topic->is_unread) $class[] = 'unread';
    if ($topic->is_deleted) $class[] = 'deleted';
}
if ($topic->from_admin) $class[] = 'from_admin';
if ($top_topic) $class[] = 'top';
?>

<li class="<?php echo implode(' ', $class); ?>">
<table width="96%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><div class="date-group" title="时间"><?php echo date('Y-m-d H:i:s', strtotime($topic->create_time)); ?></div>
        <div class="meta"><?php echo $post_by; ?></div>        
        </td>
        <td>
<div class="content">
        <h4> <a class="subject" href="<?php echo $topic_url; ?>"><?php echo htmlspecialchars($topic->subject); ?></a>
            <?php if ($admin_mode): ?>
                <span class="topic-actions">
                <?php if ($topic->is_unread): ?>
                <a class="read action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'read')); ?>">已读</a>
                <?php endif; ?>

                <?php if ($topic->is_deleted): ?>
                <a class="show action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'show')); ?>">取消删除</a>
                <?php else: ?>
                <a class="hide action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'hide')); ?>">删除</a>
                <?php endif; ?>

                <?php if ($top_topic): ?>
                <a class="untop action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'untop')); ?>">取消置顶</a>
                <?php else: ?>
                <a class="top action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'top')); ?>">置顶</a>
                <?php endif; ?>

                <?php if ($topic->is_locked): ?>
                <a class="unlock action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'open')); ?>">打开</a>
                <?php else: ?>
                <a class="lock action" href="<?php echo uri('admin/topic', array('s' => $sn, 'm' => 'close')); ?>">关闭</a>
                <?php endif; ?>

                </span>
            <?php endif; ?>
        </h4>
            <ul class="tag-chain">
                <?php foreach ($tags as $tag): ?>
                <li class="off first"><a rel="tag" href="/?t=<?php echo $tag; ?>"><?php echo $tag; ?></a></li>
                <?php endforeach; ?>
            </ul>
    </div>        
        </td>
        <td width="60" align="right">
        <div class="replies-count"><?php echo $topic->reply_count; ?></div>
        </td>
    </tr>
</table>
</li>
