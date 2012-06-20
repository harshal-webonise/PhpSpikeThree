<html>
    <head>
        Php Spike 3
        </head>
        <body>
            <form>
  <select>
  <option value=""></option>
  <option value=""></option>
  <option value=""></option>
  <option value=""></option>
  </select>
             </form>
           

<?php
class PDOClass 
{
    public $dbh;
    public $query;
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
         echo "<br/>"."<h1>"."Select using PDO"."</h1>"."<br />";
        $sql = "SELECT * FROM animals";
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

    function ErrorHandling()
    {
    try
      {
        $sql = "SELECT username FROM animals";
        echo "<br/>"."<h1>"."Error Handling"."</h1>";

        foreach ($this->dbh->query($sql) as $row)
        {
        print $row['animal_type'] .' - '. $row['animal_name'] . '<br />';
        }

    /*** close the database connection ***/
    //$dbh = null;
        }
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
            
    }//end of ErrorHandle
        
   

    function PreparedStaement() 
    {
     try 
        {
         $animal_id = 80;
         $animal_name = 'elephant';
         $stmt = $this->dbh->prepare("SELECT * FROM animals WHERE animal_id = :animal_id AND animal_name = :animal_name");
         $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
         $stmt->bindParam(':animal_name', $animal_name, PDO::PARAM_STR, 5); 
         $stmt->execute();

            $result = $stmt->fetchAll();
            //echo"$result";
            echo "<br/>"."<h1>"."Prepared statement using PDO"."</h1>";
     foreach($result as $row)
        {
        echo $row['animal_id'].'<br />';
        echo $row['animal_type'].'<br />';
        echo $row['animal_name'];
        }

    /*** close the database connection ***/
    //$dbh = null;
        }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }   
 }//end of prepared statement

    function Transction()
 {
        try
        {
   $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $this->dbh->beginTransaction();
   $table1 = "drop table wildAnimals";
   $this->dbh->exec($table1);
    $table = "CREATE TABLE wildAnimals ( id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,type VARCHAR(25) NOT NULL,name VARCHAR(25) NOT NULL 
    )";
   $this->dbh->exec($table);
    /***  INSERT statements ***/
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('human', 'harshal')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('funny', 'Tiger')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('lizard', 'Atif')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('dingo', 'Mainsh')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('kangaroo', 'Shiva')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('wallaby', 'Nitin')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('wombat', 'Amit')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('koala', 'Ashok')");
   $this->dbh->exec("INSERT INTO wildAnimals (type,name) VALUES ('kiwi', 'Ravi')");
   //$this->dbh->exec("DROP table wildAnimals");

    
   $this->dbh->commit();

   
    echo 'Data entered successfully<br />';
}
catch(PDOException $e)
    {
   
   $this->dbh->rollback();

   
    echo $sql . '<br />' . $e->getMessage();
    }       
 }
 
 
 function lastInsertId() 
 {

     try 
     {
    
    
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/>"."<h1>"."Last insert Element Id"."</h1>";
    $this->dbh->exec("INSERT INTO animals(animal_type, animal_name) VALUES ('galah', 'polly')");
    echo $this->dbh->lastInsertId();

    /*** close the database connection ***/
    $this->dbh = null;
    }

    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 }//lastInsertId
 
 
 
 //$this->dbh=NULL;
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
$obj->ErrorHandling();
$obj->PreparedStaement();
$obj->Transction();
$obj->lastInsertId();

?>
 </body>
            
</html>