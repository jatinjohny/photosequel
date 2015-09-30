<?php
/**
 * Created by PhpStorm.
 * User: jatinjohny
 * Date: 27-Sep-15
 * Time: 23:16
 */

class Photographs
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllPhotos()
    {
        $sql = "SELECT * FROM photograph";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function findBy($field = '', $id = '')
    {
       if($field == 'id'){

           $sql = "SELECT * FROM photograph WHERE photographId =:id";
           $query = $this->db->prepare($sql);
           $query->execute([':id' => $id]);

           return $query->fetch();
       }
    }
    
    public function addPhoto($tmp_name, $name, $type, $size, $caption)
    {
        $sql = "INSERT INTO photograph (filename, type, size, caption)  VALUES (:name, :type, :size, :caption)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':type' => $type, ':size' => $size , ':caption' => $caption);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
        
        move_uploaded_file($tmp_name, WEB_ROOT . 'public/media/' . $name);
    }

    public function delete($id)
    {
        $photo = $this->findBy('id', $id);

        $sql = "DELETE FROM photograph WHERE photographId=:id LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $photo->photographId]);

        unlink(WEB_ROOT . 'public/media/' . $photo->filename);
    }
    
}