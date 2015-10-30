<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?>用户反馈<?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>
<div id="topic-main">

    <ul class="shortcut-list">
        <li class="shortcut first">
            <a href="<?php echo url('default/index'); ?>">返回列表</a>
        </li>
    </ul>

    <?php if ($admin_mode): ?>
    <form method="post" action="/admin/topic?s=<?php echo $topic->sn; ?>&m=add_note" class="admin_note">
        <h3>管理员标注</h3>
        <ul>
        <?php foreach ($topic->notes as $note): ?>
            <li>
                <?php echo $note->content; ?>(<?php echo date('Y-m-d H:i:s', strtotime($note->create_time)); ?>)
                <a href="/admin/topic?s=<?php echo $note->topic_sn; ?>&n=<?php echo $note->sn; ?>&m=del_note">删除</a>
            </li>
        <?php endforeach; ?>
        </ul>
        <input size="50" name="note" maxlength="255" />
        <button type="submit">添加</button>
    </form>
    <?php endif; ?>
    <ul id="topic-detail">
        <?php $this->_element('topic_detail', array('topic' => $topic)); ?>
        <?php
            $select = $topic->findReply();
            if (!$admin_mode) $select->where('is_deleted = 0');
            $select->order('create_time');
            foreach ($select->getAll() as $reply) $this->_element('topic_detail', array('topic' => $reply));
        ?>
    </ul>
    <?php $this->_element('topic_form', array('belong_topic' => $topic, 'admin_mode' => $admin_mode, 'allow_anonymous' => $allow_anonymous)); ?>
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
