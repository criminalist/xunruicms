<?php namespace Phpcmf\Model;




class Email extends \Phpcmf\Model
{


    // 缓存
    public function cache($site = SITE_ID) {

        $data = $this->table('mail_smtp')->order_by('displayorder asc')->getAll();
        $cache = [];
        if ($data) {
            foreach ($data as $t) {
                $cache[$t['id']] = $t;
            }
        }

        \Phpcmf\Service::L('cache')->set_file('email', $cache);

    }
}