<html>
    <head>
        Php Spike 3
        </head>
        <body>
            <form>
  <select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
  </select>
             </form>
           

<?php
class PDOClass {
    public $dbh;
    function connect() 
    {
    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
try 
    {
    $this->dbh = new PDO("mysql:host=$hostname;dbname=harshal", $username, $password);
    echo "<br/>"."<h1>"."Connected to datbase"."</h1>"."<br />";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
   
    }//End of connect function

    function InsertInto() 
    {        
        try
        {
        $count = $this->dbh->exec("INSERT INTO animals(animal_type, animal_name) VALUES ('kiwi', 'troy')");
         echo "<br/>"."<h1>"."Function of insert into using PDO"."</h1>"."<br />";
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }

       }//end of InsertInto function

    function selectFrom() 
    {
        try
        {
        $sql = "SELECT * FROM animals";
        echo "<br/>"."<h1>"."Select using PDO"."</h1>"."<br />";
         foreach ($this->dbh->query($sql) as $row)
            {
                print $row['animal_type'] .' - '. $row['animal_name'] . '<br />';
            }

    
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
}

function UpdateTable() 
{ 
    try
    {
    $count = $this->dbh->exec("UPDATE animals SET animal_name='Elephant' WHERE animal_name='troy'");
    echo "<br/>"."<h1>"." Updated the table"."</h1>"."<br />";
    echo $count;
    
    
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }    
}
        

    function FetchAssoc() 
{
try {
    $sql = "SELECT * FROM animals";
    $stmt = $this->dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<br/>"."<h1>"."Function of fect assoc"."</h1>";
    foreach($result as $key=>$val)
    {
        echo $key.' - '.$val.'<br />';
    }
    
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }        
        
}//end of fetch assoc


    function FetchNum() 
    {
     try
        {
        $sql = "SELECT * FROM animals";
        $stmt = $this->dbh->query($sql);//fetch to pdo
        $result = $stmt->fetch(PDO::FETCH_NUM);
            echo "<br/>"."<h1>"."Function of fetch Num"."</h1>";

        foreach($result as $key=>$val)
            {
                echo $key.' - '.$val.'<br />';
            }

    /*** close the database connection ***/
    //$dbh = null;
         }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
        
}//end of FetchNum
function FetchBoth() 
    {
     try
        {
        $sql = "SELECT * FROM animals";
        $stmt = $this->dbh->query($sql);//fetch to pdo
        $result = $stmt->fetch(PDO::FETCH_BOTH);
            echo "<br/>"."<h1>"."Function of fetch Both"."</h1>";

        foreach($result as $key=>$val)
            {
                echo $key.' - '.$val.'<br />';
            }

    /*** close the database connection ***/
    //$dbh = null;
         }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
        
}//end of FetchBoth




function FetchObject() 
    {
     try
        {
        $sql = "SELECT * FROM animals";
        $stmt = $this->dbh->query($sql);//fetch to pdo
        $result = $stmt->fetch(PDO::FETCH_OBJ);
            echo "<br/>"."<h1>"."Function of fetch Object"."</h1>";

        foreach($result as $key=>$val)
            {
                echo $key.' - '.$val.'<br />';
            }

    /*** close the database connection ***/
    //$dbh = null;
         }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
        
}//end of FetchObject




function FetchLazy() 
    {
     try
        {
        $sql = "SELECT * FROM animals";
        $stmt = $this->dbh->query($sql);//fetch to pdo
        $result = $stmt->fetch(PDO::FETCH_LAZY);
            echo "<br/>"."<h1>"."Function of fetch Lazy"."</h1>";

        foreach($result as $key=>$val)
            {
                echo $key.' - '.$val.'<br />';
            }

    /*** close the database connection ***/
    //$dbh = null;
         }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
        
}//end of FetchLazy


   
function FetchClass() 
    {
     try
        {
    $sql = "SELECT * FROM animals";
    $stmt = $this->dbh->query($sql);
    $obj = $stmt->fetchALL(PDO::FETCH_CLASS, 'animals');
                echo "<br/>"."<h1>"."Function of fetch Class"."</h1>";

    foreach($obj as $animals)
        {
            echo $animals->lcfirstType().'<br />';
        } 
    /*** close the database connection ***/
    //$dbh = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
        
}//end of FetchClass


}//end of PDOClass


class animals
{
    public $animal_id;
    public $animal_type;
    public $animal_name;

public function lcfirstType()
        {
            return lcfirst($this->animal_type);
        }

} /*** end of class ***/


$obj=new PDOClass;
$obj->connect();
$obj->InsertInto();
$obj->selectFrom();
$obj->UpdateTable();
$obj->FetchAssoc();
$obj->FetchNum();
$obj->FetchBoth();
$obj->FetchObject();
$obj->FetchLazy();
$obj->FetchClass();

?>
 </body>
            
</html>