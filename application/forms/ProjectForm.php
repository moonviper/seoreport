<?php

class Application_Form_ProjectForm extends Zend_Form {

    public function init() {
        $model = new Application_Model_admin();
        $row = $model->fetchAll();
        $this->setAttrib('class', 'form-signin');
        $title = $this->createElement('text', 'title')->setRequired(true)->setAttrib('Placeholder', 'Project Title');
        $description = $this->createElement('text', 'description')->setRequired(true)->setAttrib('Placeholder', 'Description');
        $date_added = $this->createElement('text', 'date_added')->setAttrib('class', 'daterangepicker')->setRequired(true)->setAttrib('Placeholder', 'YYYY/MM/DD');
        $attachment = $this->createElement('file', 'attachment')->setAttrib('Placeholder', 'Choose a file');
        $attachment->setDestination(APPLICATION_PATH . '/../public/uploads')->setRequired(true);
        $user_id = $this->createElement('select', 'user_id')->setRequired(TRUE)->setAttrib('class', 'span2');
        foreach ($row as $r) {
            $arr[$r->id] = $r->name;
        }
        $user_id->addMultiOption('', 'Assign to');
        $user_id->addMultiOptions($arr);
        $submit = $this->createElement('submit', 'insert')->setRequired(true)->setAttrib('class', 'btn btn-primary');
        $this->addElements(array($title, $description, $date_added, $attachment, $user_id, $submit));
    }

}

?>