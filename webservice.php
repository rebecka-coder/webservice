 <?php
include("includes/config.php");

 header("Content-Type: application/json;charset=UTF-8"); //Skicka returnerad header information
 header("Access-Control-Allow-Origin: *");  //aktivera åtkomst via annan domän
 header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');

 $input = json_decode(file_get_contents('php://input'), true); //Läs in data från anropet, konvertera till json-format.
 //var_dump($input); //Gör en dump för anropet
 
 $method = $_SERVER['REQUEST_METHOD'];
 $c = new Courses(); 



 switch($method) {
     case "GET":
     //Kod för GET
     $response = $c->getCourses();
     if(sizeof($response) > 0) {
         http_response_code(200); //Ok
     } else {
         http_response_code(404); //Not found
         $response = array("message" => "Inga kurser hittade."); //Felmeddelande
     }
     break;
     case "POST":
    //Kod för POST
        if ($input['code'] == "" || $input['name'] == "" || $input['prog'] == "" || 
       $input['plan'] == "") {
        http_response_code(500); //Server error
        $response = array("message" => "Alla fält måste fyllas i!");
        } else { 
        $c->addCourse($input['code'], $input['name'], $input['prog'], $input['plan']); 
        http_response_code(201); //Skapad
        $response = array("message" => "Kurs skapad.");
        }  

    break;
    case "DELETE":
    //Kod för DELETE
    if($c->delCourse($input['id'])) {
        http_response_code(200); //Ok
        $response = array("message" => "Kurs raderad.");
    } else {
        http_response_code(500); //Server error
        $response = array("message" => "Error radera kurs."); //Felmeddelande
    }
    break;
    case "PUT":
    //Kod för PUT
    if($c->updateCourse($input['code'], $input['name'], $input['prog'], $input['plan'], $input['id'])) {
        http_response_code(200); //Ok
        $response = array("message" => "Kurs uppdaterad.");
    } else {
        http_response_code(500); //Server error
        $response = array("message" => "Error uppdatera kurs."); //Felmeddelande
    }
    break;
 }
 echo json_encode($response); //Returnera resultatet i JSON-format    
?>