<?php
//strategy, Abstract Factory, Decorator

class replyStrat {
  public $strategy = NULL;
  public function __construct($message) {
    switch($message) {
      case "hey":
        $this->strategy = new replyFactory("hey");
	break;
      case "hi":
        $this->strategy = new replyFactory("hi");
	break;
      case "hello":
        $this->strategy = new replyFactory("hello");
	break;
      default:
        echo "That is not a valid message";
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
      case "hey":
        $this->response = "hey.";
	break;
      case "hi":
        $this->response = "I am John's assistant.";
	break;
      case "hello":
        $this->response = "John is my boss.";
	break;
    }
  }
  public function getResponse() {
    return $this->response;
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
        $this->response = $this->response . ' How are you today?';
	break;
      case "2":
        $this->response = $this->response . ' How are you?';
	break;
      case "3":
        $this->response = $this->response . ' How can I help you?';
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
