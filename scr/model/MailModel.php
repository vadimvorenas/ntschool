<?php

class MailModel
{
    protected $db;
    protected $name_db = 'email';

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function setMail($user_id, $to, $subject, $text)
    {

        $user_id = trim(htmlspecialchars($user_id));
        $to = trim(htmlspecialchars($to));
        $subject = trim(htmlspecialchars($subject));
        $text = trim(htmlspecialchars($text));

        $db =$this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf( "INSERT INTO %s (user_id, toEmail, subject, text) VALUES ( :user_id, :toEmail, :subject, :text)", $this->name_db);
        $params = [
            'user_id' => $user_id,
            'toEmail' => $to,
            'subject' => $subject,
            'text' => $text,

        ];
        $query = $db->prepare($sql);

        try{
            $query->execute($params);
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getMails(string $id_user)
    {
        $sql = sprintf("SELECT * FROM %s WHERE user_id = :id_user AND deleted IS NULL ", $this->name_db);
        $smtp = $this->db->prepare($sql);
        $smtp->bindParam(':id_user', $id_user);
        $smtp->execute();

        try{
            return $smtp->fetchAll();
        }
        catch (\Exception $exception){
            echo "Проблемы с подключением к БД" . $exception->getMessage();
        }
        // TODO: Implement getAll() method.
    }


    public function deletedMails(string $id)
    {
        $sql = sprintf("UPDATE %s SET deleted = 1 WHERE id = :id" , $this->name_db);
        $stmp = $this->db->prepare($sql);
        $stmp->bindParam(':id' , $id);

        try{
            ( $stmp->execute());
            return true;
        }
        catch (\Exception $exception){
            echo "Проблемы с подключением к БД" . $exception->getMessage();
        }

        // TODO: Implement deleted() method.
    }

}