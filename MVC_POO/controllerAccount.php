<?php
    session_start();

    include "./view/viewHeader.php";
    include "./view/viewAccount.php";
    include "./view/viewFooter.php";
    include "./controllerGeneric.php";

Class ControllerAccount extends ControllerGeneric{

    //ATTRIBUTES
    private?ViewAccount $viewAccount;
    //CONSTRUCT
    function __construct(?ViewAccount $newViewAccount, ?Viewheader $newViewHeader, ?ViewFooter $newViewFooter) {
        $this->viewAccount = $newViewAccount;
        $this->setViewHeader($newViewHeader);
        $this->setViewFooter($newViewFooter);
    }
    //GETTER
    public function getViewAccount(): ?ViewAccount{
        return $this->viewAccount;
    }
    //SETTER
    public function setViewAccount($newViewAccount):ControllerAccount{
        $this->viewAccount = $newViewAccount;
        return $this;
    }
    //METHOD
    public function render():void{
        echo $this->getViewHeader()->displayView().$this->getViewAccount()->displayView().$this->getViewFooter()->displayView();
    }
}

    $account = new ControllerAccount(new ViewAccount(), new ViewHeader(), new ViewFooter());
    //echo "Test<br>";
    $account->render();

?>