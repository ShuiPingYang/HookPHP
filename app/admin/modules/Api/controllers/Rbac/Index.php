<?php
class Rbac_IndexController extends Base\ApiController
{
    public function getAction()
    {
        $data = $this->model->get();
        foreach ($data as &$v) {
            $v['role_id'] = $this->model->getData('hp_'.APP_NAME.'_rbac_role_lang', $v['role_id'])['name'];
            $v['type'] = l($this->_request->controller.'.typeSelect.'.$v['type']);
            $v['status'] = l('status.'.$v['status']);
        }
        return $this->send($data);
    }
}