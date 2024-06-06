<?php
    class crud{
        public static function database()
        {
           try {
            $con=new PDO('mysql:localhost=host; dbname=crud','root','');
            return $con;
           } catch (PDOException $error1) {
                echo 'Something went wrong with your conection!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Generic error!'.$error2->getMessage();
           }
        }
        public static function Selectdata()
        {
            $data=array();
            $p=crud::database()->prepare('SELECT * FROM users');
            $p->execute();
           $data=$p->fetchAll(PDO::FETCH_ASSOC);
           return $data;
        }
        public static function delete($id)
        {
            $p=crud::database()->prepare('DELETE FROM users WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
public static function userDataPerId($id)
{
    $data=array();
    $p=crud::database()->prepare('SELECT * FROM users WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
   $data=$p->fetch(PDO::FETCH_ASSOC);
   return $data;
}




    }





?>