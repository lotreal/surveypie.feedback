<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?>用户反馈<?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>
<div id="main">
    <ul class="tag-list">
        <li class="shortcut first">
            <a href="<?php echo uri('default/index'); ?>">全部帖子</a>
        </li>
        <?php foreach (Q::ini('appini/topic_tags') as $tag): ?>
        <li class="off first">
            <a rel="tag" href="?t=<?php echo $tag; ?>"><?php echo $tag; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>

    <ul class="shortcut-list">
        <?php if (Passport::instance()->sn): ?>
        <li class="shortcut first">
            <a href="?from=self">查看我提的问题</a>
        </li>
        <?php endif; ?>

        <?php if ($admin_mode): ?>
        <li class="shortcut">
            <a href="?unread=1">未审核</a>
        </li>
        <li class="shortcut last">
            <a href="?note=1">已标注</a>
        </li>
        <?php endif; ?>
    </ul>

    <ul id="topic-list">
        <?php if (count($top_topic)): ?>
            <?php foreach ($top_topic as $topic): ?>
                <?php $this->_element('topic_info', array('topic' => $topic, 'top_topic' => true, 'admin_mode' => $admin_mode)); ?>
            <?php endforeach; ?>

        <?php endif; ?>

        <?php foreach ($normal_topic as $topic): ?>
            <?php $this->_element('topic_info', array('topic' => $topic, 'top_topic' => false, 'admin_mode' => $admin_mode)); ?>
        <?php endforeach; ?>
    </ul>

    <div class="pager">
<?php
$get = $_ctx->get();
foreach ($get as $k => $v) {
    if (in_array($k, array('action', 'module', 'namespace'))) unset($get[$k]);
}

$links = array();
if ($has_prev) $links[] = sprintf('<a href="%s">上一页</a>', uri('default/index', array_merge($get, array('p' => $current_page - 1))));
if ($has_next) $links[] = sprintf('<a href="%s">下一页</a>', uri('default/index', array_merge($get, array('p' => $current_page + 1))));
echo implode('|', $links);
?>
    </div>
    <?php $this->_element('topic_form', array('admin_mode' => $admin_mode, 'allow_anonymous' => $allow_anonymous)); ?>

</div>
<?php $this->_endblock('contents'); ?>

<?php $this->_block('javascript'); ?>
<script type="text/javascript">
window.addEvent('domready', function() {
    var form = $('frmTopic');
    if (!form) return;

    form.addEvent('submit', function(event) {
        var subject = $(form['subject']).get('value').trim();
        if (!subject) {
            window.alert('请输入标题');
            $(form['subject']).focus();
            return false;
        }

        var content = $(form['content']).get('value').trim();
        if (!content) {
            window.alert('请输入内容');
            $(form['content']).focus();
            return false;
        }

        return true;
    });
});
</script>
<?php $this->_endblock(); ?>
