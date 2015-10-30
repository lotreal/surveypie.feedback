<?php
$belong_topic = isset($belong_topic) ? $belong_topic : null;
$admin_mode = isset($admin_mode) ? $admin_mode : false;
$locked = isset($locked) ? $locked : false;

$subject = ($belong_topic AND $belong_topic->subject) ? 'Reply:'.$belong_topic->subject : '';
if ($subject) $subject = mb_substr($subject, 0, 100, 'utf-8');
?>
<div class="topic_editor">
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top">

    <?php if ($belong_topic): ?>
    <h3>Reply</h3>
    <?php else: ?>
    <h3>New topic</h3>
    <?php endif; ?>

    <?php if (Passport::instance()->sn OR $allow_anonymous): ?>

        <?php if ($belong_topic AND $belong_topic->is_locked): ?>
            <div>This topic is closed, you can't reply to it.</div>
        <?php else: ?>
            <form method="post" id="frmTopic" action="<?php echo url('default/topic'); ?>">
                <table width="490" border="0" cellpadding="5" cellspacing="0" id="post-box">
                    <tr>
                        <td width="80" align="right" valign="top">Title:</td>
                        <td width="390"><input type="text" style="width: 96%;" name="subject" class="input" maxlength="100" value="<?php echo $subject; ?>"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">Content:</td>
                        <td><textarea style="width: 96%;" rows="8" name="content"></textarea></td>
                    </tr>
                    <?php if ($admin_mode): ?>
                    <tr>
                        <td align="right" valign="top">话题类别：</td>
                        <td>
                            <?php foreach (Q::ini('appini/topic_tags') as $tag): ?>
                            <input type="checkbox" name="tag[]" value="<?php echo $tag; ?>">
                            <label for="tag1"><?php echo $tag; ?></label>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="2" align="center"><button type="submit">Submit</button></td>
                    </tr>
                </table>
                <?php if ($belong_topic && $belong_topic->sn): ?>
                <input type="hidden" name="belong_to" value="<?php echo $belong_topic->sn; ?>"/>
                <?php endif; ?>
            </form>
        <?php endif; ?>

    <?php else: ?>

        <div>You need to <a href="<?php echo get_login_url(); ?>">login</a> to add a topic</div>

    <?php endif; ?>
        </td>
        <td valign="top">
        <div id="help-message">
                <p>You can search <a href="http://www.surveypie.com/help/index.html" target="_blank">Help Centre</a> for answers or you can contact us.</p>
                <ul>
                    <li>Email: <a href="mailto:support@surveypie.com">support@surveypie.com</a></li>
                </ul>
            </div>        
        </td>
    </tr>
</table>
</div>
