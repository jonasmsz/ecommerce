<?php 

namespace Hcode\Model;

use \Hcode\DB\SqL;
use \Hcode\ModeL;
use \Hcode\Mailer;

class Category extends Model {

    public static function listALL()
    {

        $sql = new SqL();

        return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

    }

    public function save()
    {

        $sql = new SqL();

        $results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
            ":idcategory"=>$this->getidcategory(),
            ":descategory"=>$this->getdescategory()
        ));

        $this->setData($results[0]);

    }

    public function get($idcategory)
    {

        $sql = new SqL();

        $results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
            ":idcategory"=>$idcategory
        ]);

        $this->setData($results[0]);

    }

    public function delete()
    {

        $sql = new SqL();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
            ":idcategory"=>$this->getidcategory()
        ]);

    }

}

?>