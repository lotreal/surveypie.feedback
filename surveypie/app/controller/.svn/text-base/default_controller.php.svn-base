<?php
class Controller_Default extends Controller_Abstract {
    protected $admin_mode;  // 管理员模式

    protected function _before_execute() {
        $this->admin_mode = Passport::instance()->hasRole('admin');
        $this->allow_anonymous = Q::ini('appini/allow_anonymous');
    }

    protected function _after_execute(&$response) {
        $this->_view['admin_mode'] = $this->admin_mode;
        $this->_view['allow_anonymous'] = $this->allow_anonymous;
    }

    public function actionIndex() {
        $context = $this->_context;

        $page = $context->get('p', 1);
        $page_size = $context->get('l', 10);

        if ($page > 1 OR $context->get('t') OR $context->get('q') OR $context->get('from')) {
            $this->_view['top_topic'] = array();
        } else {
            $select = Topic::findTop();
            if (!$this->admin_mode) $select->where('is_deleted = 0');
            $this->_view['top_topic'] = $select->order('create_time desc')->getAll();
        }

        $limit = $page_size + 1;    // 多向后取一条，判断是否有下一页
        $offset = $page_size * ($page - 1);
        $select = Topic::findNormal()->order('create_time desc')->limit($offset, $limit);
        if ($this->admin_mode) {
            if ($context->get('note')) $select->where('sn in (select topic_sn from topic.topic_notes)');
            if ($context->get('unread')) $select->where('is_unread = 1');
        } else {
            $select->where('is_deleted = 0');   // 只有管理员可以看到已经删除的帖子
        }

        if ($tag = $context->get('t')) {
            $select->where('? = ANY(tags)', $tag);
        }

        if ($query = $context->get('q')) {
            $select->where('subject like ?', '%'. $query .'%');
        }
        QDebug_FirePHP::dump($select->__toString());

        $passport = Passport::instance();
        if ($context->get('from') && $passport->sn) {
            $select->where('passport_sn = ?', $passport->sn);
        }

        $topics = $select->getAll();
        if ($topics->count() > $page_size) {
            $topics->pop(); // 删除最后一条
            $this->_view['has_next'] = true;
        } else {
            $this->_view['has_next'] = false;
        }

        $this->_view['has_prev'] = $page > 1 ? true : false;
        $this->_view['current_page'] = $page;

        $this->_view['normal_topic'] = $topics;
        $this->_view['t'] = $context->get('t', '');
    }

    public function actionTopic() {
        $context = $this->_context;
        if ($context->isPOST()) {
            $result = $this->_createTopic();
            if ($result) return $result;
        }

        $topic = Topic::find('sn = ?', $context->get('s'))->getOne();
        $this->_view['topic'] = $topic;
    }

    protected function _createTopic() {
        $passport = Passport::instance();
        if (!$passport->sn AND !$this->allow_anonymous) return false;

        $context = $this->_context;

        $subject = trim($context->post('subject'));
        $content = trim($context->post('content'));

        if (!$subject OR !$content) return false;

        $props = array(
            'subject' => $subject,
            'content' => $content,
        );

        if ($belong_to = $context->post('belong_to')) {   // belong to topic sn
            $props['belong_to'] = $belong_to;
        }

        if ($this->admin_mode) $props['from_admin'] = 1;

        // 管理员可以通过发表帖子修改主帖的类别
        if ($tag = $context->post('tag') AND $this->admin_mode) {
            $tag = encode_pg_array($tag);

            if ($belong_to) {       // 回复帖子 修改父帖tag
                $parent = Topic::find('sn = ?', $belong_to)->getOne();
                $parent->changeProps(array(
                    'tags' => $tag
                ));
                if ($parent->id()) $parent->save();
            } else {                // 新帖子 当前帖子
                $props['tags'] = $tag;
            }
        }

        if ($passport->sn) {
            $props['passport_sn'] = $passport->sn;
            $pos = strpos($passport->email, '@');
            if ($pos === false) {
                $props['passport_email'] = $passport->email;
            } else {
                $props['passport_email'] = substr($passport->email, 0, $pos);
            }
        }

        $topic = new Topic();
        $topic->changeProps($props);
        $topic->save();

        $url = $context->referer();
        if (!$url) $url = url('default/index');
        return $this->_redirect($url);
    }
}
