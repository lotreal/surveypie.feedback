<?php $this->_extends('_layouts/default_layout'); ?>

<?php $this->_block('title'); ?>Feedback<?php $this->_endblock(); ?>

<?php $this->_block('contents'); ?>
<div id="main">
    <ul class="tag-list">
        <li class="shortcut first">
            <a href="<?php echo uri('default/index'); ?>">All</a>
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
            <a href="?from=self">My questions</a>
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
if ($has_prev) $links[] = sprintf('<a href="%s">Previous</a>', uri('default/index', array_merge($get, array('p' => $current_page - 1))));
if ($has_next) $links[] = sprintf('<a href="%s">Next</a>', uri('default/index', array_merge($get, array('p' => $current_page + 1))));
echo implode('|', $links);
?>
    </div>
    <?php $this->_element('topic_form', array('admin_mode' => $admin_mode, 'allow_anonymous' => $allow_anonymous)); ?>

</div>
<?php $this->_endblock('contents'); ?>

<?php $this->_block('javascript'); ?>
<script type="text/javascript">
window.addEvent('domready', function() {
        var tag = '<?php echo $t; ?>';
        if (tag) {
            var tags = $$('#main .tag-list li'), links = $$('#main .tag-list a');
        tags.removeClass('shortcut');
        tags.each(function(t, idx) {
                if(links[idx].href.replace('%20', ' ').match(tag,'i')) 
                    tags[idx].addClass('shortcut');
});
        }
    var form = $('frmTopic');
    if (!form) return;

    form.addEvent('submit', function(event) {
        var subject = $(form['subject']).get('value').trim();
        if (!subject) {
            window.alert('Please enter topic title');
            $(form['subject']).focus();
            return false;
        }

        var content = $(form['content']).get('value').trim();
        if (!content) {
            window.alert('Please enter content');
            $(form['content']).focus();
            return false;
        }

        return true;
    });
});
</script>
<?php $this->_endblock(); ?>
