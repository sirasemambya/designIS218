<?php
//strategy, Abstract Factory, Decorator

class replyStrat {
  public $strategy = NULL;
  public function __construct($message) {
    switch($message) {
      case "yes":
        $this->strategy = new replyFactory("yes");
	break;
      case "no":
        $this->strategy = new replyFactory("no");
	break;
      case "no comment":
        $this->strategy = new replyFactory("no comment");
	break;
      default:
        echo "Sorry, I don't understand";
    }
  }
  public function getResponse() {
    return $this->strategy->getResponse();
  }
}
abstract class AbstractFactoryMethod {
  abstract function __construct($param);
}
class replyFactory extends AbstractFactoryMethod {
  public $response;
  public function __construct($param){
    switch($param) {
      case "yes":
        $this->response = "Congrats!";
	break;
      case "no":
        $this->response = "haha you suck!";
	break;
      case "no comment":
        $this->response = "Just tell me!";
	break;
    }
  }
  public function getResponse() {
    echo $this->response;
  }
}

class responseDecorator {
  protected $response;
  public function __construct($response_in) {
    $this->response = $response_in;
  }
  function randResponse() {
    $num = rand(1, 3);
    switch($num) {
      case "1":
        $this->response = $this->response . ' Do you want pizza?';
	break;
      case "2":
        $this->response = $this->response . ' Do you want a burger?';
	break;
    }
    return $this->response;
  }
}
$message = $_POST['message'];

$response = new replyStrat($message);
$responseText = $response->getResponse($message);

$decorator = new responseDecorator($responseText);
echo $decorator->randResponse();

?>
