<?php
   
    use PHPUnit\Framework\TestCase;
    
    class cidadeteste extends TestCase
    {
        public function testeConstrutor(){
            $cidade = new Cidade(1,'Rio do sul', 'Santa Catarina');
            $this->$this->assertEquals(1, $cidade->getIdCid());
        }
    }
?>

