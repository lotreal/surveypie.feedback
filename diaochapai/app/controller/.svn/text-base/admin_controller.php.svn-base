<?php
class Controller_Admin extends Controller_Abstract {
    public function actionTopic() {
        $context = $this->_context;
        $topic = Topic::find('sn = ?', $context->get('s'))->getOne();
        $method = $context->get('m');

        if ($method == 'show') {
            $topic->delete(false);
        } elseif ($method == 'hide') {
            $topic->delete(true);
        } elseif ($method == 'top') {
            $topic->setTop(true);
        } elseif ($method == 'untop') {
            $topic->setTop(false);
        } elseif ($method == 'open') {
            $topic->close(false);
        } elseif ($method == 'close') {
            $topic->close(true);
        } elseif ($method == 'add_note') {
            $this->_addTopicNote($topic);
        } elseif ($method == 'del_note') {
            $this->_delTopicNote($topic);
        } elseif ($method == 'read') {
            $topic->setReaded();
        }

        return $this->_redirect($context->referer());
    }

    /**
     * 增加管理员标注
     *
     * @param mixed $topic
     * @access protected
     * @return void
     */
    protected function _addTopicNote($topic) {
        $content = $this->_context->post('note');
        if ($content) $topic->addNote($content);
    }

    /**
     * 删除管理员标注
     *
     * @param mixed $topic
     * @access protected
     * @return void
     */
    protected function _delTopicNote($topic) {
        Topic_Notes::find('sn = ?', $this->_context->get('n'))->getOne()->destroy();
    }
}
