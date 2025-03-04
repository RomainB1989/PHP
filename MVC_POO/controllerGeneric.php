<?php
    
    class ControllerGeneric{

        //ATRIBUTE
        private ?ViewHeader $viewHeader;
        private ?ViewFooter $viewFooter;

        public function __construct(ViewHeader $newViewHeader, ViewFooter $newViewFooter){
            $this->viewHeader = $newViewHeader;
            $this->viewFooter = $newViewFooter;
        }

        public function getViewHeader(): ViewHeader{
            return $this->viewHeader;
        }

        public function getViewFooter(): ViewFooter{
            return $this->viewFooter;
        }

        public function setViewHeader(ViewHeader $viewHeader): ControllerGeneric{
            $this->viewHeader = $viewHeader;
            return $this;
        }

        public function setViewFooter(ViewFooter $viewFooter): ControllerGeneric{
            $this->viewFooter = $viewFooter;
            return $this;
        }
    }

?>