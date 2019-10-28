<?php
/*Klass för att hantera kurser, av Rebecka Högström vt-19*/

class Courses {
    public $db;
    private $code;
    private $name;
    private $prog;
    private $plan;

//Constructor
function __construct(){
    //Anslut till databasen
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    if($this->db->connect_errno > 0) {
        die("Fel vid anslutning: " . $this->db->connect_error);
    }
}
    //Registrera ny kurs
    public function addCourse($code, $name, $prog, $plan) {
        $code = $this->db->real_escape_string($code);
        $name = $this->db->real_escape_string($name);
        $prog = $this->db->real_escape_string($prog);
        $plan = $this->db->real_escape_string($plan);


        //Sql-fråga till databasen
        $sql = "INSERT INTO courses(code, name, prog, plan)VALUES('$code', '$name', '$prog', '$plan')";
        //echo $sql;

        $result = $this->db->query($sql);

        return $result;
    }
    //Returnera alla kurser från tabellen kurser
    public function getCourses() {
        $sql = "SELECT * FROM courses";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC); //skaffa en associativ array
    }
    //Radera enskild kurs
	public function delCourse($id) {
		$id = intval($id); //Bara siffervärden i heltal
		$sql = "DELETE FROM courses WHERE id='$id'";
		return $this->db->query($sql);
    }
    
	//Uppdatera kurs
	public function updateCourse($code, $name, $prog, $plan, $id) {
        $id = intval($id);
		$code = $this->db->real_escape_string($code);
        $name = $this->db->real_escape_string($name);
        $prog = $this->db->real_escape_string($prog);
		$plan = $this->db->real_escape_string($plan);	

        $sql = "UPDATE courses SET code= '$code', name = '$name', prog = '$prog', plan = '$plan' WHERE id=$id";

		return $this->db->query($sql);
    }
}
?>