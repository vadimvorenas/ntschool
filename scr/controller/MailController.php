<?php

include_once 'scr/model/MailModel.php';

class MailController
{
    protected $db;
    private $table_name = 'email';
    protected $user;
    protected $mail;

    public function __construct(PDO $db, $user)
    {
        $this->mail = new MailModel($db);
        $this->user = $user;
        $this->db = $db;
    }

    public function send()
    {

        $user_id = $this->user->getUserByLogin((string) $_SESSION['login']);
        $user_id = $user_id['id'];
        $to = $_POST['email'];
        $subject = $_POST['name'];
        $text = $_POST['message'];

        $this->mail->setMail($user_id, $to, $subject, $text);

        mail($to, $subject, $text);

    }

    public function get ($id)
    {
        return $this->mail->getMails($id);
    }

    public function delete($id)
    {
        $this->mail->deletedMails($id);
    }
}


