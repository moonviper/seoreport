<?php

class Application_Form_ForgotForm extends Zend_Form {

    public function init() {
        $code = $this->createElement('password', 'code')->setRequired(TRUE)->setAttrib('Placeholder', 'Enter Confimation Code');
        $confirmpass = $this->createElement('password', 'confirmpass')->setRequired(TRUE)->setAttrib('Placeholder', 'Confirm Password')
                        ->addValidator('StringLength', FALSE, array(4));
        $pass = $this->createElement('password', 'pass')->setRequired(TRUE)->setAttrib('Placeholder', 'New Password')->addValidator('StringLength', false, array(4))
                       ->addValidator('Identical', false, array('token' => 'confirmpass', 'messages' => 'Password do not match!'));
        $submit = $this->createElement('submit', 'submit')->setAttrib('class', 'btn btn-primary');
        $this->addElements(array($code, $confirmpass, $pass, $submit));
    }

}

?>
